<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class ServidorMunicipal extends Model
{
    use SoftDeletes;

    protected $table = 'servidores_municipales';

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'genero', 'edad', 'cargo', 'puesto', 'turno', 'antiguedad_años', 'antiguedad_meses', 'servidor', 'ubicacion', 'punto_atencion_id'];

    /* Mutators */
    public function setNombreAttribute($value){
        if(isset($this->attributes['nombre']) && isset($this->original['nombre'])){
            if($this->original['nombre'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'nombre', 'valor_anterior' => $this->original['nombre'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['nombre'] = $value;
    }

    public function setApellidoPaternoAttribute($value){
        if(isset($this->attributes['apellido_paterno']) && isset($this->original['apellido_paterno'])){
            if($this->original['apellido_paterno'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'apellido_paterno', 'valor_anterior' => $this->original['apellido_paterno'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['apellido_paterno'] = $value;
    }

    public function setApellidoMaternoAttribute($value){
        if(isset($this->attributes['apellido_materno']) && isset($this->original['apellido_materno'])){
            if($this->original['apellido_materno'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'apellido_materno', 'valor_anterior' => $this->original['apellido_materno'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['apellido_materno'] = $value;
    }

    public function setGeneroAttribute($value){
        if(isset($this->attributes['genero']) && isset($this->original['genero'])){
            if($this->original['genero'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'genero', 'valor_anterior' => $this->original['genero'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['genero'] = $value;
    }

    public function setEdadAttribute($value){
        if(isset($this->attributes['edad']) && isset($this->original['edad'])){
            if($this->original['edad'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'edad', 'valor_anterior' => $this->original['edad'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['edad'] = $value;
    }

    public function setCargoAttribute($value){
        if(isset($this->attributes['cargo']) && isset($this->original['cargo'])){
            if($this->original['cargo'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cargo', 'valor_anterior' => $this->original['cargo'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cargo'] = $value;
    }

    public function setPuestoAttribute($value){
        if(isset($this->attributes['puesto']) && isset($this->original['puesto'])){
            if($this->original['puesto'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'puesto', 'valor_anterior' => $this->original['puesto'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['puesto'] = $value;
    }

    public function setTurnoAttribute($value){
        if(isset($this->attributes['turno']) && isset($this->original['turno'])){
            if($this->original['turno'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'turno', 'valor_anterior' => $this->original['turno'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['turno'] = $value;
    }

    public function setAntiguedadAñosAttribute($value){
        if(isset($this->attributes['antiguedad_años']) && isset($this->original['antiguedad_años'])){
            if($this->original['antiguedad_años'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'antiguedad_años', 'valor_anterior' => $this->original['antiguedad_años'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['antiguedad_años'] = $value;
    }

    public function setAntiguedadMesesAttribute($value){
        if(isset($this->attributes['antiguedad_meses']) && isset($this->original['antiguedad_meses'])){
            if($this->original['antiguedad_meses'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'antiguedad_meses', 'valor_anterior' => $this->original['antiguedad_meses'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['antiguedad_meses'] = $value;
    }

    public function setServidorAttribute($value){
        if(isset($this->attributes['servidor']) && isset($this->original['servidor'])){
            if($this->original['servidor'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'servidor', 'valor_anterior' => $this->original['servidor'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['servidor'] = $value;
    }

    public function setUbicacionAttribute($value){
        if(isset($this->attributes['ubicacion']) && isset($this->original['ubicacion'])){
            if($this->original['ubicacion'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'ubicacion', 'valor_anterior' => $this->original['ubicacion'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['ubicacion'] = $value;
    }

    /* Relationships */
    // 1 -> N (1)
    public function puntoAtencion(){
        return $this->belongsTo('App\PuntoAtencion', 'punto_atencion_id', 'id');
    }

    // 1 -> N (1)
    public function elaboradoPor(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // N -> N (N)
    public function revisadoPor(){
        return $this->belongsToMany('App\User', 'servidor_municipal_user', 'servidor_municipal_id', 'user_id');
    }

    // N -> N (N)
    public function cambioPor(){
        return $this->belongsToMany('App\User', 'registro_cambios_servidores', 'servidor_municipal_id', 'user_id')->withPivot('campo', 'valor_anterior', 'valor_nuevo', 'fecha_cambio')->orderBy('fecha_cambio', 'DESC');
    }
}
