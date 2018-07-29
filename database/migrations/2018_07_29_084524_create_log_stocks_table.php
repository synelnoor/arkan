<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogStocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_stock');
            $table->integer('id_stockin');
            $table->integer('id_stockout');
            $table->date('tgl');
            $table->decimal('jml_in',11,1);
            $table->decimal('jml_out',11,1);
            $table->string('nama');
            $table->string('kode');
            $table->decimal('stock_awal',11,1);
            $table->decimal('stock_akhir',11,1);
            $table->integer('id_itemstock');
            $table->integer('id_detailstockin');
            $table->integer('id_detailstockout');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_stocks');
    }
}
