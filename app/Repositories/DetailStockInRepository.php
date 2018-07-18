<?php

namespace App\Repositories;

use App\Models\DetailStockIn;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailStockInRepository
 * @package App\Repositories
 * @version July 2, 2018, 11:31 am UTC
 *
 * @method DetailStockIn findWithoutFail($id, $columns = ['*'])
 * @method DetailStockIn find($id, $columns = ['*'])
 * @method DetailStockIn first($columns = ['*'])
*/
class DetailStockInRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_stockin',
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
        return DetailStockIn::class;
    }
}
