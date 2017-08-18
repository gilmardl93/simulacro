<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoUnitarioRequest extends FormRequest
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
            'codigo'=>'required|exists:postulante,dni|unique:recaudacion,codigo',
        ];
    }
    public function messages()
    {
        return[
            'codigo.exists'=>'No existe este dni de postulante',
            'codigo.unique'=>'Este codigo ya existe no se puede crear el pago',
        ];
    }
}
