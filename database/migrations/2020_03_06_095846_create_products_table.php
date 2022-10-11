<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_details',500);
            $table->bigInteger('product_cost');
            $table->integer('product_quantity');
            $table->string('product_note',200);
            $table->string('product_img_path',200);
            $table->integer('subcategory_id');
            $table->integer('vendor_id');
            

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
        Schema::dropIfExists('products');
    }
}
