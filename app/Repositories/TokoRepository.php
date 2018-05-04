<?php

namespace App\Repositories;

use App\Models\Toko;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TokoRepository
 * @package App\Repositories
 * @version April 29, 2018, 11:55 am UTC
 *
 * @method Toko findWithoutFail($id, $columns = ['*'])
 * @method Toko find($id, $columns = ['*'])
 * @method Toko first($columns = ['*'])
*/
class TokoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'deskripsi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Toko::class;
    }
}
