<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'email|required|unique:users,email', // que sea tipo email requerido y unico en la tabla users en el campo email
            'password'=>'required|confirmed', // requerido confirmed compara las dos password
            'roles'=>'required'
        ];
    }
}
