<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTIendaRequest extends FormRequest
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
            'titulo' => 'required|string|max:255|min:6|unique:tiendas',
            'sub_titulo' => 'required|string|max:255|min:6|unique:tiendas',
            'RIF' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:tiendas',
            'telefono_1' => 'required|string'
        ];
    }
}
