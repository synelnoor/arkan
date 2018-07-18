<?php

namespace App\Repositories;

use App\Models\ItemStock;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ItemStockRepository
 * @package App\Repositories
 * @version June 25, 2018, 11:56 am UTC
 *
 * @method ItemStock findWithoutFail($id, $columns = ['*'])
 * @method ItemStock find($id, $columns = ['*'])
 * @method ItemStock first($columns = ['*'])
*/
class ItemStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'kode_stock',
        'satuan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ItemStock::class;
    }
}
