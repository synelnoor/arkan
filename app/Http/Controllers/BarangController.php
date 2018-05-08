<?php

namespace App\Http\Controllers;

use App\DataTables\BarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Repositories\BarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Toko;
use App\Models\Category;
use App\Models\Barang;

use Response;

class BarangController extends AppBaseController
{
    /** @var  BarangRepository */
    private $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Barang.
     *
     * @param BarangDataTable $barangDataTable
     * @return Response
     */
    public function index(BarangDataTable $barangDataTable)
    {

        // $barangs = Barang::with('kategori')->with('toko')->get();
        // dd($barangs);
        return $barangDataTable->render('admin.barangs.index');
    }

    /**
     * Show the form for creating a new Barang.
     *
     * @return Response
     */
    public function create()
    {

        $kategori= Category::all();
        $toko = Toko::all();
        $def[''] = 'Please Select';
        $barcode = count(Barang::whereNull('deleted_at'))+1;
        $barang = '';
        $action='create';
        //dd($barcode);
        return view('admin.barangs.create')
                ->with('toko',$toko)
                ->with('kategori',$kategori)
                ->with('def',$def)
                ->with('action',$action)
                ->with('barang',$barang)
                ->with('barcode',$barcode);
    }

    /**
     * Store a newly created Barang in storage.
     *
     * @param CreateBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangRequest $request)
    {
        $input = $request->all();

        $barang = $this->barangRepository->create($input);

        Flash::success('Barang saved successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Display the specified Barang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        return view('admin.barangs.show')->with('barang', $barang);
    }

    /**
     * Show the form for editing the specified Barang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);
        $kategori= Category::all();
        $toko = Toko::all();
        $action= 'edit';
        $barcode = count(Barang::whereNull('deleted_at'))+1;

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        return view('admin.barangs.edit')
                ->with('barang', $barang)
                ->with('toko',$toko)
                ->with('kategori',$kategori)
                ->with('barcode',$barcode)
                ->with('action',$action);
    }

    /**
     * Update the specified Barang in storage.
     *
     * @param  int              $id
     * @param UpdateBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangRequest $request)
    {
        $barang = $this->barangRepository->findWithoutFail($id);
        //dd($request->all());

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $barang = $this->barangRepository->update($request->all(), $id);

        Flash::success('Barang updated successfully.');

        return redirect(route('barangs.index'));
    }

    /**
     * Remove the specified Barang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barang = $this->barangRepository->findWithoutFail($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barangs.index'));
        }

        $this->barangRepository->delete($id);

        Flash::success('Barang deleted successfully.');

        return redirect(route('barangs.index'));
    }
}
