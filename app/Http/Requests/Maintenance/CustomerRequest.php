<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'identification_type' => 'required',
            'identification' => 'required',
            'names' => 'required',
            'surnames' => 'required',
            'street' => 'required|min:6',
            'street_number' => 'required',
            'sector' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'cell_phone' => 'required',
            'company' => 'required',
            'department' => 'required',
            'position' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'other_salary' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.email' => 'Debe indicar un correo valido.',
            '*.required' => 'Este campo es requerido.'
        ];
    }
}
