<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Item::class, function (Faker $faker) {
    // Provide additional fakers; commerce
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

    return [
        'name' => $faker->productName,
        'description' => $faker->sentence($nbWords = mt_rand(8, 16), $variableNbWords = true),
        'price' => mt_rand(1, 20),
        'img_path' => '',
    ];
});
