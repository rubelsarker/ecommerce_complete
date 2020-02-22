<?php

use App\Model\Admin\Product;
use App\Model\Admin\ProductImage;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Product::class, 2)->create();
        factory(ProductImage::class, 30)->create();

    }
}
