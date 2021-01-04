<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradosStoreRequest extends FormRequest
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
                //cambiar aqui segun mis requerimientos
        'grado' => 'max:30|required',
        'seccion' =>'max:3|required',
        'categoria' =>'max:30|required',


        ];
    }
}
