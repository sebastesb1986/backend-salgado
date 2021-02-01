<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            
            $table->bigInteger('permiso_id')->unsigned();
            $table->foreign('permiso_id')->references('id')->on('permisos');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permisos');
    }
}
