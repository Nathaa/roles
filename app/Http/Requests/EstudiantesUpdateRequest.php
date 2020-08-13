<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudiantesUpdateRequest extends FormRequest
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
            'nombre' => 'max:120|required',
        'apellido' =>'max:120|required',
        'fecha_nacimiento' =>'required',
        'direccion' =>'max:160|required',
        'encargado' =>'max:120|required',
        'parentesco' =>'max:120|required',
        'telefono_emergencia' =>'required|min:8|numeric',
        'nombre_padre' =>'max:120|required',
        'profesion_padre' =>'max:120|required',
        'telefono_padre' =>'required|min:8|numeric',
        'nombre_madre' =>'max:120|required',
        'profesion_madre' =>'max:120|required',
        'telefono_madre' =>'required|min:8|numeric',
        ];
    }
}
