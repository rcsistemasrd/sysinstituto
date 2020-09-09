@extends('layouts.app')

@section('title', 'Prestamos')

@section('page_title', 'Nuevo Préstamo')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.store'),
        ])

            @component('layouts.components.card-body', ['title' => 'Datos del Desembolso'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Cliente',
                            'name' => 'customer_id',
                            'items' => ($customer ? [$customer->cli_codigo => $customer->full_name] : []),
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Vendedor',
                            'name' => 'seller_id',
                            'items' => [auth()->user()->usr_codigo => auth()->user()->usr_nombre],
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Sucursal',
                            'name' => 'branch_id',
                            'items' => [auth()->user()->branch->suc_codigo => auth()->user()->branch->suc_descri],
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Tipo de Préstamo',
                            'name' => 'loan_type_id',
                            'items' => $loan_types,
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Periodicidad',
                            'name' => 'periodicity_id',
                            'items' => $periodicities,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Gracia',
                            'name' => 'gracia',
                            'placeholder' => '0',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Pagar',
                            'name' => 'pay_id',
                            'items' => $payment_methods,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'checkbox',
                            'label' => 'Domingo',
                            'name' => 'sunday_pay',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'checkbox',
                            'label' => 'Amortiza',
                            'name' => 'amortiza',
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'textarea',
                            'label' => 'Comentario',
                            'name' => 'comment',
                        ]) @endcomponent
                    </div>
                </div>
            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos del Préstamo'])
                <div class="row">
                    <div class="col-4">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Moneda',
                            'name' => 'currency_id',
                            'items' => $currencies,
                        ]) @endcomponent
                    </div>
                    <div class="col-4 text-center">
                        @component('layouts.components.form-group', [
                            'type' => 'checkbox',
                            'label' => 'Sumar Gastos de Cierre al Desembolsar',
                            'name' => 'add_closing_costs_to_disbursement',
                        ]) @endcomponent
                    </div>
                    <div class="col-4">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Número Interno',
                            'name' => 'internal_number',
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Monto',
                            'name' => 'amount',
                            'placeholder' => '0.00',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Gastos de Cierre',
                            'name' => 'closing_costs',
                            'placeholder' => '0.00',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Tasa de Interés',
                            'name' => 'interest_rate',
                            'placeholder' => '0.00',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Tasa de Mora',
                            'name' => 'late_rate',
                            'placeholder' => '0.00',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Duración',
                            'name' => 'duration',
                            'placeholder' => '0',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'date',
                            'label' => 'Desembolso',
                            'name' => 'disbursement',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'date',
                            'label' => '1ra Cuota',
                            'name' => 'first_quota',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'date',
                            'label' => '2da Cuota',
                            'name' => 'second_quota',
                        ]) @endcomponent
                    </div>
                </div>

                @component('layouts.components.button', ['label' => 'Crear'])  @endcomponent

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
