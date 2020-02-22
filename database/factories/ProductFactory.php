<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\ProductImage;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'                  => $faker->word,
        'p_code'                => 'P-'.time(),
        'brand_id'              => Brand::all()->random()->id,
        'cat_id'                => Category::all()->random()->id,
        'unit'                  => 'Pc',
        'quantity'              => $faker->numberBetween($min = 10, $max = 200),
        'price'                 => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'description'           => $faker->paragraph,
        'slug'                  => Str::slug($faker->word),
        'status'                => 1,
        'variant'               => 0,
        'discount'              => 1,
        'discount_percent'      => $faker->numberBetween($min = 10, $max = 40)
    ];
});

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'p_id'    => factory(Product::class),
        'image'   => 'public/upload/product/default.png',
    ];
});
