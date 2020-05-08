<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Item;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    // Retrieve one random from table items and customers
    $item = Item::inRandomOrder()->first();
    $customer = Customer::inRandomOrder()->first();

    return [
        'quantity' => mt_rand(1, 15),
        'customer_id' => $customer->customer_id,
        'item_id' => $item->item_id,
        // Create the order date 50 days from now
        'date' => (new Carbon())->subDays(mt_rand(0, 50)),
    ];
});
