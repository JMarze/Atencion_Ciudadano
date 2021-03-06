<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnidadOrganizacional extends Model
{
    use SoftDeletes;

    protected $table = 'unidades_organizacionales';

    protected $fillable = ['nombre'];

    /* Relationships */
    // 1 -> N (N)
    public function puntosAtencion(){
        return $this->hasMany('App\PuntoAtencion');
    }

    // 1 -> N (N)
    public function usuarios(){
        return $this->hasMany('App\User');
    }
}
