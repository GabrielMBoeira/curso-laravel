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
        //recupera valor do segundo seguimento (entre "/")
        $id = $this->segment(2);

        return [

            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'descripition' => 'nullable|min:3|max:10000',      //nullable = opcional
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",     
            'image' => 'nullable|image'

        ];
    }

    //Método deve conter nome de messages
    public function messages () {
       return [
           'name.required' => 'Nome é obrigatório',
            'name.min' =>  'Informar pelo menos 3 caracteres',
            'descripition.required' =>  'Descrição deve ser obrigatória',
            'photo.required' =>  'Foto é obrigatório',
       ];
    }
}
