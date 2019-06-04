<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermitRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role', 'fk_role_permit')->references('id')->on('role')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_permit');
            $table->foreign('id_permit', 'fk_permit_role')->references('id')->on('permit')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('permit_role');
    }
}
