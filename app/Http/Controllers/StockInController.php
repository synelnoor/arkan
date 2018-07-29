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

       // dd($input);
        $now= Carbon::now();

        
       $stockIn = $this->stockInRepository->create($input);
        foreach($request['row'] as $item) {
            $dataDetailStockIn = array(
                'id_stockin'=>$stockIn->id,
                'id_itemstock'=>$item['id_itemstock'],
                'kode'=>$item['kode'],
                'nama'=>$item['nama'],
                'jml' =>$item['jml'],
                'tgl' =>$item['tgl']
              
               
            );
             $detailstockIn=$this->detailStockInRepository->create($dataDetailStockIn);

             if($item['tgl'] == $now->format('Y-m-d')){
                $stock= $this->stockRepository->findWithoutFail($item['id']);
                $dataStock =array(
                'id'=>$item['id'],
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
                 $stock=$this->stockRepository->update($dataStock,$item['id']);
             }else{

                $dataStock =array(
               
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

                $stock=$this->stockRepository->create($dataStock);
             }
            

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
        $detailStockIn = $this->detailStockInRepository->findWhere(['id_stockin'=>11]);
        //$detailStockIn = DetailStockIn::where('id_stockin',$id)->get();

        $LogStock = $this->logStockRepository->findWhere(['id_stockin' => $id]);
        $stock = $this->stockRepository->findWhere(['id_stockin' => $id]);
        //dd($detailStockIn->toArray());

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }
        $action='edit';

         $data=array();
        foreach ($detailStockIn as $item) {
            //dd($item);
            $data[]=array(
                        'id' => $item['id'],
                        'id_stockin'=> $item['id_stockin'],
                        'id_itemstock' => $item['id_stockin'],
                        'nama' => $item['nama'],
                        'kode' => $item['kode'],
                        'tgl' => $item['tgl'],
                        'jml' => $item['jml']
                        );
        }
        dd($data);
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

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }

        $stockIn = $this->stockInRepository->update($request->all(), $id);

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

        Flash::success('Stock In deleted successfully.');

        return redirect(route('stockIns.index'));
    }


     public function autoCompleteStockin(Request $request) {
             $query = $request->get('term','');
                 //dd($query);
        // $query= 'AYAM GORENG';
                $items=Stock::where('nama','LIKE','%'.$query.'%')
                             ->whereNull('deleted_at')
                             ->orderBy('tgl', 'desc')
                             ->get();
                //dd($items);
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
                //dd($data);
                if(count($data))
                     return $data;
                else
                    return ['value'=>'No Result Found','id'=>''];
            }
}
