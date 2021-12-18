<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Book',
            'description' => '',
            'thumbnail' => ''],
            ['name' => 'Kitchen',
            'description' => '',
            'thumbnail' => ''],
            ['name' => 'Electronic',
            'description' => '',
            'thumbnail' => ''],
        ]);
    }
}
