<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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

            'name' => 'required|min:3|max:255',
            'descripition' => 'required|min:3|max:10000',      //nullable = opcional
            'price' => 'required',     
            'image' => 'nullable|image'

        ];
    }

    //Método deve conter nome de messages
    public function messages () {
       return [
           'name.required' => 'Nome é obrigatório',
            'name.min' =>  'Informar pelo menos 3 caracteres',
            'photo.required' =>  'Foto é obrigatório',
       ];
    }
}
