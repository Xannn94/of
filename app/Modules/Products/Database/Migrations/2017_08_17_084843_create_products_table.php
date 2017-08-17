<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->float('price');
            $table->float('price_line');
            $table->string('code');
            $table->string('size_range');
            $table->integer('quantity');
            $table->string('unit_weight');
            $table->string('series_weight');
            $table->string('images');

            $table->string('meta_title');
            $table->string('meta_h1');
            $table->text('meta_keywords');
            $table->text('meta_description');

            $table->timestamps();
        });

        Schema::create('product_color', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('color_id');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_color');
    }
}
