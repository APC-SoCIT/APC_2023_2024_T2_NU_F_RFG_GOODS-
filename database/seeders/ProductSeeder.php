<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            'category' => Str::random(1),
        ]);
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'sku' => Str::random(20),
                'image' => Str::random(20),
                'name' => Str::random(20),
                'price' => random_int(1, 100),
                'category_id' => 1,
                'desc' => Str::random(100),
                'min_qty' => random_int(1, 10),
                'max_qty' => random_int(11, 20),
                'reorder_pt' => random_int(5, 10),
            ]);
        }
    }
}