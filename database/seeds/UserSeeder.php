<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => "admin",
                'password' => bcrypt("admin"),
                'level' => "admin",
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
            [
                'username' => "reseller",
                'password' => bcrypt("reseller"),
                'level' => "reseller",
                'created_at'    => Carbon::now()->timezone('Asia/Jakarta'),
            ],
        ]);
    }
}
