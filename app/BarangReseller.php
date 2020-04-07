<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangReseller extends Model
{
    protected $table = "barang_reseller";
    protected $fillable =[
        'id_reseller', 'id_barang', 'stock' , 'id_kategori', 'harga_beli', 'harga_jual'
    ];
}
