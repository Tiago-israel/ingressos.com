<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
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
           'name' => 'required',
            'number_of_seats' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'O campo nome é obrigatório',
            'number_of_seats.required' => 'O campo número de assentos é obrigatório'
        ];
    }
}
