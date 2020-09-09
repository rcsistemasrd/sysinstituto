@extends('layouts.app')

@section('title', 'Prestamos -> Pago')

@section('page_title', 'Nuevo Pago')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.store'),
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
                            'label' => 'Apertura',
                            'name' => 'apertura_id',
                            'readonly' => true,
                            'value' => $loan->pre_desem,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Vence',
                            'name' => 'loan_id',
                            'readonly' => true,
                            'value' => $loan->pre_vence,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Condición',
                            'name' => 'condition_id',
                            'readonly' => true,
                            'value' => '123145',
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Monto RD$',
                            'name' => 'amount_rd',
                            'readonly' => true,
                            'value' => number_format($loan->pre_amonto, 2),
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Interés RD$',
                            'name' => 'interest_rd',
                            'readonly' => true,
                            'value' => number_format($loan->pre_binter, 2),
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Cuota RD$',
                            'name' => 'quota_rd',
                            'readonly' => true,
                            'value' => number_format($loan->pre_mtocuo, 2),
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

            @component('layouts.components.card-body', ['title' => 'Datos de la Cuota'])
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
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Mora',
                            'name' => 'pay_late',
                            'placeholder' => '0.00',
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
                            'label' => 'Cuota',
                            'name' => 'quota',
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                </div>

            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos de la Garantía'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Concepto',
                            'name' => 'concept',
                            'placeholder' => '...',
                        ]) @endcomponent
                    </div>
                    <div class="col-3">
                        @component('layouts.components.form-group', [
                            'type' => 'checkbox',
                            'label' => 'Insertar Recibo en Cobro Movil',
                            'name' => 'insert_receipt',
                        ]) @endcomponent
                    </div>
                </div>

            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos de la Garantía'])
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
            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos de las Cuotas'])
                <div class="row">
                    <div class="col-8">
                        @component('layouts.components.table', [
                            'base_url' => route('maintenance.loan.index'),
                            'edit_url' => route('maintenance.loan.edit', '_id'),
                            'columns' => 'pre_codigo,pre_codcli,pre_suc,pre_smonto,pre_amonto,pre_aproba,pre_balanc',
                            'code_column' => 'pre_codigo',
                        ])
                            @slot('head')
                                <th>Vencimiento</th>
                                <th>Capital</th>
                                <th>Interés</th>
                                <th>Mora</th>
                                <th>Cuota</th>
                            @endslot

                            @slot('body')
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endslot

                        @endcomponent
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                @component('layouts.components.form-group', [
                                    'type' => 'text',
                                    'align' => 'right',
                                    'label' => 'Cuota',
                                    'name' => 'quota_amount',
                                    'placeholder' => '0.00',
                                ]) @endcomponent
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @component('layouts.components.form-group', [
                                    'type' => 'text',
                                    'align' => 'right',
                                    'label' => 'Descuento',
                                    'name' => 'quota_discount',
                                    'placeholder' => '0.00',
                                ]) @endcomponent
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @component('layouts.components.form-group', [
                                    'type' => 'text',
                                    'align' => 'right',
                                    'label' => 'Mora',
                                    'name' => 'quota_late_pay',
                                    'placeholder' => '0.00',
                                ]) @endcomponent
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @component('layouts.components.form-group', [
                                    'type' => 'text',
                                    'align' => 'right',
                                    'label' => 'Ingreso',
                                    'name' => 'quota_income',
                                    'placeholder' => '0.00',
                                ]) @endcomponent
                            </div>
                        </div>
                    </div>
                </div>

                @component('layouts.components.button', [
                    'label' => 'Crear',
                    'size' => '',
                ])  @endcomponent

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
