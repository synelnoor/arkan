<?php

namespace App\Repositories;

use App\Models\DetailStockOut;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailStockOutRepository
 * @package App\Repositories
 * @version July 2, 2018, 11:38 am UTC
 *
 * @method DetailStockOut findWithoutFail($id, $columns = ['*'])
 * @method DetailStockOut find($id, $columns = ['*'])
 * @method DetailStockOut first($columns = ['*'])
*/
class DetailStockOutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_stockout',
        'id_itemstock',
        'nama',
        'kode',
        'tgl',
        'jml'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailStockOut::class;
    }
}
