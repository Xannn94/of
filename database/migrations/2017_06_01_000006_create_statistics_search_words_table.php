<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsSearchWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics_search_words', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date')->useCurrent();
            $table->enum('lang', ['ru', 'en', 'ky'])->index();
            $table->ipAddress('ip');
            $table->string('query');
            $table->integer('results');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics_search_words');
    }
}
