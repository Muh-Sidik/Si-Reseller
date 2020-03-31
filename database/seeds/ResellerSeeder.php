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
                'id_user'       => 2,
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
