<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaDiagnostico extends Model
{
    protected $table = 'fichas_diagnostico';

    protected $fillable = ['zona', 'calle', 'numero', 'nombre_edificio', 'piso', 'referencia', 'funcionarios_linea_1', 'funcionarios_linea_2', 'lunes_viernes_de', 'lunes_viernes_a', 'sabado_de', 'sabado_a', 'otro', 'tiene_senaletica', 'cantidad_senaletica', 'estado_senaletica', 'tiene_paneles', 'cantidad_paneles', 'estado_paneles', 'tiene_iluminacion', 'cantidad_iluminacion', 'estado_iluminacion', 'tiene_limpieza_ciudadano', 'cantidad_limpieza_ciudadano', 'estado_limpieza_ciudadano', 'tiene_limpieza_operadores', 'cantidad_limpieza_operadores', 'estado_limpieza_operadores', 'tiene_asientos_publico', 'cantidad_parados_asientos_publico', 'cantidad_sentados_asientos_publico', 'estado_asientos_publico', 'tiene_asientos_usuario', 'cantidad_parados_asientos_usuario', 'cantidad_sentados_asientos_usuario', 'estado_asientos_usuario', 'brinda_escritorio', 'brinda_folletos', 'brinda_web', 'brinda_ventanilla', 'brinda_fotocopias', 'brinda_telefono', 'brinda_meson', 'brinda_tripticos', 'brinda_verbal', 'requerimientos', 'punto_atencion_id'];

    /* Relationships */
    // 1 -> 1 (1)
    public function puntoAtencion(){
        return $this->belongsTo('App\PuntoAtencion');
    }

    // 1 -> N (1)
    public function elaboradoPor(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // N -> N (N)
    public function revisadoPor(){
        return $this->belongsToMany('App\User', 'ficha_diagnostico_user', 'ficha_diagnostico_id', 'user_id');
    }
}
