<?php

namespace App\Http\Controllers;

use App\DataTables\StockOutDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Requests\CreateStockOutRequest;
use App\Http\Requests\UpdateStockOutRequest;
use App\Repositories\StockOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Stock;
use App\Models\StockOut;
use App\Models\DetailStockOut;
use App\Models\LogStock;
use Carbon\Carbon;
use App\Repositories\DetailStockOutRepository;
use App\Repositories\StockRepository;
use App\Repositories\LogStockRepository;



class StockOutController extends AppBaseController
{
    /** @var  StockOutRepository */
    private $stockOutRepository;
    private $detailStockOutRepository;
    private $stockRepository;
    private $logStockRepository;

    public function __construct(StockOutRepository $stockOutRepo,DetailStockOutRepository $detailStockOutRepo,StockRepository $stockRepo,LogStockRepository $logStockRepo)
    {
        $this->stockOutRepository = $stockOutRepo;
        $this->detailStockOutRepository = $detailStockOutRepo;
        $this->stockRepository = $stockRepo;
        $this->logStockRepository = $logStockRepo;
    }

    /**
     * Display a listing of the StockOut.
     *
     * @param StockOutDataTable $stockOutDataTable
     * @return Response
     */
    public function index(StockOutDataTable $stockOutDataTable)
    {
        return $stockOutDataTable->render('admin.stock_outs.index');
    }

    /**
     * Show the form for creating a new StockOut.
     *
     * @return Response
     */
    public function create()
    {   
        $num= count(StockOut::whereNull('deleted_at')->get())+1;
        $code= 'STO'.$num;
        $date=Carbon::now();
        $action='create';
        return view('admin.stock_outs.create')
                ->with('date',$date)
                ->with('code',$code)
                ->with('action',$action);
    }

    /**
     * Store a newly created StockOut in storage.
     *
     * @param CreateStockOutRequest $request
     *
     * @return Response
     */
    public function store(CreateStockOutRequest $request)
    {
        $input = $request->all();
        $now= Carbon::now();
        //dd($input);
        $stockOut = $this->stockOutRepository->create($input);
        foreach($request['row'] as $item) {
            //DetailStock Store
            $dataDetailStockOut = array(
                'id_stockout'=>$stockOut->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml' =>$item['jml'],
                'tgl' =>$item['tgl']     
            );
             $detailstockOut=$this->detailStockOutRepository->create($dataDetailStockOut);

             //Stock Store
                $stock= $this->stockRepository->findWithoutFail($item['id_stock']);
                $dataStock =array(
                'id'=>$item['id_stock'],
                'id_stockout'=>$stockOut->id,
                'id_detailstockout'=>$detailstockOut->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml_out' =>$item['jml'],
                'tgl' =>$item['tgl'],
                'stock_awal' =>$item['stock_akhir'],
                'stock_akhir' =>$item['stock_akhir']-$item['jml'],
                );
                 $stock=$this->stockRepository->update($dataStock,$item['id_stock']);

            //LogStock
             $default =0;
             $dataLogStock = array(
                'id_stock' =>$stock->id,
                'id_stockout'=>$stockOut->id,
                'id_detailstockout'=>$detailstockOut->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml_in' =>$default,
                'jml_out' =>$item['jml'],
                'tgl' =>$item['tgl'],
                'stock_awal' =>$item['stock_akhir'],
                'stock_akhir' =>$item['stock_akhir']-$item['jml'],
                 );
                $LogStock=$this->logStockRepository->create($dataLogStock);
            
        }
       



        Flash::success('Stock Out saved successfully.');

        return redirect(route('stockOuts.index'));
    }

    /**
     * Display the specified StockOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockOut = $this->stockOutRepository->findWithoutFail($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        return view('admin.stock_outs.show')->with('stockOut', $stockOut);
    }

    /**
     * Show the form for editing the specified StockOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockOut = $this->stockOutRepository->findWithoutFail($id);
        $detailStockIn = $this->detailStockOutRepository->findWhere(['id_stockout'=>$id]);

        $action='edit';


        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        $data=array();
        foreach ($detailStockIn as $item) {

            $LogStock = $this->logStockRepository->findWhere(['id_detailstockout' =>$item['id'] ]);
            
            $data[]=array(

                        'id' => $item['id'],
                        'id_stockout'=> $item['id_stockout'],
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

        return view('admin.stock_outs.edit')
                ->with('stockOut', $stockOut)
                ->with('action',$action)
                ->with('data',$data);
    }

    /**
     * Update the specified StockOut in storage.
     *
     * @param  int              $id
     * @param UpdateStockOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockOutRequest $request)
    {
        $stockOut = $this->stockOutRepository->findWithoutFail($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        $stockOut = $this->stockOutRepository->update($request->all(), $id);

        foreach($request['row'] as $item) {
            $detailStockOut = $this->detailStockOutRepository->findWhere(['id'=>$item['id']]);

            //DetailStock Store
            $dataDetailStockOut = array(
                'id_stockout'=>$stockOut->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml' =>$item['jml'],
                'tgl' =>$item['tgl']
              
               
            );

            if($item['id'] == '')
                {
                 $detailstockOut=$this->detailStockOutRepository->create($dataDetailStockOut);
                }
            else
                {
                    $detailstockOut=$this->detailStockOutRepository->update($dataDetailStockOut,$item['id']);
                }

            //LogStock
            $LogStock = $this->logStockRepository->findWhere(['id' =>$item['id_logstock'] ]);
             $default =0;
            
             if($item['id_logstock'] == '')
                {
                    $dataLogStock = array(
                        'id_stock' =>$item['id_stock'],
                        'id_stockout'=>$stockOut->id,
                        'id_detailstockout'=>$detailstockOut->id,
                        'id_itemstock'=>$item['id_itemstock'],
                        'kode'=>$item['kode'],
                        'nama'=>$item['nama'],
                        'jml_in' =>$default,
                        'jml_out' =>$item['jml'],
                        'tgl' =>$item['tgl'],
                        'stock_awal' =>$item['stock_akhir'],
                        'stock_akhir' =>$item['stock_akhir']-$item['jml'],
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
                        'jml_in' =>$default,
                        'jml_out' =>$item['jml'],
                        'tgl' =>$item['tgl'],
                        'stock_awal' =>$item['stock_awal'],
                        'stock_akhir' =>$item['stock_akhir']-$item['jml'],
                         );

                    $LogStock=$this->logStockRepository->update($dataLogStock,$item['id_logstock']); 
                }

             //Stock Store

                $stock= $this->stockRepository->findWithoutFail($item['id_stock']);

                if($item['id'] == '')
                {

                    
                    $dataStock =array(
                    'id'=>$item['id_stock'],
                    'id_stockout'=>$stockOut->id,
                    'id_detailstockout'=>$detailstockOut->id,
                    'id_itemstock'=>$item['id_itemstock'],
                    'kode'=>$item['kode'],
                    'nama'=>$item['nama'],
                    'jml_out' =>$item['jml'],
                    'tgl' =>$item['tgl'],
                    'stock_awal' =>$item['stock_akhir'],
                    'stock_akhir' =>$item['stock_akhir']-$item['jml'],
                    );
                     $stock=$this->stockRepository->update($dataStock,$item['id_stock']);
                }
                else{

                    $dataStock =array(
                    'id'=>$item['id_stock'],
                    'id_stockout'=>$stock->id_stockout,
                    'id_detailstockout'=>$stock->id_detailstockout,
                    'id_itemstock'=>$item['id_itemstock'],
                    'kode'=>$item['kode'],
                    'nama'=>$item['nama'],
                    'jml_out' =>$stock['jml_out'],
                    'tgl' =>$stock['tgl'],
                    'stock_awal' =>($stock['stock_awal']+$item['jml'])-$item['jml'],
                    'stock_akhir' =>($stock['stock_akhir']+$item['jml'])-$item['jml'],
                    );
                    

                 $stock=$this->stockRepository->update($dataStock,$item['id_stock']);
                }
                
                 
         
            
        }


        Flash::success('Stock Out updated successfully.');

        return redirect(route('stockOuts.index'));
    }

    /**
     * Remove the specified StockOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockOut = $this->stockOutRepository->findWithoutFail($id);

        if (empty($stockOut)) {
            Flash::error('Stock Out not found');

            return redirect(route('stockOuts.index'));
        }

        $this->stockOutRepository->delete($id);

        $detailStockOut = $this->detailStockInRepository->findWhere(['id_stockout'=>$id]);
        foreach ($detailStockOut as $key => $value) {
            $this->detailStockOutRepository->delete(['id_stockout'=>$id]);
        }

        $LogStock = $this->logStockRepository->findWhere(['id_stockout' =>$id ]);
        
        $dataStock = array();
        foreach ($LogStock as $key => $value) {
            $stock= $this->stockRepository->findWithoutFail($value['id_stock']);
            
            $Latest = LogStock::where('id_stock',$value['id_stock'])->latest()->get();
            
            
            if($Latest == '[]'){
                
                $dataStock[]=array(
                            'jml_in' => 0,
                            'stock_awal' =>$stock['stock_awal']+$value['stock_awal'] ,
                            'stock_akhir' => $stock['stock_akhir']+$value['stock_akhir']
                        );
            }
            else
            {
                
                $dataStock[]=array(
                            'jml_in' => $Latest[0]['jml_in'],
                            'stock_awal' =>$stock['stock_awal']+$value['stock_akhir'] ,
                            'stock_akhir' => $stock['stock_akhir']+$value['stock_akhir']
                        );
            }
            
        
            $stock=$this->stockRepository->update($dataStock,$item['id_stock']);
        }

        $LogStock=$this->logStockRepository->delete(['id_stockout' =>$id ]);


        Flash::success('Stock Out deleted successfully.');

        return redirect(route('stockOuts.index'));
    }
}
