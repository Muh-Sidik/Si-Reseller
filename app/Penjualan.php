<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = "penjualan";
    protected $fillable = [
        'id_reseller', 'id_barang', 'jumlah_jual', 'keuntungan', 'total_jual'
    ];
}
