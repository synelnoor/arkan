<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 * @package App\Models
 * @version November 1, 2017, 2:46 pm UTC
 *
 * @property string nama_barang
 * @property decimal harga_beli
 * @property decimal harga-jual
 * @property string code_barang
 */
class Barang extends Model
{
    use SoftDeletes;

    public $table = 'barangs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'code_barang',
        'kategori_id',
        'toko_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_barang' => 'string',
        'code_barang' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_barang' => 'required',
        'harga_beli' => 'required',
        'harga_jual' => 'required',
        'code_barang' => 'required'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Category','kategori_id','id');
    }
    
    public function toko()
    {
        return $this->belongsTo('App\Models\Toko','toko_id','id');
    }
}
