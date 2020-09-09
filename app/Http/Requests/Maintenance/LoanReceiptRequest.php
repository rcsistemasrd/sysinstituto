<?php

namespace App\Http\Requests\Maintenance;

use Illuminate\Foundation\Http\FormRequest;

class LoanReceiptRequest extends FormRequest
{
    /**posibles tipos de pagos para permitir o no */
    protected $posibles_payment_type = [
        'payment',
        'other_incoming',
    ];

    public function authorize()
    {
        return in_array($this->payment_type, $this->posibles_payment_type);
    }

    public function rules()
    {
        return $this->{$this->payment_type}();
    }

    public function messages()
    {
        return [
            '*.min' => 'Este monto debe ser mayor a :min',
            '*.numeric' => 'Este campo debe ser numérico',
            '*.required' => 'Este campo es requerido.',
        ];
    }

    public function payment()
    {
        return [
            'amount_payable' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'other_income' => 'required|numeric|min:0',
        ];
    }

    public function other_incoming()
    {
        return [
            'cash_amount' => 'required|numeric|min:0',
            'tdc_amount' => 'required|numeric|min:0',
            'check_amount' => 'required|numeric|min:0',
            'other_amount' => 'required|numeric|min:0',
            'observation' => 'required|string|max:500',
            'type_id' => 'required',
            'currency_id' => 'required',
        ];
    }
}
