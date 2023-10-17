<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class UsuarioPostRequest extends FormRequest
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
    		'nro_doc'=>'required|numeric|digits_between:8,20',
            'tipo_doc'=>'required|alpha',
            'nombres'=>'required',
            'apellidos'=>'required',
    		'fecha_nac'=>'required|date_format:Y-m-d'
    		];
    }

    public function messages()
    {
        return [
            'nro_doc.required'       => 'El campo nro_doc es necesario',
            'nro_doc.numeric'       => 'El campo nro_doc ser numerico',
            'nro_doc.digits_between'       => 'El campo nro_doc deber tener entre 8 y 20 digitos',
            'tipo_doc.required'  => 'El campo tipo_doc es necesario',
            'tipo_doc.alpha'  => 'El campo tipo_doc solo admite letras',
            'nombres.required'=> 'El campo nombres es necesario',
            'apellidos.required'=> 'El campo apellidos es necesario',
            'fecha_nac.required' => 'El campo fecha_nac es necesario',
            'fecha_nac.date_format' => 'El formto de fecha debe ser aaaa-mm-dd'
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }
    
}
