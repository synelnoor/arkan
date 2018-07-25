<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DetailStockIn",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_stockin",
 *          description="id_stockin",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_itemstock",
 *          description="id_itemstock",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kode",
 *          description="kode",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tgl",
 *          description="tgl",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DetailStockIn extends Model
{
    use SoftDeletes;

    public $table = 'detail_stock_ins';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_stockin',
        'id_itemstock',
        'nama',
        'kode',
        'tgl',
        'jml'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_stockin' => 'integer',
        'id_itemstock' => 'integer',
        'nama' => 'string',
        'kode' => 'string',
        'tgl' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

     public function stock(){
        return $this->hasMany('App\Models\Stock');
    }
     public function stockin(){
        return $this->belongsTo('App\Models\StockIn','id','id_stockin');
    }
    public function ItemStock(){
        return $this->belongsTo('App\Models\ItemStock','id','id_itemstock');
    }
    
}
