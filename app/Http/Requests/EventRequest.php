<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'date' => 'required',
            'schedule' => 'required',
            'category' => 'required',
            'place' => 'required',
            'poster' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo nome deve ser preenchido',
            'date.required' => 'O campo data deve ser preenchido',
            'schedule.required' => 'O campo horário deve ser preenchido',
            'category_id.required' => 'O campo categoria deve ser preenchido',
            'place_id.required' => 'O campo local deve ser preenchido',
            'poster.required' => 'O campo poster deve ser preenchido',
            'poster.mimes' => 'somente formatos jpeg,bmp,png são suportados.'
        ];
    }

}
