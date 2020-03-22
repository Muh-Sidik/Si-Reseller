<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ResellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reseller')->insert([
            [
                'nama_reseller' => "Toko 1",
                'no_wa'         => "082182918274",
                'domisili'        => "Jogja",
                'created_at'    => Carbon::now(),
            ],
            [
                'nama_reseller' => "Toko 2",
                'no_wa'         => "082182918274",
                'domisili'        => "Jogja",
                'created_at'    => Carbon::now(),
            ],
            [
                'nama_reseller' => "Toko 3",
                'no_wa'         => "082182918274",
                'domisili'        => "Jogja",
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
