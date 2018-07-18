<?php

namespace App\Http\Controllers;

use App\DataTables\DetailStockInDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDetailStockInRequest;
use App\Http\Requests\UpdateDetailStockInRequest;
use App\Repositories\DetailStockInRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DetailStockInController extends AppBaseController
{
    /** @var  DetailStockInRepository */
    private $detailStockInRepository;

    public function __construct(DetailStockInRepository $detailStockInRepo)
    {
        $this->detailStockInRepository = $detailStockInRepo;
    }

    /**
     * Display a listing of the DetailStockIn.
     *
     * @param DetailStockInDataTable $detailStockInDataTable
     * @return Response
     */
    public function index(DetailStockInDataTable $detailStockInDataTable)
    {
        return $detailStockInDataTable->render('detail_stock_ins.index');
    }

    /**
     * Show the form for creating a new DetailStockIn.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_stock_ins.create');
    }

    /**
     * Store a newly created DetailStockIn in storage.
     *
     * @param CreateDetailStockInRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailStockInRequest $request)
    {
        $input = $request->all();

        $detailStockIn = $this->detailStockInRepository->create($input);

        Flash::success('Detail Stock In saved successfully.');

        return redirect(route('detailStockIns.index'));
    }

    /**
     * Display the specified DetailStockIn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            Flash::error('Detail Stock In not found');

            return redirect(route('detailStockIns.index'));
        }

        return view('detail_stock_ins.show')->with('detailStockIn', $detailStockIn);
    }

    /**
     * Show the form for editing the specified DetailStockIn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            Flash::error('Detail Stock In not found');

            return redirect(route('detailStockIns.index'));
        }

        return view('detail_stock_ins.edit')->with('detailStockIn', $detailStockIn);
    }

    /**
     * Update the specified DetailStockIn in storage.
     *
     * @param  int              $id
     * @param UpdateDetailStockInRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailStockInRequest $request)
    {
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            Flash::error('Detail Stock In not found');

            return redirect(route('detailStockIns.index'));
        }

        $detailStockIn = $this->detailStockInRepository->update($request->all(), $id);

        Flash::success('Detail Stock In updated successfully.');

        return redirect(route('detailStockIns.index'));
    }

    /**
     * Remove the specified DetailStockIn from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            Flash::error('Detail Stock In not found');

            return redirect(route('detailStockIns.index'));
        }

        $this->detailStockInRepository->delete($id);

        Flash::success('Detail Stock In deleted successfully.');

        return redirect(route('detailStockIns.index'));
    }
}
