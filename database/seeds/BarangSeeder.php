<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Baju Koko',
                'harga_barang' => 60000,
                'harga_jual'  => 70000,
                'id_supplier'  => 2,
                'id_kategori'  => 1,
                'jumlah_barang' => 50,
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
            [
                'nama_barang' => 'Celana Sirwal',
                'harga_barang' => 80000,
                'harga_jual'  => 85000,
                'id_supplier'  => 2,
                'id_kategori'  => 1,
                'jumlah_barang' => 60,
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
            [
                'nama_barang' => 'Selimut',
                'harga_barang' => 60000,
                'harga_jual'  => 65000,
                'id_supplier'  => 2,
                'id_kategori'  => 2,
                'jumlah_barang' => 20,
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
        ]);
    }
}
