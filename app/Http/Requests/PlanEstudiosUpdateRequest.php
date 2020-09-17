<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanEstudiosUpdateRequest extends FormRequest
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
            #'nombre_plan' => 'max:20|required',
            #'duracion' =>'max:10|required',

        ];
    }
}
