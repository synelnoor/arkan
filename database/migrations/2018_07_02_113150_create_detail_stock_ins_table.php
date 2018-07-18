<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailStockInsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_stock_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_stockin');
            $table->integer('id_itemstock');
            $table->string('nama');
            $table->string('kode');
            $table->date('tgl');
            $table->decimal('jml',11,1);
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
        Schema::drop('detail_stock_ins');
    }
}
