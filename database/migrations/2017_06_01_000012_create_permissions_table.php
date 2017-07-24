<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('module_id');
            $table->tinyInteger('create');
            $table->tinyInteger('read');
            $table->tinyInteger('update');
            $table->tinyInteger('delete');
            $table->tinyInteger('publish');

            $table->foreign('module_id')
                ->references('id')
                ->on('permissions');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        if ( Schema::hasTable('permissions') ){
            Schema::table('permissions', function (Blueprint $table) {
                $table->dropForeign('permissions_module_id_foreign');
                $table->dropColumn('module_id');
            });
        }

        Schema::dropIfExists('permissions');
    }
}
