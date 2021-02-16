<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('aboutus', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('block1')->default(1)->nullable();
            $table->string('title1')->nullable();
            $table->text('des1')->nullable();
            $table->tinyInteger('block2')->default(1)->nullable();
            $table->string('title2')->nullable();
            $table->text('des2')->nullable();
            $table->tinyInteger('block3')->default(1)->nullable();
            $table->string('title3')->nullable();
            $table->text('des3')->nullable();
            $table->tinyInteger('block4')->default(1)->nullable();
            $table->string('title4')->nullable();
            $table->text('des4')->nullable();
            $table->tinyInteger('block5')->default(1)->nullable();
            $table->string('title5')->nullable();
            $table->text('des5')->nullable();
            $table->tinyInteger('block6')->default(1)->nullable();
            $table->string('title6')->nullable();
            $table->text('des6')->nullable();
            $table->tinyInteger('block7')->default(1)->nullable();
            $table->string('title7')->nullable();
            $table->text('des7')->nullable();
            $table->tinyInteger('block8')->default(1)->nullable();
            $table->string('title8')->nullable();
            $table->text('des8')->nullable();
            $table->tinyInteger('block9')->default(1)->nullable();
            $table->string('title9')->nullable();
            $table->text('des9')->nullable();
            $table->tinyInteger('block10')->default(1)->nullable();
            $table->string('title10')->nullable();
            $table->text('des10')->nullable();
            $table->tinyInteger('block11')->default(1)->nullable();
            $table->string('title11')->nullable();
            $table->text('des11')->nullable();
            $table->tinyInteger('block12')->default(1)->nullable();
            $table->string('title12')->nullable();
            $table->text('des12')->nullable();
            $table->tinyInteger('block13')->default(1)->nullable();
            $table->string('title13')->nullable();
            $table->text('des13')->nullable();
            $table->tinyInteger('block14')->default(1)->nullable();
            $table->string('title14')->nullable();
            $table->text('des14')->nullable();
            $table->string('banner1')->nullable();
            $table->string('banner2')->nullable();
            $table->string('banner3')->nullable();
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
        Schema::dropIfExists('aboutus');
    }
}
