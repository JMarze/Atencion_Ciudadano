<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'type', 'password', 'unidad_organizacional_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Relationships */
    // 1 -> N (N)
    public function fichasDiagnostico(){
        return $this->hasMany('App\FichaDiagnostico');
    }

    // 1 -> N (1)
    public function unidadOrganizacional(){
        return $this->belongsTo('App\UnidadOrganizacional');
    }
}
