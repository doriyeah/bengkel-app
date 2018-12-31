<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'nama' => 'mobil',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('category')->insert([
            'nama' => 'ban',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('category')->insert([
            'nama' => 'suspensi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
