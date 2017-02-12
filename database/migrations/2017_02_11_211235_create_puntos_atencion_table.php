<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntosAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_atencion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->enum('tipo', ['servicio', 'tramite']);

            /* Foreign Key */
            $table->integer('unidad_organizacional_id')->unsigned();
            $table->foreign('unidad_organizacional_id')->references('id')
                ->on('unidades_organizacionales');

            /* Index */
            $table->unique(['nombre', 'unidad_organizacional_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('puntos_atencion');
    }
}
