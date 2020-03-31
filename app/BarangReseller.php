<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangReseller extends Model
{
    protected $table = "barang_reseller";
    protected $fillable =[
        'id_reseller', 'nama_barang', 'stock_barang', 'id_kategori', 'harga_beli', 'harga_jual', 'total_beli'
    ];
}
