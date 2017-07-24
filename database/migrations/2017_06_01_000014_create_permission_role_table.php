<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('roles_id');
            $table->unsignedInteger('permission_id');

            $table->unique(['permission_id', 'roles_id']);

            $table->foreign('roles_id')
                ->references('id')
                ->on('roles');

            $table->foreign('permission_id')
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
        if ( Schema::hasTable('permission_roles') ){
            Schema::table('permission_roles', function (Blueprint $table) {
                $table->dropForeign('permission_roles_roles_id_foreign');
                $table->dropColumn('roles_id');
                $table->dropForeign('permission_roles_permission_id_foreign');
                $table->dropColumn('permission_id');
            });
        }

        Schema::dropIfExists('permission_roles');
    }
}
