<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Stock",
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
 *          property="jml_in",
 *          description="jml_in",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="jml_out",
 *          description="jml_out",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="stock_awal",
 *          description="stock_awal",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="stock_akhir",
 *          description="stock_akhir",
 *          type="number",
 *          format="float"
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
class Stock extends Model
{
    use SoftDeletes;

    public $table = 'stocks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_stockin',
        'id_stockout',
        'nama',
        'kode',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_stockin' => 'integer',
        'id_stockout' => 'integer',
        'tgl' => 'date',
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
