<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LogStock",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_stock",
 *          description="id_stock",
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
 *          property="id_stockout",
 *          description="id_stockout",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tgl",
 *          description="tgl",
 *          type="string",
 *          format="date"
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
 *          property="id_itemstock",
 *          description="id_itemstock",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_detailstockin",
 *          description="id_detailstockin",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_detailstockout",
 *          description="id_detailstockout",
 *          type="integer",
 *          format="int32"
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
class LogStock extends Model
{
    use SoftDeletes;

    public $table = 'log_stocks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_stock' => 'integer',
        'id_stockin' => 'integer',
        'id_stockout' => 'integer',
        'tgl' => 'date',
        'nama' => 'string',
        'kode' => 'string',
        'id_itemstock' => 'integer',
        'id_detailstockin' => 'integer',
        'id_detailstockout' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function stock(){
        return $this->belongsTo('App\Models\Stock','id_stock','id');

    }

    public function itemstock(){
        return $this->belongsTo('App\Models\ItemStock','id_itemstock','id');

    }
    public function stockin(){
        return $this->belongsTo('App\Models\ItemStock','id_stockin','id');

    }
    public function stockout(){
        return $this->belongsTo('App\Models\ItemStock','id_stockout','id');
    }
    public function detailstockin(){
        return $this->belongsTo('App\Models\ItemStock','id_detailstockin','id');

    }
    public function detailstockout(){
        return $this->belongsTo('App\Models\ItemStock','id_detailstockout','id');

   }
    
}
