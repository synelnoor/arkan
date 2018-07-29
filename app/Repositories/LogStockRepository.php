<?php

namespace App\Repositories;

use App\Models\LogStock;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LogStockRepository
 * @package App\Repositories
 * @version July 29, 2018, 8:45 am UTC
 *
 * @method LogStock findWithoutFail($id, $columns = ['*'])
 * @method LogStock find($id, $columns = ['*'])
 * @method LogStock first($columns = ['*'])
*/
class LogStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_stock',
        'id_stockin',
        'id_stockout',
        'tgl',
        'jml_in',
        'jml_out',
        'nama',
        'kode',
        'stock_awal',
        'stock_akhir',
        'id_itemstock',
        'id_detailstockin',
        'id_detailstockout'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LogStock::class;
    }
}
