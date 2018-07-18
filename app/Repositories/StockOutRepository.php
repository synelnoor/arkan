<?php

namespace App\Repositories;

use App\Models\StockOut;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockOutRepository
 * @package App\Repositories
 * @version June 30, 2018, 12:57 pm UTC
 *
 * @method StockOut findWithoutFail($id, $columns = ['*'])
 * @method StockOut find($id, $columns = ['*'])
 * @method StockOut first($columns = ['*'])
*/
class StockOutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'kode',
        'tgl',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StockOut::class;
    }
}
