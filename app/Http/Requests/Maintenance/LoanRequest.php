<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required',
            'seller_id' => 'required',
            'branch_id' => 'required',
            'loan_type_id' => 'required',
            'periodicity_id' => 'required',
            'gracia' => 'required',
            'pay_id' => 'required',
            'currency_id' => 'required',
            'internal_number' => 'required',
            'amount' => 'required',
            'closing_costs' => 'required',
            'interest_rate' => 'required',
            'late_rate' => 'required',
            'duration' => 'required',
            'disbursement' => 'required|date_format:Y-m-d',
            'first_quota' => 'required|date_format:Y-m-d',
            'second_quota' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            '*.date_format' => 'Formato valido yyyy-mm-dd',
            '*.required' => 'Este campo es requerido.'
        ];
    }
}
