<?php

namespace App\Http\Controllers;

use App\DataTables\DetailStockOutDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDetailStockOutRequest;
use App\Http\Requests\UpdateDetailStockOutRequest;
use App\Repositories\DetailStockOutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DetailStockOutController extends AppBaseController
{
    /** @var  DetailStockOutRepository */
    private $detailStockOutRepository;

    public function __construct(DetailStockOutRepository $detailStockOutRepo)
    {
        $this->detailStockOutRepository = $detailStockOutRepo;
    }

    /**
     * Display a listing of the DetailStockOut.
     *
     * @param DetailStockOutDataTable $detailStockOutDataTable
     * @return Response
     */
    public function index(DetailStockOutDataTable $detailStockOutDataTable)
    {
        return $detailStockOutDataTable->render('detail_stock_outs.index');
    }

    /**
     * Show the form for creating a new DetailStockOut.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_stock_outs.create');
    }

    /**
     * Store a newly created DetailStockOut in storage.
     *
     * @param CreateDetailStockOutRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailStockOutRequest $request)
    {
        $input = $request->all();

        $detailStockOut = $this->detailStockOutRepository->create($input);

        Flash::success('Detail Stock Out saved successfully.');

        return redirect(route('detailStockOuts.index'));
    }

    /**
     * Display the specified DetailStockOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            Flash::error('Detail Stock Out not found');

            return redirect(route('detailStockOuts.index'));
        }

        return view('detail_stock_outs.show')->with('detailStockOut', $detailStockOut);
    }

    /**
     * Show the form for editing the specified DetailStockOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            Flash::error('Detail Stock Out not found');

            return redirect(route('detailStockOuts.index'));
        }

        return view('detail_stock_outs.edit')->with('detailStockOut', $detailStockOut);
    }

    /**
     * Update the specified DetailStockOut in storage.
     *
     * @param  int              $id
     * @param UpdateDetailStockOutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailStockOutRequest $request)
    {
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            Flash::error('Detail Stock Out not found');

            return redirect(route('detailStockOuts.index'));
        }

        $detailStockOut = $this->detailStockOutRepository->update($request->all(), $id);

        Flash::success('Detail Stock Out updated successfully.');

        return redirect(route('detailStockOuts.index'));
    }

    /**
     * Remove the specified DetailStockOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            Flash::error('Detail Stock Out not found');

            return redirect(route('detailStockOuts.index'));
        }

        $this->detailStockOutRepository->delete($id);

        Flash::success('Detail Stock Out deleted successfully.');

        return redirect(route('detailStockOuts.index'));
    }
}
