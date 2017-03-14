<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServidoresMunicipalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servidores_municipales', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->enum('genero', ['femenino', 'masculino'])->default('femenino');
            $table->integer('edad')->default(18);
            $table->string('cargo')->nullable();
            $table->string('puesto')->nullable();
            $table->string('turno')->nullable();
            $table->integer('antiguedad_años')->default(0);
            $table->integer('antiguedad_meses')->default(0);
            $table->enum('servidor', ['1ra_linea', '2da_linea', 'contrato']);
            $table->string('ubicacion')->nullable();

            /* Foreign Keys */
            $table->integer('punto_atencion_id')->unsigned();
            $table->foreign('punto_atencion_id')->references('id')
                ->on('puntos_atencion');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('servidor_municipal_user', function (Blueprint $table) {
            /* Foreign Keys */
            $table->integer('servidor_municipal_id')->unsigned();
            $table->foreign('servidor_municipal_id')->references('id')
                ->on('servidores_municipales');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users');
        });

        Schema::create('registro_cambios_servidores', function (Blueprint $table) {
            $table->string('campo');
            $table->string('valor_anterior');
            $table->string('valor_nuevo');
            $table->dateTime('fecha_cambio');

            /* Foreign Keys */
            $table->integer('servidor_municipal_id')->unsigned();
            $table->foreign('servidor_municipal_id')->references('id')
                ->on('servidores_municipales');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('registro_cambios_servidores');
        Schema::drop('servidor_municipal_user');
        Schema::drop('servidores_municipales');
    }
}
