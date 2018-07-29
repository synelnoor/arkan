<?php

namespace App\DataTables;

use App\Models\LogStock;
use Form;
use Yajra\Datatables\Services\DataTable;

class LogStockDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'log_stocks.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $logStocks = LogStock::query();

        return $this->applyScopes($logStocks);
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
            'id_stock' => ['name' => 'id_stock', 'data' => 'id_stock'],
            'id_stockin' => ['name' => 'id_stockin', 'data' => 'id_stockin'],
            'id_stockout' => ['name' => 'id_stockout', 'data' => 'id_stockout'],
            'tgl' => ['name' => 'tgl', 'data' => 'tgl'],
            'jml_in' => ['name' => 'jml_in', 'data' => 'jml_in'],
            'jml_out' => ['name' => 'jml_out', 'data' => 'jml_out'],
            'nama' => ['name' => 'nama', 'data' => 'nama'],
            'kode' => ['name' => 'kode', 'data' => 'kode'],
            'stock_awal' => ['name' => 'stock_awal', 'data' => 'stock_awal'],
            'stock_akhir' => ['name' => 'stock_akhir', 'data' => 'stock_akhir'],
            'id_itemstock' => ['name' => 'id_itemstock', 'data' => 'id_itemstock'],
            'id_detailstockin' => ['name' => 'id_detailstockin', 'data' => 'id_detailstockin'],
            'id_detailstockout' => ['name' => 'id_detailstockout', 'data' => 'id_detailstockout']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'logStocks';
    }
}
