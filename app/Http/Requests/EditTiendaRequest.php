<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class EditTiendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'titulo' => 'string|max:255|unique:tiendas,titulo,'. $this->route->parameter('tienda'),
            'sub_titulo' => 'string|max:255',
            'RIF' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:tiendas,correo,'. $this->route->parameter('tienda'),
            'telefono_1' => 'required|string'
        ];
    }
}
