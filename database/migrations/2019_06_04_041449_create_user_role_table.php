<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role', 'fk_role_user')->references('id')->on('role')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user', 'fk_user_role')->references('id')->on('user')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('state');
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
        Schema::dropIfExists('user_role');
    }
}
