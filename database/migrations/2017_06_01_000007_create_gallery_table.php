<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('priority')->index();
            $table->tinyInteger('active');
            $table->date('date')->useCurrent();

            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_ky');
            $table->mediumText('preview_en');
            $table->mediumText('preview_ru');
            $table->mediumText('preview_ky');
            $table->text('content_en');
            $table->text('content_ru');
            $table->text('content_ky');

            $table->string('image');


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
        Schema::dropIfExists('gallery');
    }
}
