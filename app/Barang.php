<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $fillable = [
        'nama_barang', 'harga_barang', 'jumlah_barang', 'harga_jual',
        'id_supplier', 'id_kategori'
    ];
}
