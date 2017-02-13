<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->enum('type', ['admin', 'tecnico', 'tecnico_web', 'jefe']);
            $table->string('password');

            /* Foreign Key */
            $table->integer('unidad_organizacional_id')->unsigned();
            $table->foreign('unidad_organizacional_id')->references('id')
                ->on('unidades_organizacionales');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
