<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BarangReseller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_reseller', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_reseller');
            $table->integer('id_barang');
            $table->integer('stock_barang');
            $table->integer('id_kategori');
            $table->integer('harga_beli');
            $table->integer('harga_jual')->default(0)->nullable();
            $table->integer('total_beli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_reseller');
    }
}
