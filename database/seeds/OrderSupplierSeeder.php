<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_supplier')->insert([
            [
                'id_barang'     =>  1,
                'id_supplier'   =>  2,
                'id_kategori'   =>  1,
                'total_order'   =>  50,
                'total_harga'   =>  3000000,
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
            [
                'id_barang'     =>  2,
                'id_supplier'   =>  2,
                'id_kategori'   =>  1,
                'total_order'   =>  60,
                'total_harga'   =>  4800000,
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
            [
                'id_barang'     =>  3,
                'id_supplier'   =>  2,
                'id_kategori'   =>  2,
                'total_order'   =>  20,
                'total_harga'   =>  1200000,
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
        ]);
    }
}
