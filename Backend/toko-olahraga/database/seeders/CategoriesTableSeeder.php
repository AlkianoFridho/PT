<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Soccer', 'description' => 'All soccer-related products.'],
            ['name' => 'Basketball', 'description' => 'All basketball-related products.'],
            ['name' => 'Tennis', 'description' => 'All tennis-related products.'],
        ]);
    }
}
