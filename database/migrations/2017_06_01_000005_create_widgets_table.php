<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('lang', ['ru', 'en', 'ky'])->index();
            $table->tinyInteger('protected');
            $table->tinyInteger('active');

            $table->enum('type', ['html', 'wysiwyg'])->index();

            $table->string('slug', 50)->index();
            $table->string('title');
            $table->text('content');
            $table->text('description');

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
        Schema::dropIfExists('widgets');
    }
}
