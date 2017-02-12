<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PuntoAtencionRequest extends Request
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
            'nombre' => 'required|string|between:3,250',
            'tipo' => 'required|in:servicio,tramite',
            'unidad_organizacional_id' => 'required|exists:unidades_organizacionales,id',
        ];
    }
}
