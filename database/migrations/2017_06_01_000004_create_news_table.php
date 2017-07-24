<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('lang', ['ru', 'en', 'ky'])->index();
            $table->integer('priority')->index();
            $table->string('title');
            $table->date('date')->useCurrent();
            $table->mediumText('preview');
            $table->text('content');
            $table->string('image');
            $table->tinyInteger('active');
            $table->tinyInteger('on_main');

            $table->string('meta_title');
            $table->string('meta_h1');
            $table->text('meta_keywords');
            $table->text('meta_description');


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
        Schema::dropIfExists('news');
    }
}
