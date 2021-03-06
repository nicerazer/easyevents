<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->integer('quantity');

            $table->timestamp('date');

            $table->timestamps();
        });
        Schema::table('bookings', function (Blueprint $table) {
            // Foreign keys
            $table->unsignedBigInteger('customer_id')->after('booking_id');
            $table->unsignedBigInteger('item_id')->after('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
