<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Reseller extends Model
{
    protected $table = "order_reseller";
    protected $fillable = [
        'id_reseller', 'id_barang', 'total_order','total_harga'
    ];
}
