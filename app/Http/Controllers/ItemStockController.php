<?php

namespace App\Http\Controllers;

use App\DataTables\ItemStockDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateItemStockRequest;
use App\Http\Requests\UpdateItemStockRequest;
use App\Repositories\ItemStockRepository;
use App\Repositories\StockRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\ItemStock;
use App\Models\Stock;
use Response;
use Carbon\Carbon;
use DB;

class ItemStockController extends AppBaseController
{
    /** @var  ItemStockRepository */
    private $itemStockRepository;
    private $stockRepository;

    public function __construct(ItemStockRepository $itemStockRepo,StockRepository $stockRepo )
    {
        $this->itemStockRepository = $itemStockRepo;
        $this->stockRepository = $stockRepo;
    }

    /**
     * Display a listing of the ItemStock.
     *
     * @param ItemStockDataTable $itemStockDataTable
     * @return Response
     */
    public function index(ItemStockDataTable $itemStockDataTable)
    {
        return $itemStockDataTable->render('admin.item_stocks.index');
    }

    /**
     * Show the form for creating a new ItemStock.
     *
     * @return Response
     */
    public function create()
    {
        $num= count(ItemStock::all())+1;
        $code= 'ST'.$num;
        $action='create';
        
        return view('admin.item_stocks.create')
                ->with('action',$action)
                ->with('code',$code);
    }

    /**
     * Store a newly created ItemStock in storage.
     *
     * @param CreateItemStockRequest $request
     *
     * @return Response
     */
    public function store(CreateItemStockRequest $request)
    {
        $input = $request->all();
        $date = Carbon::now();
        //dd($input);
        $itemStock = $this->itemStockRepository->create($input);

        $dataStock = array(
            'id_itemstock' => $itemStock->id,
            'nama' => $itemStock['nama'],
            'kode' => $itemStock['kode_stock'],
            'jml_in' => 0,
            'jml_out' =>0,
            'stock_awal' => 0,
            'stock_akhir' => 0

         );
        //dd($dataStock);
        $stock = $this->stockRepository->create($dataStock);


       
        Flash::success('Item Stock saved successfully.');

        return redirect(route('itemStocks.index'));
    }

    /**
     * Display the specified ItemStock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itemStock = $this->itemStockRepository->findWithoutFail($id);

        if (empty($itemStock)) {
            Flash::error('Item Stock not found');

            return redirect(route('itemStocks.index'));
        }

        return view('admin.item_stocks.show')->with('itemStock', $itemStock);
    }

    /**
     * Show the form for editing the specified ItemStock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itemStock = $this->itemStockRepository->findWithoutFail($id);

        if (empty($itemStock)) {
            Flash::error('Item Stock not found');

            return redirect(route('itemStocks.index'));
        }

         $action='edit';

        return view('admin.item_stocks.edit')
            ->with('itemStock', $itemStock)
            ->with('action',$action);
    }

    /**
     * Update the specified ItemStock in storage.
     *
     * @param  int              $id
     * @param UpdateItemStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemStockRequest $request)
    {
        $itemStock = $this->itemStockRepository->findWithoutFail($id);
        $stock= $this->stockRepository->findWhere(['id_itemstock' => $id]);

        if (empty($itemStock)) {
            Flash::error('Item Stock not found');

            return redirect(route('itemStocks.index'));
        }

        $itemStock = $this->itemStockRepository->update($request->all(), $id);
        $dataStock = array(
            
            'nama' => $request['nama'],
            'kode' => $request['kode_stock']

         );
        $stock = $this->stockRepository->update($dataStock,$itemStock['id_itemstock']);

        Flash::success('Item Stock updated successfully.');

        return redirect(route('itemStocks.index'));
    }

    /**
     * Remove the specified ItemStock from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $itemStock = $this->itemStockRepository->findWithoutFail($id);

        if (empty($itemStock)) {
            Flash::error('Item Stock not found');

            return redirect(route('itemStocks.index'));
        }

        $this->itemStockRepository->delete($id);

        DB::table('stocks')->where('id_itemstock', '=', $id)->delete();

        Flash::success('Item Stock deleted successfully.');

        return redirect(route('itemStocks.index'));
    }


     
}
