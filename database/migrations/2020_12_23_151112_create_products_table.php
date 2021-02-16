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
            $table->id();
            $table->tinyInteger('category_id');
            $table->tinyInteger('subcategory_id')->nullable();
            $table->tinyInteger('brand_id')->nullable();
            $table->string('product_name');
            $table->string('product_code');
            $table->tinyInteger('product_quantity');
            $table->text('product_details');
            $table->string('product_color');
            $table->string('product_size');
            $table->mediumInteger('selling_price');
            $table->mediumInteger('discount_price')->nullable();
            $table->string('video_link')->nullable();
            $table->tinyInteger('main_slider')->nullable();
            $table->tinyInteger('hot_deal')->nullable();
            $table->tinyInteger('best_rated')->nullable();
            $table->tinyInteger('mid_slider')->nullable();
            $table->tinyInteger('hot_new')->nullable();
            $table->tinyInteger('trend')->nullable();
            $table->tinyInteger('buyone_getone')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->tinyInteger('status')->nullable();
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
