<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'name' => 'required|string|between:3,250',
            'username' => 'required|string|between:3,250',
            'email' => 'required|email|between:3,250',
            'type' => 'required|in:admin,tecnico,tecnico_web,jefe',
        ];
    }
}
