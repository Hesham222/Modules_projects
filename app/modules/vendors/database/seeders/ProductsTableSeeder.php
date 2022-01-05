<?php


use Illuminate\Database\Seeder;
use Vendors\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Red T-shirt',
            'category_id' => 1,
            'color' => 'Red',
            'price' => 100
        ]);
    }
}
