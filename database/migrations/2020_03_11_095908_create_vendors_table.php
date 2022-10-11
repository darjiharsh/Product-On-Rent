<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            
            $table->increments('vendor_id');
            $table->string('vendor_name',30);
            $table->string('vendor_email',50);
            $table->string('vendor_password',10);
            $table->string('vendor_gender',10);
            $table->string('vendor_address',100);
            $table->string('vendor_image_path',100);

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
        Schema::dropIfExists('vendors');
    }
}
