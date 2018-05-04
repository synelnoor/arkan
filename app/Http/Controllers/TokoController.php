<?php

namespace App\Http\Controllers;

use App\DataTables\TokoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTokoRequest;
use App\Http\Requests\UpdateTokoRequest;
use App\Repositories\TokoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TokoController extends AppBaseController
{
    /** @var  TokoRepository */
    private $tokoRepository;

    public function __construct(TokoRepository $tokoRepo)
    {
        $this->tokoRepository = $tokoRepo;
    }

    /**
     * Display a listing of the Toko.
     *
     * @param TokoDataTable $tokoDataTable
     * @return Response
     */
    public function index(TokoDataTable $tokoDataTable)
    {
        return $tokoDataTable->render('admin.tokos.index');
    }

    /**
     * Show the form for creating a new Toko.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tokos.create');
    }

    /**
     * Store a newly created Toko in storage.
     *
     * @param CreateTokoRequest $request
     *
     * @return Response
     */
    public function store(CreateTokoRequest $request)
    {
        $input = $request->all();

        $toko = $this->tokoRepository->create($input);

        Flash::success('Toko saved successfully.');

        return redirect(route('tokos.index'));
    }

    /**
     * Display the specified Toko.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            Flash::error('Toko not found');

            return redirect(route('tokos.index'));
        }

        return view('admin.tokos.show')->with('toko', $toko);
    }

    /**
     * Show the form for editing the specified Toko.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            Flash::error('Toko not found');

            return redirect(route('tokos.index'));
        }

        return view('admin.tokos.edit')->with('toko', $toko);
    }

    /**
     * Update the specified Toko in storage.
     *
     * @param  int              $id
     * @param UpdateTokoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTokoRequest $request)
    {
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            Flash::error('Toko not found');

            return redirect(route('tokos.index'));
        }

        $toko = $this->tokoRepository->update($request->all(), $id);

        Flash::success('Toko updated successfully.');

        return redirect(route('tokos.index'));
    }

    /**
     * Remove the specified Toko from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            Flash::error('Toko not found');

            return redirect(route('tokos.index'));
        }

        $this->tokoRepository->delete($id);

        Flash::success('Toko deleted successfully.');

        return redirect(route('tokos.index'));
    }
}
