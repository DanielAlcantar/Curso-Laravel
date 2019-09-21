<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rol', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rol_id')->unsigned();
            $table->foreign('rol_id','fk_userrol_rols')->references('id')->on('rols')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id','fk_userrol_users')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('status');
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
        Schema::dropIfExists('user_rol');
    }
}
