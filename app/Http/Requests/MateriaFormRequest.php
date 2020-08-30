<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaFormRequest extends FormRequest
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
            'nombre'=>'required|max:100|unique:materias',
            'descripcion'=>'required|max:200|unique:materias',
        ];
    }

    public function messages(){

        return[
            'nombre.required' => 'El nombre de la Materia es obligatorio',
            'descripcion.required' => 'Debe agregar una breve descripción sobre la materia',
            'nombre.unique' => 'El nombre de la Materia ya ha sido agregado',
            'descripcion.unique' => 'La descripción de la Materia ya ha sido agregado'

        ];
    }
}
