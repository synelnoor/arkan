<?php

namespace App\Http\Controllers;

use App\DataTables\LogStockDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLogStockRequest;
use App\Http\Requests\UpdateLogStockRequest;
use App\Repositories\LogStockRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LogStockController extends AppBaseController
{
    /** @var  LogStockRepository */
    private $logStockRepository;

    public function __construct(LogStockRepository $logStockRepo)
    {
        $this->logStockRepository = $logStockRepo;
    }

    /**
     * Display a listing of the LogStock.
     *
     * @param LogStockDataTable $logStockDataTable
     * @return Response
     */
    public function index(LogStockDataTable $logStockDataTable)
    {
        return $logStockDataTable->render('log_stocks.index');
    }

    /**
     * Show the form for creating a new LogStock.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_stocks.create');
    }

    /**
     * Store a newly created LogStock in storage.
     *
     * @param CreateLogStockRequest $request
     *
     * @return Response
     */
    public function store(CreateLogStockRequest $request)
    {
        $input = $request->all();

        $logStock = $this->logStockRepository->create($input);

        Flash::success('Log Stock saved successfully.');

        return redirect(route('logStocks.index'));
    }

    /**
     * Display the specified LogStock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            Flash::error('Log Stock not found');

            return redirect(route('logStocks.index'));
        }

        return view('log_stocks.show')->with('logStock', $logStock);
    }

    /**
     * Show the form for editing the specified LogStock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            Flash::error('Log Stock not found');

            return redirect(route('logStocks.index'));
        }

        return view('log_stocks.edit')->with('logStock', $logStock);
    }

    /**
     * Update the specified LogStock in storage.
     *
     * @param  int              $id
     * @param UpdateLogStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogStockRequest $request)
    {
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            Flash::error('Log Stock not found');

            return redirect(route('logStocks.index'));
        }

        $logStock = $this->logStockRepository->update($request->all(), $id);

        Flash::success('Log Stock updated successfully.');

        return redirect(route('logStocks.index'));
    }

    /**
     * Remove the specified LogStock from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            Flash::error('Log Stock not found');

            return redirect(route('logStocks.index'));
        }

        $this->logStockRepository->delete($id);

        Flash::success('Log Stock deleted successfully.');

        return redirect(route('logStocks.index'));
    }
}
