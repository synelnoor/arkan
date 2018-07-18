<?php

namespace App\Repositories;

use App\Models\Stock;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockRepository
 * @package App\Repositories
 * @version July 3, 2018, 12:33 pm UTC
 *
 * @method Stock findWithoutFail($id, $columns = ['*'])
 * @method Stock find($id, $columns = ['*'])
 * @method Stock first($columns = ['*'])
*/
class StockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_stockin',
        'id_stockout',
        'tgl',
        'jml_in',
        'jml_out',
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
        return Stock::class;
    }
}
