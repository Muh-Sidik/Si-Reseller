<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Pakaian',
                'created_at'    => Carbon::now(),
            ],
            [
                'nama_kategori' => "Selimut",
                'created_at'    => Carbon::now(),
            ],
        ]);
    }
}
