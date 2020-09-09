@extends('layouts.app')

@section('title', 'Préstamos')

@section('page_title', 'Préstamos')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.card-body')

            @component('layouts.components.table', [
                'datatable' => true,
                'base_url' => route('maintenance.loan.index'),
                'edit_url' => route('maintenance.loan.edit', '_id'),
                'columns' => 'pre_codigo,customer.cli_nombre,customer.cli_apelli,pre_amonto@number,pre_balanc@number,pre_aproba@date',
                'code_column' => 'pre_codigo',
                'additional_links' => [
                    route('maintenance.loan.payment.create', ['loan_id' => '__id']),
                ],
                'additional_links_icons' => [
                    'shopping-cart',
                ],
            ])
                @slot('head')
                    <th>Préstamo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Monto</th>
                    <th>Balance</th>
                    <th>Aprobado</th>
                    <th></th>
                @endslot

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
