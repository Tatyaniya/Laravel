<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'desc' => $faker->text,
        'category_id' => mt_rand(5, 9),
        'price' => 100 * mt_rand(1, 10)
    ];
});
