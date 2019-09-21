<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_loan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id','fk_bookloan_users')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('book_id','fk_bookloan_books')->references('id')->on('books')->onDelete('restrict')->onUpdate('restrict');
            $table->date('date_loan');
            $table->string('loan_to', 100);
            $table->boolean('status');
            $table->date('date_return')->nullable();
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
        Schema::dropIfExists('book_loan');
    }
}
