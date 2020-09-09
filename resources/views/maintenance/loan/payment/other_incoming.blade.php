@extends('layouts.app')

@section('title', 'Prestamos -> Pago')

@section('page_title', 'Otros Ingresos')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.payment.store'),
            'hidden_fields' => [
                'payment_type' => 'other_incoming',
                'param_id' => $customer->cli_codigo,
            ]
        ])

            @component('layouts.components.card-body', ['title' => 'Datos del Cliente'])

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Cliente',
                            'name' => 'customer_id',
                            'readonly' => true,
                            'items' => [ $customer->cli_codigo => $customer->full_name],
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Tipo de Identificación',
                            'name' => 'identification_type_id',
                            'readonly' => true,
                            'items' => [ $customer->identificationType->tab_codext => $customer->identificationType->tab_descri],
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Identificación',
                            'name' => 'identification',
                            'readonly' => true,
                            'value' => $customer->cli_cedula,
                        ]) @endcomponent
                    </div>
                </div>

            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos del Ingreso'])

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'textarea',
                            'label' => 'Observación',
                            'name' => 'observation',
                            'placeholder' => '...',
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Tipo',
                            'name' => 'type_id',
                            'items' => $payment_methods,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Moneda',
                            'name' => 'currency_id',
                            'items' => $currencies,
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Efectivo',
                            'name' => 'cash_amount',
                            'placeholder' => '0.00',
                            'classes' => [
                                'amount'
                            ]
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Tarjeta de Crédito',
                            'name' => 'tdc_amount',
                            'placeholder' => '0.00',
                            'classes' => [
                                'amount'
                            ]
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Cheque',
                            'name' => 'check_amount',
                            'placeholder' => '0.00',
                            'classes' => [
                                'amount'
                            ]
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Otro',
                            'name' => 'other_amount',
                            'placeholder' => '0.00',
                            'classes' => [
                                'amount'
                            ]
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'align' => 'right',
                            'label' => 'Total',
                            'name' => 'total_amount',
                            'readonly' => true,
                            'placeholder' => '0.00',
                        ]) @endcomponent
                    </div>
                </div>

                @component('layouts.components.button', ['label' => 'Crear'])  @endcomponent

        @endcomponent

    @endcomponent

@endsection

@section('scripts')
    <script>
        const amount_fields = $('.amount')
        const total_field = $('#total_amount')
        const currency = $('#currency_id')

        amount_fields.keyup(function () {
            var total = 0.
            var str_currency = undefined

            amount_fields.each(function (index, field) {
                field = $(field)

                if (field.val().trim() && !isNaN(field.val())) {
                    total += parseFloat(field.val())
                }
            })

            if (currency.val() == '2') {
                str_currency = 'USD'
            }

            total_field.val(format_number(total, str_currency))
        })
    </script>
@endsection
