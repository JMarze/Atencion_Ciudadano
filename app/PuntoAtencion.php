<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PuntoAtencion extends Model
{
    use SoftDeletes;

    protected $table = 'puntos_atencion';

    protected $fillable = ['nombre', 'tipo', 'unidad_organizacional_id'];

    /* Relationships */
    // 1 -> N (1)
    public function unidadOrganizacional(){
        return $this->belongsTo('App\UnidadOrganizacional');
    }
}
