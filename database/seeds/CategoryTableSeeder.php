<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $one = Category::create(['name' => 'Featured Products', 'description' => 'These are the featured products.']);
        $two = Category::create(['name' => 'Latest Products', 'description' => 'These are the latest products.']);
        $one = Category::create(['name' => 'Top Selling Products', 'description' => 'These are the top selling products.']);
    }
}
