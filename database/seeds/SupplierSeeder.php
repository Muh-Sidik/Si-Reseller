<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert([
            [
                'nama_supplier' => "Toko Bahagia",
                'alamat'        => "Jogja",
                'no_hp'         => "082182918274",
                'created_at'    => Carbon::now(),
            ],
            [
                'nama_supplier' => "Toko Online",
                'alamat'        => "Makassar",
                'no_hp'         => "082182918274",
                'created_at'    => Carbon::now(),
            ],
            [
                'nama_supplier' => "Jakarta Store",
                'alamat'        => "Jakarta",
                'no_hp'         => "082182918274",
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
