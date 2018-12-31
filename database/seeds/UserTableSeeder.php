<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'admin',
            'username' => 'admin',
            'type' => 'admin',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
