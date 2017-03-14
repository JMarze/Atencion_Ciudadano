<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class FichaDiagnostico extends Model
{
    use SoftDeletes;

    protected $table = 'fichas_diagnostico';

    protected $fillable = ['zona', 'calle', 'numero', 'nombre_edificio', 'piso', 'referencia', 'funcionarios_linea_1', 'funcionarios_linea_2', 'lunes_viernes_de', 'lunes_viernes_a', 'sabado_de', 'sabado_a', 'otro', 'tiene_senaletica', 'cantidad_senaletica', 'estado_senaletica', 'tiene_paneles', 'cantidad_paneles', 'estado_paneles', 'tiene_iluminacion', 'cantidad_iluminacion', 'estado_iluminacion', 'tiene_limpieza_ciudadano', 'cantidad_limpieza_ciudadano', 'estado_limpieza_ciudadano', 'tiene_limpieza_operadores', 'cantidad_limpieza_operadores', 'estado_limpieza_operadores', 'tiene_asientos_publico', 'cantidad_parados_asientos_publico', 'cantidad_sentados_asientos_publico', 'estado_asientos_publico', 'tiene_asientos_usuario', 'cantidad_parados_asientos_usuario', 'cantidad_sentados_asientos_usuario', 'estado_asientos_usuario', 'brinda_escritorio', 'brinda_folletos', 'brinda_web', 'brinda_ventanilla', 'brinda_fotocopias', 'brinda_telefono', 'brinda_meson', 'brinda_tripticos', 'brinda_verbal', 'requerimientos', 'punto_atencion_id'];

    /* Mutators */
    public function setZonaAttribute($value){
        if(isset($this->attributes['zona']) && isset($this->original['zona'])){
            if($this->original['zona'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'zona', 'valor_anterior' => $this->original['zona'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['zona'] = $value;
    }

    public function setCalleAttribute($value){
        if(isset($this->attributes['calle']) && isset($this->original['calle'])){
            if($this->original['calle'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'calle', 'valor_anterior' => $this->original['calle'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['calle'] = $value;
    }

    public function setNumeroAttribute($value){
        if(isset($this->attributes['numero']) && isset($this->original['numero'])){
            if($this->original['numero'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'numero', 'valor_anterior' => $this->original['numero'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['numero'] = $value;
    }

    public function setNombreEdificioAttribute($value){
        if(isset($this->attributes['nombre_edificio']) && isset($this->original['nombre_edificio'])){
            if($this->original['nombre_edificio'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'nombre_edificio', 'valor_anterior' => $this->original['nombre_edificio'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['nombre_edificio'] = $value;
    }

    public function setPisoAttribute($value){
        if(isset($this->attributes['piso']) && isset($this->original['piso'])){
            if($this->original['piso'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'piso', 'valor_anterior' => $this->original['piso'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['piso'] = $value;
    }

    public function setReferenciaAttribute($value){
        if(isset($this->attributes['referencia']) && isset($this->original['referencia'])){
            if($this->original['referencia'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'referencia', 'valor_anterior' => $this->original['referencia'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['referencia'] = $value;
    }

    public function setFuncionariosLinea1Attribute($value){
        if(isset($this->attributes['funcionarios_linea_1']) && isset($this->original['funcionarios_linea_1'])){
            if($this->original['funcionarios_linea_1'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'funcionarios_linea_1', 'valor_anterior' => $this->original['funcionarios_linea_1'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['funcionarios_linea_1'] = $value;
    }

    public function setFuncionariosLinea2Attribute($value){
        if(isset($this->attributes['funcionarios_linea_2']) && isset($this->original['funcionarios_linea_2'])){
            if($this->original['funcionarios_linea_2'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'funcionarios_linea_2', 'valor_anterior' => $this->original['funcionarios_linea_2'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['funcionarios_linea_2'] = $value;
    }

    public function setLunesViernesDeAttribute($value){
        if(isset($this->attributes['lunes_viernes_de']) && isset($this->original['lunes_viernes_de'])){
            if($this->original['lunes_viernes_de'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'lunes_viernes_de', 'valor_anterior' => $this->original['lunes_viernes_de'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['lunes_viernes_de'] = $value;
    }

    public function setLunesViernesAAttribute($value){
        if(isset($this->attributes['lunes_viernes_a']) && isset($this->original['lunes_viernes_a'])){
            if($this->original['lunes_viernes_a'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'lunes_viernes_a', 'valor_anterior' => $this->original['lunes_viernes_a'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['lunes_viernes_a'] = $value;
    }

    public function setSabadoDeAttribute($value){
        if(isset($this->attributes['sabado_de']) && isset($this->original['sabado_de'])){
            if($this->original['sabado_de'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'sabado_de', 'valor_anterior' => $this->original['sabado_de'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['sabado_de'] = $value;
    }

    public function setSabadoAAttribute($value){
        if(isset($this->attributes['sabado_a']) && isset($this->original['sabado_a'])){
            if($this->original['sabado_a'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'sabado_a', 'valor_anterior' => $this->original['sabado_a'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['sabado_a'] = $value;
    }

    public function setOtroAttribute($value){
        if(isset($this->attributes['otro']) && isset($this->original['otro'])){
            if($this->original['otro'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'otro', 'valor_anterior' => $this->original['otro'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['otro'] = $value;
    }

    public function setTieneSenaleticaAttribute($value){
        if(isset($this->attributes['tiene_senaletica']) && isset($this->original['tiene_senaletica'])){
            if($this->original['tiene_senaletica'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_senaletica', 'valor_anterior' => $this->original['tiene_senaletica'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_senaletica'] = $value;
    }

    public function setCantidadSenaleticaAttribute($value){
        if(isset($this->attributes['cantidad_senaletica']) && isset($this->original['cantidad_senaletica'])){
            if($this->original['cantidad_senaletica'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_senaletica', 'valor_anterior' => $this->original['cantidad_senaletica'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_senaletica'] = $value;
    }

    public function setEstadoSenaleticaAttribute($value){
        if(isset($this->attributes['estado_senaletica']) && isset($this->original['estado_senaletica'])){
            if($this->original['estado_senaletica'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_senaletica', 'valor_anterior' => $this->original['estado_senaletica'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_senaletica'] = $value;
    }

    public function setTienePanelesAttribute($value){
        if(isset($this->attributes['tiene_paneles']) && isset($this->original['tiene_paneles'])){
            if($this->original['tiene_paneles'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_paneles', 'valor_anterior' => $this->original['tiene_paneles'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_paneles'] = $value;
    }

    public function setCantidadPanelesAttribute($value){
        if(isset($this->attributes['cantidad_paneles']) && isset($this->original['cantidad_paneles'])){
            if($this->original['cantidad_paneles'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_paneles', 'valor_anterior' => $this->original['cantidad_paneles'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_paneles'] = $value;
    }

    public function setEstadoPanelesAttribute($value){
        if(isset($this->attributes['estado_paneles']) && isset($this->original['estado_paneles'])){
            if($this->original['estado_paneles'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_paneles', 'valor_anterior' => $this->original['estado_paneles'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_paneles'] = $value;
    }

    public function setTieneIluminacionAttribute($value){
        if(isset($this->attributes['tiene_iluminacion']) && isset($this->original['tiene_iluminacion'])){
            if($this->original['tiene_iluminacion'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_iluminacion', 'valor_anterior' => $this->original['tiene_iluminacion'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_iluminacion'] = $value;
    }

    public function setCantidadIluminacionAttribute($value){
        if(isset($this->attributes['cantidad_iluminacion']) && isset($this->original['cantidad_iluminacion'])){
            if($this->original['cantidad_iluminacion'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_iluminacion', 'valor_anterior' => $this->original['cantidad_iluminacion'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_iluminacion'] = $value;
    }

    public function setEstadoIluminacionAttribute($value){
        if(isset($this->attributes['estado_iluminacion']) && isset($this->original['estado_iluminacion'])){
            if($this->original['estado_iluminacion'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_iluminacion', 'valor_anterior' => $this->original['estado_iluminacion'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_iluminacion'] = $value;
    }

    public function setTieneLimpiezaCiudadanoAttribute($value){
        if(isset($this->attributes['tiene_limpieza_ciudadano']) && isset($this->original['tiene_limpieza_ciudadano'])){
            if($this->original['tiene_limpieza_ciudadano'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_limpieza_ciudadano', 'valor_anterior' => $this->original['tiene_limpieza_ciudadano'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_limpieza_ciudadano'] = $value;
    }

    public function setCantidadLimpiezaCiudadanoAttribute($value){
        if(isset($this->attributes['cantidad_limpieza_ciudadano']) && isset($this->original['cantidad_limpieza_ciudadano'])){
            if($this->original['cantidad_limpieza_ciudadano'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_limpieza_ciudadano', 'valor_anterior' => $this->original['cantidad_limpieza_ciudadano'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_limpieza_ciudadano'] = $value;
    }

    public function setEstadoLimpiezaCiudadanoAttribute($value){
        if(isset($this->attributes['estado_limpieza_ciudadano']) && isset($this->original['estado_limpieza_ciudadano'])){
            if($this->original['estado_limpieza_ciudadano'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_limpieza_ciudadano', 'valor_anterior' => $this->original['estado_limpieza_ciudadano'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_limpieza_ciudadano'] = $value;
    }

    public function setTieneLimpiezaOperadoresAttribute($value){
        if(isset($this->attributes['tiene_limpieza_operadores']) && isset($this->original['tiene_limpieza_operadores'])){
            if($this->original['tiene_limpieza_operadores'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_limpieza_operadores', 'valor_anterior' => $this->original['tiene_limpieza_operadores'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_limpieza_operadores'] = $value;
    }

    public function setCantidadLimpiezaOperadoresAttribute($value){
        if(isset($this->attributes['cantidad_limpieza_operadores']) && isset($this->original['cantidad_limpieza_operadores'])){
            if($this->original['cantidad_limpieza_operadores'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_limpieza_operadores', 'valor_anterior' => $this->original['cantidad_limpieza_operadores'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_limpieza_operadores'] = $value;
    }

    public function setEstadoLimpiezaOperadoresAttribute($value){
        if(isset($this->attributes['estado_limpieza_operadores']) && isset($this->original['estado_limpieza_operadores'])){
            if($this->original['estado_limpieza_operadores'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_limpieza_operadores', 'valor_anterior' => $this->original['estado_limpieza_operadores'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_limpieza_operadores'] = $value;
    }

    public function setTieneAsientosPublicoAttribute($value){
        if(isset($this->attributes['tiene_asientos_publico']) && isset($this->original['tiene_asientos_publico'])){
            if($this->original['tiene_asientos_publico'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_asientos_publico', 'valor_anterior' => $this->original['tiene_asientos_publico'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_asientos_publico'] = $value;
    }

    public function setCantidadParadosAsientosPublicAttribute($value){
        if(isset($this->attributes['cantidad_parados_asientos_publico']) && isset($this->original['cantidad_parados_asientos_publico'])){
            if($this->original['cantidad_parados_asientos_publico'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_parados_asientos_publico', 'valor_anterior' => $this->original['cantidad_parados_asientos_publico'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_parados_asientos_publico'] = $value;
    }

    public function setCantidadSentadosAsientosPublicoAttribute($value){
        if(isset($this->attributes['cantidad_sentados_asientos_publico']) && isset($this->original['cantidad_sentados_asientos_publico'])){
            if($this->original['cantidad_sentados_asientos_publico'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_sentados_asientos_publico', 'valor_anterior' => $this->original['cantidad_sentados_asientos_publico'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_sentados_asientos_publico'] = $value;
    }

    public function setEstadoAsientosPublicoAttribute($value){
        if(isset($this->attributes['estado_asientos_publico']) && isset($this->original['estado_asientos_publico'])){
            if($this->original['estado_asientos_publico'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_asientos_publico', 'valor_anterior' => $this->original['estado_asientos_publico'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_asientos_publico'] = $value;
    }

    public function setTieneAsientosUsuarioAttribute($value){
        if(isset($this->attributes['tiene_asientos_usuario']) && isset($this->original['tiene_asientos_usuario'])){
            if($this->original['tiene_asientos_usuario'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'tiene_asientos_usuario', 'valor_anterior' => $this->original['tiene_asientos_usuario'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['tiene_asientos_usuario'] = $value;
    }

    public function setCantidadParadosAsientosUsuarioAttribute($value){
        if(isset($this->attributes['cantidad_parados_asientos_usuario']) && isset($this->original['cantidad_parados_asientos_usuario'])){
            if($this->original['cantidad_parados_asientos_usuario'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_parados_asientos_usuario', 'valor_anterior' => $this->original['cantidad_parados_asientos_usuario'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_parados_asientos_usuario'] = $value;
    }

    public function setCantidadSentadosAsientosUsuarioAttribute($value){
        if(isset($this->attributes['cantidad_sentados_asientos_usuario']) && isset($this->original['cantidad_sentados_asientos_usuario'])){
            if($this->original['cantidad_sentados_asientos_usuario'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'cantidad_sentados_asientos_usuario', 'valor_anterior' => $this->original['cantidad_sentados_asientos_usuario'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['cantidad_sentados_asientos_usuario'] = $value;
    }

    public function setEstadoAsientosUsuarioAttribute($value){
        if(isset($this->attributes['estado_asientos_usuario']) && isset($this->original['estado_asientos_usuario'])){
            if($this->original['estado_asientos_usuario'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'estado_asientos_usuario', 'valor_anterior' => $this->original['estado_asientos_usuario'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['estado_asientos_usuario'] = $value;
    }

    public function setBrindaEscritorioAttribute($value){
        if(isset($this->attributes['brinda_escritorio']) && isset($this->original['brinda_escritorio'])){
            if($this->original['brinda_escritorio'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_escritorio', 'valor_anterior' => $this->original['brinda_escritorio'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_escritorio'] = $value;
    }

    public function setBrindaFolletosAttribute($value){
        if(isset($this->attributes['brinda_folletos']) && isset($this->original['brinda_folletos'])){
            if($this->original['brinda_folletos'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_folletos', 'valor_anterior' => $this->original['brinda_folletos'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_folletos'] = $value;
    }

    public function setBrindaWebAttribute($value){
        if(isset($this->attributes['brinda_web']) && isset($this->original['brinda_web'])){
            if($this->original['brinda_web'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_web', 'valor_anterior' => $this->original['brinda_web'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_web'] = $value;
    }

    public function setBrindaVentanillaAttribute($value){
        if(isset($this->attributes['brinda_ventanilla']) && isset($this->original['brinda_ventanilla'])){
            if($this->original['brinda_ventanilla'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_ventanilla', 'valor_anterior' => $this->original['brinda_ventanilla'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_ventanilla'] = $value;
    }

    public function setBrindaFotocopiasAttribute($value){
        if(isset($this->attributes['brinda_fotocopias']) && isset($this->original['brinda_fotocopias'])){
            if($this->original['brinda_fotocopias'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_fotocopias', 'valor_anterior' => $this->original['brinda_fotocopias'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_fotocopias'] = $value;
    }

    public function setBrindaTelefonoAttribute($value){
        if(isset($this->attributes['brinda_telefono']) && isset($this->original['brinda_telefono'])){
            if($this->original['brinda_telefono'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_telefono', 'valor_anterior' => $this->original['brinda_telefono'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_telefono'] = $value;
    }

    public function setBrindaMesonAttribute($value){
        if(isset($this->attributes['brinda_meson']) && isset($this->original['brinda_meson'])){
            if($this->original['brinda_meson'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_meson', 'valor_anterior' => $this->original['brinda_meson'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_meson'] = $value;
    }

    public function setBrindaTripticosAttribute($value){
        if(isset($this->attributes['brinda_tripticos']) && isset($this->original['brinda_tripticos'])){
            if($this->original['brinda_tripticos'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_tripticos', 'valor_anterior' => $this->original['brinda_tripticos'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_tripticos'] = $value;
    }

    public function setBrindaVerbalAttribute($value){
        if(isset($this->attributes['brinda_verbal']) && isset($this->original['brinda_verbal'])){
            if($this->original['brinda_verbal'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'brinda_verbal', 'valor_anterior' => $this->original['brinda_verbal'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['brinda_verbal'] = $value;
    }

    public function setRequerimientosAttribute($value){
        if(isset($this->attributes['requerimientos']) && isset($this->original['requerimientos'])){
            if($this->original['requerimientos'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'requerimientos', 'valor_anterior' => $this->original['requerimientos'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['requerimientos'] = $value;
    }

    public function setPuntoAtencionIdAttribute($value){
        if(isset($this->attributes['punto_atencion_id']) && isset($this->original['punto_atencion_id'])){
            if($this->original['punto_atencion_id'] != $value){
                $this->cambioPor()->attach(Auth::user()->id, ['campo' => 'punto_atencion_id', 'valor_anterior' => $this->original['punto_atencion_id'], 'valor_nuevo' => $value, 'fecha_cambio' => Carbon::now()]);
            }
        }
        $this->attributes['punto_atencion_id'] = $value;
    }

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

    // N -> N (N)
    public function cambioPor(){
        return $this->belongsToMany('App\User', 'registro_cambios', 'ficha_diagnostico_id', 'user_id')->withPivot('campo', 'valor_anterior', 'valor_nuevo', 'fecha_cambio')->orderBy('fecha_cambio', 'DESC');
    }
}
