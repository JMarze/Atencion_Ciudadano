<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FichaDiagnosticoRequest extends Request
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
            'zona' => 'required|string|between:1,250',
            'calle' => 'required|string|between:1,250',
            'funcionarios_linea_1' => 'required|numeric|min:0',
            'funcionarios_linea_2' => 'required|numeric|min:0',
            'lunes_viernes_de' => 'required',
            'lunes_viernes_a' => 'required',

            'tiene_senaletica' => 'required|boolean',
            'cantidad_senaletica' => 'required|min:0',

            'tiene_paneles' => 'required|boolean',
            'cantidad_paneles' => 'required|min:0',

            'tiene_iluminacion' => 'required|boolean',
            'cantidad_iluminacion' => 'required|min:0',

            'tiene_limpieza_ciudadano' => 'required|boolean',
            'cantidad_limpieza_ciudadano' => 'required|min:0',

            'tiene_limpieza_operadores' => 'required|boolean',
            'cantidad_limpieza_operadores' => 'required|min:0',

            'tiene_asientos_publico' => 'required|boolean',
            'cantidad_parados_asientos_publico' => 'required|min:0',
            'cantidad_sentados_asientos_publico' => 'required|min:0',

            'tiene_asientos_usuario' => 'required|boolean',
            'cantidad_parados_asientos_usuario' => 'required|min:0',
            'cantidad_sentados_asientos_usuario' => 'required|min:0',

            'brinda_escritorio' => 'required|boolean',
            'brinda_folletos' => 'required|boolean',
            'brinda_web' => 'required|boolean',
            'brinda_ventanilla' => 'required|boolean',
            'brinda_fotocopias' => 'required|boolean',
            'brinda_telefono' => 'required|boolean',
            'brinda_meson' => 'required|boolean',
            'brinda_tripticos' => 'required|boolean',
            'brinda_verbal' => 'required|boolean',

            'punto_atencion_id' => 'required|exists:puntos_atencion,id',
        ];
    }
}
