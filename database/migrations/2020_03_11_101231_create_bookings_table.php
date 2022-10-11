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
            
            $table->increments('booking_id');
            $table->string('booking_status');
            $table->string('booking_master',50);
            $table->time('booking_time');
            $table->date('booking_date');
            $table->time('booking_duration');
            $table->bigInteger('booking_amount');
            $table->string('booking_address',100);
            $table->integer('user_id');
            $table->integer('product_id');

            $table->timestamps();
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
