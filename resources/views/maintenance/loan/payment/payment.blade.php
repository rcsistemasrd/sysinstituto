@extends('layouts.app')

@section('title', 'Prestamos -> Pago')

@section('page_title', 'Nuevo Pago')

@section('content')

    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.payment.store'),
            'hidden_fields' => [
                'payment_type' => 'payment',
                'param_id' => $loan->pre_codigo,
            ]
        ])

            @component('layouts.components.card-body', ['title' => 'Datos del Préstamo'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Préstamo',
                            'name' => 'loan_id',
                            'readonly' => true,
                            'value' => $loan->pre_codigo,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Cliente',
                            'name' => 'customer_id',
                            'readonly' => true,
                            'value' => $loan->customer->full_name,
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Moneda',
                            'name' => 'currency_id',
                            'readonly' => true,
                            'value' => $loan->currency->tab_descri,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'format' => 'date',
                            'label' => 'Apertura',
                            'name' => 'apertura_id',
                            'readonly' => true,
                            'value' => $loan->pre_aproba,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'format' => 'date',
                            'label' => 'Vence',
                            'name' => 'expire',
                            'readonly' => true,
                            'value' => $loan->pre_vence,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Periodicidad',
                            'name' => 'periodicity',
                            'readonly' => true,
                            'value' => $loan->periodicity->tab_descri,
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'format' => 'number',
                            'label' => 'Monto RD$',
                            'name' => 'amount_rd',
                            'readonly' => true,
                            'value' => $loan->pre_amonto,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'format' => 'number',
                            'label' => 'Interés RD$',
                            'name' => 'interest_rd',
                            'readonly' => true,
                            'value' => $loan->pre_binter,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'format' => 'number',
                            'label' => 'Cuota RD$',
                            'name' => 'quota_rd',
                            'readonly' => true,
                            'value' => $loan->pre_mtocuo,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Cuotas',
                            'name' => 'quotas',
                            'readonly' => true,
                            'value' => $loan->pre_tiempo,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Ultimo Pago',
                            'name' => 'last_payment',
                            'readonly' => true,
                            'value' => $loan->pre_pagult,
                        ]) @endcomponent
                    </div>
                </div>
            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Monto a Pagar'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'checkbox',
                            'label' => 'Saldar',
                            'name' => 'pay_off',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Monto a Pagar',
                            'name' => 'amount_payable',
                            'placeholder' => '0.00',
                            'value' => $loan->getAmountToPay(),
                            'attributes' => [
                                'amount-to-pay' => $loan->getAmountToPay()
                            ],
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'format' => 'number',
                            'label' => 'Mora',
                            'name' => 'pay_late',
                            'readonly' => true,
                            'value' => $loan->getQuotaLatePay(),
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Descuento',
                            'name' => 'discount',
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Otros Ingresos',
                            'name' => 'other_income',
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'format' => 'number',
                            'label' => 'Cuota',
                            'name' => 'quota',
                            'readonly' => true,
                            'value' => $loan->getCurrentPendingQuota(),
                        ]) @endcomponent
                    </div>
                </div>

                @component('layouts.components.button', [
                    'label' => 'Aplicar',
                    'size' => '',
                ])  @endcomponent

            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos del Recibo Manual'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Recibo Manual',
                            'name' => 'manual_receipt',
                            'readonly' => true,
                            'placeholder' => '0',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Referencia',
                            'name' => 'receipt_manual_reference',
                            'readonly' => true,
                            'value' => '0',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'format' => 'number',
                            'align' => 'right',
                            'label' => 'Monto',
                            'name' => 'receipt_manual_amount',
                            'readonly' => true,
                            'value' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'format' => 'number',
                            'align' => 'right',
                            'label' => 'Mora',
                            'name' => 'receipt_manual_late_pay',
                            'readonly' => true,
                            'value' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'format' => 'number',
                            'align' => 'right',
                            'label' => 'Descuento',
                            'name' => 'receipt_manual_discount',
                            'readonly' => true,
                            'value' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'format' => 'date',
                            'label' => 'Fecha',
                            'name' => 'receipt_manual_discount',
                            'readonly' => true,
                            'value' => '',
                        ]) @endcomponent
                    </div>
                </div>
            @endcomponent

            {{-- @component('layouts.components.card-body', ['title' => 'Datos de la Garantía'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.table', [
                            'base_url' => route('maintenance.loan.index'),
                            'edit_url' => route('maintenance.loan.edit', '_id'),
                            'columns' => 'pre_codigo,pre_codcli,pre_suc,pre_smonto,pre_amonto,pre_aproba,pre_balanc',
                            'code_column' => 'pre_codigo',
                        ])
                            @slot('head')
                                <th>Código</th>
                                <th># Cliente</th>
                            @endslot

                            @slot('body')
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endslot

                        @endcomponent
                    </div>
                </div>

            @endcomponent --}}

            @component('layouts.components.card-body', ['title' => 'Distribución del Pago'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Cuota',
                            'name' => 'quota_amount',
                            'readonly' => true,
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Descuento',
                            'name' => 'quota_discount',
                            'readonly' => true,
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Mora',
                            'name' => 'quota_late_pay',
                            'readonly' => true,
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Ingreso',
                            'name' => 'quota_income',
                            'readonly' => true,
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Observación',
                            'name' => 'quota_observation',
                            'readonly' => true,
                            'placeholder' => '...',
                        ]) @endcomponent
                    </div>
                </div>
            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos de las Cuotas'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.table', [
                            'overflow' => 430,
                            'base_url' => route('maintenance.loan.index'),
                            'edit_url' => route('maintenance.loan.edit', '_id'),
                            'columns' => 'pre_codigo,pre_codcli,pre_suc,pre_smonto,pre_amonto,pre_aproba,pre_balanc',
                            'code_column' => 'pre_codigo',
                        ])
                            @slot('head')
                                <th># Cuota</th>
                                <th>Vencimiento</th>
                                <th style="text-align: right;">Capital</th>
                                <th style="text-align: right;">Interés</th>
                                <th style="text-align: right;">Mora</th>
                                <th style="text-align: right;">Cuota</th>
                                <th>Estado</th>
                            @endslot

                            @slot('body')
                                @foreach ($loan->quotas as $quota)
                                    <tr>
                                        <td>{{ $quota->cuo_numero }}</td>
                                        <td>{{ $quota->cuo_vence }}</td>
                                        <td align="right">{{ number_format($quota->cuo_salcap, 2) }}</td>
                                        <td align="right">{{ number_format($quota->cuo_salint, 2) }}</td>
                                        <td align="right">{{ number_format($quota->cuo_saldom, 2) }}</td>
                                        <td align="right">{{ number_format($quota->getTotalQuota(), 2) }}</td>
                                        <td>{{ $quota->isPending() ? 'Pendiente' : 'Pagada' }}</td>
                                    </tr>
                                @endforeach
                            @endslot

                        @endcomponent
                    </div>
                </div>

            @endcomponent

        @endcomponent

    @endcomponent

@endsection

@section('scripts')
    <script>
        const amount_payable = $('#amount_payable')
        const pay_off = $('#pay_off')
        const discount = $('#discount')
        const other_income = $('#other_income')

        pay_off.change(function () {
            const is_pay_off = pay_off.is(':checked')

            discount.attr('readonly', is_pay_off)
            other_income.attr('readonly', is_pay_off)

            amount_payable.keyup();
        })

        amount_payable.keyup(function () {
            let amount_to_pay = amount_payable.attr('amount-to-pay')
            let _amount_payable = amount_payable.val()

            if (!isNaN(amount_to_pay) && !isNaN(_amount_payable) && pay_off.is(':checked')) {
                amount_to_pay = parseFloat(amount_to_pay)
                _amount_payable = parseFloat(_amount_payable)

                diff_amount = Math.abs(_amount_payable - amount_to_pay)

                if (_amount_payable > amount_to_pay) {
                    discount.val(0)
                    other_income.val(diff_amount)
                } else {
                    discount.val(diff_amount)
                    other_income.val(0)
                }
            }
        })
    </script>
@endsection
