<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderReseller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_reseller', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_reseller');
            $table->integer('id_barang');
            $table->integer('total_order');
            $table->integer('total_harga');
            $table->integer('keuntungan');
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
        Schema::dropIfExists('order_reseller');
    }
}
