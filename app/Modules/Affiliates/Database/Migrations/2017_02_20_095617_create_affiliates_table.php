<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id');
            $table->enum('lang', ['ru', 'en'])->index();
            $table->integer('priority')->index();
            $table->string('title');
            $table->tinyInteger('active');
            $table->text('address');
            $table->string('phone');
            $table->string('work_time');
            $table->string('work_break');
            $table->float('lat');
            $table->float('lng');
            $table->integer('zoom',false,true);

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
        Schema::dropIfExists('affiliates');
    }
}
