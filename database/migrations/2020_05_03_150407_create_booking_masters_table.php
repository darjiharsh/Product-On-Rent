<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_masters', function (Blueprint $table) {
            $table->increments('booking_master_id');
            $table->date('date');
            $table->integer('user_id');
            $table->integer('total');
            $table->string('status');
            $table->string('booking_status');
            $table->string('payment_method');
            $table->string('shipping_name');
            $table->string('shipping_mobile');
            $table->string('shipping_address',500);
            $table->string('state');
            $table->string('city');
            $table->integer('pincode');
            $table->string('special_note',500);
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
        Schema::dropIfExists('booking_masters');
    }
}
