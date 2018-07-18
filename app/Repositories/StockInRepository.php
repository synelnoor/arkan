<?php

namespace App\Repositories;

use App\Models\StockIn;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockInRepository
 * @package App\Repositories
 * @version June 30, 2018, 12:55 pm UTC
 *
 * @method StockIn findWithoutFail($id, $columns = ['*'])
 * @method StockIn find($id, $columns = ['*'])
 * @method StockIn first($columns = ['*'])
*/
class StockInRepository extends BaseRepository
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
        return StockIn::class;
    }
}
