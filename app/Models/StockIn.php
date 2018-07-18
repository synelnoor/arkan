<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="StockIn",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
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
 *          property="total",
 *          description="total",
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
class StockIn extends Model
{
    use SoftDeletes;

    public $table = 'stock_ins';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'kode',
        'tgl',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'kode' => 'string',
        'tgl' => 'date',
        'total' => 'decimal'
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
     public function detailstockin(){
        return $this->hasMany('App\Models\StockIn');
    }

    
}
