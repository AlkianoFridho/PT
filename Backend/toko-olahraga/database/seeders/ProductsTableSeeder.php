<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['category_id' => 1, 'name' => 'Soccer Ball', 'description' => 'High-quality soccer ball.', 'price' => 25.99, 'stock' => 100, 'image' => null],
            ['category_id' => 2, 'name' => 'Basketball', 'description' => 'Durable basketball for indoor and outdoor use.', 'price' => 30.50, 'stock' => 50, 'image' => null],
            ['category_id' => 3, 'name' => 'Tennis Racket', 'description' => 'Lightweight tennis racket.', 'price' => 75.00, 'stock' => 20, 'image' => null],
        ]);
    }
}
