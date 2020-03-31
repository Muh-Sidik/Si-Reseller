<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // $this->call(ResellerSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(KategoriSeeder::class);
    }
}
