<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Supplier extends Model
{
    protected $table = "order_supplier";
    protected $fillable = [
        'id_barang', 'id_supplier', 'id_kategori', 'total_order', 'total_harga'
    ];
}
