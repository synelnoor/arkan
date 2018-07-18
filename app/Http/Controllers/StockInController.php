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
use Carbon\Carbon;

class StockInController extends AppBaseController
{
    /** @var  StockInRepository */
    private $stockInRepository;

    public function __construct(StockInRepository $stockInRepo)
    {
        $this->stockInRepository = $stockInRepo;
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

        $stockIn = $this->stockInRepository->create($input);

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

        if (empty($stockIn)) {
            Flash::error('Stock In not found');

            return redirect(route('stockIns.index'));
        }
        $action='edit';

        return view('admin.stock_ins.edit')
                ->with('stockIn', $stockIn)
                ->with('action',$action);
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
                             ->latest()
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
