<?php

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        factory(Staff::class, 10)->create();
        factory(Item::class, 50)->create();
        factory(Customer::class, 20)->create();
        factory(Booking::class, 20)->create();
    }
}
