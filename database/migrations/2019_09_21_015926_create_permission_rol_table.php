<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_rol', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rol_id')->unsigned();
            $table->foreign('rol_id','fk_permissionrol_rols')->references('id')->on('rols')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('permission_id')->unsigned();
            $table->foreign('permission_id','fk_permissionrol_permissions')->references('id')->on('permissions')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('permission_rol');
    }
}
