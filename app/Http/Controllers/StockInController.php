<?php

namespace App\Http\Controllers;

use App\DataTables\StockInDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateStockInRequest;
use App\Http\Requests\UpdateStockInRequest;
use App\Repositories\StockInRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Stock;
use App\Models\StockIn;
use App\Models\DetailStockIn;
use App\Models\LogStock;
use Carbon\Carbon;
use App\Repositories\DetailStockInRepository;
use App\Repositories\StockRepository;
use App\Repositories\LogStockRepository;

class StockInController extends AppBaseController
{
    /** @var  StockInRepository */
    private $stockInRepository;
    private $detailStockInRepository;
    private $stockRepository;
    private $logStockRepository;

    public function __construct(StockInRepository $stockInRepo,DetailStockInRepository $detailStockInRepo,StockRepository $stockRepo,LogStockRepository $logStockRepo)
    {
        $this->stockInRepository = $stockInRepo;
        $this->detailStockInRepository = $detailStockInRepo;
        $this->stockRepository = $stockRepo;
        $this->logStockRepository = $logStockRepo;
    }

    /**
     * Display a listing of the StockIn.
     *
     * @param StockInDataTable $stockInDataTable
     * @return Response
     */
    public function index(StockInDataTable $stockInDataTable)
    {
        return $stockInDataTable->render('admin.stock_ins.index');
    }

    /**
     * Show the form for creating a new StockIn.
     *
     * @return Response
     */
    public function create()
    {
        $num= count(StockIn::whereNull('deleted_at')->get())+1;
        $code= 'STI'.$num;
        $date=Carbon::now();
        $action='create';
        return view('admin.stock_ins.create')
                ->with('date',$date)
                ->with('code',$code)
                ->with('action',$action);
    }

    /**
     * Store a newly created StockIn in storage.
     *
     * @param CreateStockInRequest $request
     *
     * @return Response
     */
    public function store(CreateStockInRequest $request)
    {
        $input = $request->all();

        $now= Carbon::now();

        
       $stockIn = $this->stockInRepository->create($input);

        foreach($request['row'] as $item) {
            //DetailStock Store
            $dataDetailStockIn = array(
                'id_stockin'=>$stockIn->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml' =>$item['jml'],
                'tgl' =>$item['tgl']
              
               
            );
             $detailstockIn=$this->detailStockInRepository->create($dataDetailStockIn);

             //Stock Store
                $stock= $this->stockRepository->findWithoutFail($item['id_stock']);
                $dataStock =array(
                'id'=>$item['id_stock'],
                'id_stockin'=>$stockIn->id,
                'id_detailstockin'=>$detailstockIn->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml_in' =>$item['jml'],
                'tgl' =>$item['tgl'],
                'stock_awal' =>$item['stock_akhir'],
                'stock_akhir' =>$item['stock_akhir']+$item['jml'],
                );
                 $stock=$this->stockRepository->update($dataStock,$item['id_stock']);

            //LogStock
             $default =0;
             $dataLogStock = array(
                'id_stock' =>$stock->id,
                'id_stockin'=>$stockIn->id,
                'id_detailstockin'=>$detailstockIn->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml_in' =>$item['jml'],
                'jml_out' =>$default,
                'tgl' =>$item['tgl'],
                'stock_awal' =>$item['stock_akhir'],
                'stock_akhir' =>$item['stock_akhir']+$item['jml'],
                 );
             $LogStock=$this->logStockRepository->create($dataLogStock);
            
        }
       

        Flash::success('Stock In saved successfully.');

        return redirect(route('stockIns.index'));
    }

    /**
     * Display the specified StockIn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockIn = $this->stockInRepository->findWithoutFail($id);

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        return view('admin.stock_ins.show')->with('stockIn', $stockIn);
    }

    /**
     * Show the form for editing the specified StockIn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockIn = $this->stockInRepository->findWithoutFail($id);
        $detailStockIn = $this->detailStockInRepository->findWhere(['id_stockin'=>$id]);
    

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        $action='edit';

        $data=array();
        foreach ($detailStockIn as $item) {

            $LogStock = $this->logStockRepository->findWhere(['id_detailstockin' =>$item['id'] ]);
            
            $data[]=array(

                        'id' => $item['id'],
                        'id_stockin'=> $item['id_stockin'],
                        'id_itemstock' => $item['id_itemstock'],
                        'nama' => $item['nama'],
                        'kode' => $item['kode'],
                        'tgl' => $item['tgl']->format('Y-m-d'),
                        'jml' => $item['jml'],

                        'id_logstock' => $LogStock[0]['id'],
                        'id_stock' =>$LogStock[0]['id_stock'],
                        'stock_awal'=>$LogStock[0]['stock_awal'],
                        'stock_akhir'=>$LogStock[0]['stock_akhir']
                        
                        );
        }
        
        return view('admin.stock_ins.edit')
                ->with('stockIn', $stockIn)
                ->with('action',$action)
                ->with('data',$data);
    }

    /**
     * Update the specified StockIn in storage.
     *
     * @param  int              $id
     * @param UpdateStockInRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockInRequest $request)
    {
        $stockIn = $this->stockInRepository->findWithoutFail($id);
        //dd($request->all());

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        $stockIn = $this->stockInRepository->update($request->all(), $id);

        foreach($request['row'] as $item) {
            $detailStockIn = $this->detailStockInRepository->findWhere(['id'=>$item['id']]);

            //DetailStock Store
            $dataDetailStockIn = array(
                'id_stockin'=>$stockIn->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml' =>$item['jml'],
                'tgl' =>$item['tgl']
              
               
            );

            if($item['id'] == '')
                {
                 $detailstockIn=$this->detailStockInRepository->create($dataDetailStockIn);
                }
            else
                {
                    $detailstockIn=$this->detailStockInRepository->update($dataDetailStockIn,$item['id']);
                }

            //LogStock
            $LogStock = $this->logStockRepository->findWhere(['id' =>$item['id_logstock'] ]);
             $default =0;
            
             if($item['id_logstock'] == '')
                {
                    $dataLogStock = array(
                        'id_stock' =>$item['id_stock'],
                        'id_stockin'=>$stockIn->id,
                        'id_detailstockin'=>$detailstockIn->id,
                        'id_itemstock'=>$item['id_itemstock'],
                        'kode'=>$item['kode'],
                        'nama'=>$item['nama'],
                        'jml_in' =>$item['jml'],
                        'jml_out' =>$default,
                        'tgl' =>$item['tgl'],
                        'stock_awal' =>$item['stock_akhir'],
                        'stock_akhir' =>$item['stock_akhir']+$item['jml'],
                         );

                    $LogStock=$this->logStockRepository->create($dataLogStock);
                 }
            else
                {   
                    $dataLogStock = array(
                        'id_stock' =>$item['id_stock'],
                        'id_stockin'=>$stockIn->id,
                        'id_detailstockin'=>$detailstockIn->id,
                        'id_itemstock'=>$item['id_itemstock'],
                        'kode'=>$item['kode'],
                        'nama'=>$item['nama'],
                        'jml_in' =>$item['jml'],
                        'jml_out' =>$default,
                        'tgl' =>$item['tgl'],
                        'stock_awal' =>$item['stock_awal'],
                        'stock_akhir' =>$item['stock_akhir']+$item['jml'],
                         );

                    $LogStock=$this->logStockRepository->update($dataLogStock,$item['id_logstock']); 
                }

             //Stock Store

                $stock= $this->stockRepository->findWithoutFail($item['id_stock']);

                if($item['id'] == '')
                {

                    
                    $dataStock =array(
                    'id'=>$item['id_stock'],
                    'id_stockin'=>$stockIn->id,
                    'id_detailstockin'=>$detailstockIn->id,
                    'id_itemstock'=>$item['id_itemstock'],
                    'kode'=>$item['kode'],
                    'nama'=>$item['nama'],
                    'jml_in' =>$item['jml'],
                    'tgl' =>$item['tgl'],
                    'stock_awal' =>$item['stock_akhir'],
                    'stock_akhir' =>$item['stock_akhir']+$item['jml'],
                    );
                     $stock=$this->stockRepository->update($dataStock,$item['id_stock']);
                }
                else{

                    $dataStock =array(
                    'id'=>$item['id_stock'],
                    'id_stockin'=>$stock->id_stockin,
                    'id_detailstockin'=>$stock->id_detailstockin,
                    'id_itemstock'=>$item['id_itemstock'],
                    'kode'=>$item['kode'],
                    'nama'=>$item['nama'],
                    'jml_in' =>$stock['jml_in'],
                    'tgl' =>$stock['tgl'],
                    'stock_awal' =>($stock['stock_awal']-$item['jml'])+$item['jml'],
                    'stock_akhir' =>($stock['stock_akhir']-$item['jml'])+$item['jml'],
                    );
                    

                 $stock=$this->stockRepository->update($dataStock,$item['id_stock']);
                }
                
                 
         
            
        }

 

        Flash::success('Stock In updated successfully.');

        return redirect(route('stockIns.index'));
    }

    /**
     * Remove the specified StockIn from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockIn = $this->stockInRepository->findWithoutFail($id);


        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        $this->stockInRepository->delete($id);

        $detailStockIn = $this->detailStockInRepository->findWhere(['id_stockin'=>$id]);
        foreach ($detailStockIn as $key => $value) {
        $this->detailStockInRepository->delete(['id_stockin'=>$id]);
        }

        $LogStock = $this->logStockRepository->findWhere(['id_stockin' =>$id ]);
        
        $dataStock = array();
        foreach ($LogStock as $key => $value) {
            $stock= $this->stockRepository->findWithoutFail($value['id_stock']);
            
            $Latest = LogStock::where('id_stock',$value['id_stock'])->latest()->get();
            
            
            if($Latest == '[]'){
                
                $dataStock[]=array(
                            'jml_in' => 0,
                            'stock_awal' =>$stock['stock_awal']-$value['stock_awal'] ,
                            'stock_akhir' => $stock['stock_akhir']-$value['stock_akhir']
                        );
            }
            else
            {
                
                $dataStock[]=array(
                            'jml_in' => $Latest[0]['jml_in'],
                            'stock_awal' =>$stock['stock_awal']-$value['stock_akhir'] ,
                            'stock_akhir' => $stock['stock_akhir']-$value['stock_akhir']
                        );
            }
            
        
            $stock=$this->stockRepository->update($dataStock,$item['id_stock']);
        }

        $LogStock=$this->logStockRepository->delete(['id_stockin' =>$id ]);



        Flash::success('Stock In deleted successfully.');

        return redirect(route('stockIns.index'));
    }


     public function autoCompleteStockin(Request $request) {
             $query = $request->get('term','');
                
                $items=Stock::where('nama','LIKE','%'.$query.'%')
                             ->whereNull('deleted_at')
                             ->orderBy('tgl', 'desc')
                             ->get();
                
                $data=array();
                foreach ($items as $item) {
                        $data[]=array(
                                'value'         => $item->nama,
                                'id'            => $item->id,
                                'id_itemstock'  => $item->id_itemstock,
                                'kode'          => $item->kode,
                                'stock_awal'    => $item->stock_awal,
                                'stock_akhir'   => $item->stock_akhir
                                
                                );
                }
                
                if(count($data))
                     return $data;
                else
                    return ['value'=>'No Result Found','id'=>''];
            }
}
