<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(60),
        'slug' => $faker->slug(),
        'is_active' => $faker->boolean,
        'in_stock' => $faker->boolean,
        'manage_stock' => false,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(10,9000),
        'sku' => $faker->word,
//        'brand_id' => $faker->word,
    ];
});
