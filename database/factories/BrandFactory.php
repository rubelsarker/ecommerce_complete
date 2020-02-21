<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'slug'      => Str::slug($faker->name),
        'status'    => 1,
        'logo'      => $faker->image($dir = 'public/upload/brand/', $width = 200, $height = 150),
    ];
});
