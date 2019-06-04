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
            $table->unsignedBigInteger('id_book');
            $table->foreign('id_book', 'fk_book_user')->references('id')->on('book')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user', 'fk_user_book')->references('id')->on('user')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('state');
            $table->date('loan');
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
