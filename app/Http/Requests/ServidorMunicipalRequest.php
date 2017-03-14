<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServidorMunicipalRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'string',
            'genero' => 'required|in:femenino,masculino',
            'edad' => 'required|min:0',
            'cargo' => 'required|string',
            'puesto' => 'required|string',
            'turno' => 'string',
            'antiguedad_años' => 'min:0',
            'antiguedad_meses' => 'min:0',
            'servidor' => 'required|in:1ra_linea,2da_linea,contrato',
            'ubicacion' => 'string',

            'punto_atencion_id' => 'required|exists:puntos_atencion,id',
        ];
    }
}
