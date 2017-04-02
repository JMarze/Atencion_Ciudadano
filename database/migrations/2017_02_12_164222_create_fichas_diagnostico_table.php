<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_diagnostico', function (Blueprint $table) {
            $table->increments('id');

            $table->string('zona');
            $table->string('calle');
            $table->string('numero')->nullable();
            $table->string('nombre_edificio')->nullable();
            $table->string('piso')->nullable();
            $table->string('referencia')->nullable();

            $table->integer('funcionarios_linea_1')->default(0);
            $table->integer('funcionarios_linea_2')->default(0);
            $table->time('lunes_viernes_de');
            $table->time('lunes_viernes_a');
            $table->time('sabado_de')->nullable();
            $table->time('sabado_a')->nullable();
            $table->string('otro')->nullable();

            $table->boolean('tiene_senaletica')->default(false);
            $table->integer('cantidad_senaletica')->default(0);
            $table->string('estado_senaletica')->nullable();

            $table->boolean('tiene_paneles')->default(false);
            $table->integer('cantidad_paneles')->default(0);
            $table->string('estado_paneles')->nullable();

            $table->boolean('tiene_iluminacion')->default(false);
            $table->integer('cantidad_iluminacion')->default(0);
            $table->string('estado_iluminacion')->nullable();

            $table->boolean('tiene_limpieza_ciudadano')->default(false);
            $table->integer('cantidad_limpieza_ciudadano')->default(0);
            $table->string('estado_limpieza_ciudadano')->nullable();

            $table->boolean('tiene_limpieza_operadores')->default(false);
            $table->integer('cantidad_limpieza_operadores')->default(0);
            $table->string('estado_limpieza_operadores')->nullable();

            $table->boolean('tiene_asientos_publico')->default(false);
            $table->integer('cantidad_parados_asientos_publico')->default(0);
            $table->integer('cantidad_sentados_asientos_publico')->default(0);
            $table->string('estado_asientos_publico')->nullable();

            $table->boolean('tiene_asientos_usuario')->default(false);
            $table->integer('cantidad_parados_asientos_usuario')->default(0);
            $table->integer('cantidad_sentados_asientos_usuario')->default(0);
            $table->string('estado_asientos_usuario')->nullable();

            $table->boolean('brinda_escritorio')->default(false);
            $table->boolean('brinda_folletos')->default(false);
            $table->boolean('brinda_web')->default(false);
            $table->boolean('brinda_ventanilla')->default(false);
            $table->boolean('brinda_fotocopias')->default(false);
            $table->boolean('brinda_telefono')->default(false);
            $table->boolean('brinda_meson')->default(false);
            $table->boolean('brinda_tripticos')->default(false);
            $table->boolean('brinda_verbal')->default(false);

            $table->text('requerimientos')->nullable();

            $table->boolean('tiene_facilitador_usuario')->default(false);
            $table->boolean('tiene_sistema_fichas')->default(false);
            $table->boolean('tiene_asientos_espera')->default(false);
            $table->boolean('tiene_pantallas_turno')->default(false);
            $table->boolean('tiene_rampa_acceso')->default(false);

            $table->text('atencion_preferencial')->nullable();
            $table->text('observaciones')->nullable();

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

        Schema::create('ficha_diagnostico_user', function (Blueprint $table) {
            /* Foreign Keys */
            $table->integer('ficha_diagnostico_id')->unsigned();
            $table->foreign('ficha_diagnostico_id')->references('id')
                ->on('fichas_diagnostico');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users');
        });

        Schema::create('registro_cambios', function (Blueprint $table) {
            $table->string('campo');
            $table->string('valor_anterior');
            $table->string('valor_nuevo');
            $table->dateTime('fecha_cambio');

            /* Foreign Keys */
            $table->integer('ficha_diagnostico_id')->unsigned();
            $table->foreign('ficha_diagnostico_id')->references('id')
                ->on('fichas_diagnostico');

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
        Schema::drop('registro_cambios');
        Schema::drop('ficha_diagnostico_user');
        Schema::drop('fichas_diagnostico');
    }
}
