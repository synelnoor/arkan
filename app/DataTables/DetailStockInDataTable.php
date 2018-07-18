<?php

namespace App\DataTables;

use App\Models\DetailStockIn;
use Form;
use Yajra\Datatables\Services\DataTable;

class DetailStockInDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'detail_stock_ins.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $detailStockIns = DetailStockIn::query();

        return $this->applyScopes($detailStockIns);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'id_stockin' => ['name' => 'id_stockin', 'data' => 'id_stockin'],
            'id_itemstock' => ['name' => 'id_itemstock', 'data' => 'id_itemstock'],
            'nama' => ['name' => 'nama', 'data' => 'nama'],
            'kode' => ['name' => 'kode', 'data' => 'kode'],
            'tgl' => ['name' => 'tgl', 'data' => 'tgl'],
            'jml' => ['name' => 'jml', 'data' => 'jml']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'detailStockIns';
    }
}
