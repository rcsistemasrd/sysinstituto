@extends('layouts.app')

@section('title', 'Clientes')

@section('page_title', 'Clientes')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.card-body')

            @component('layouts.components.button', [
                'type' => 'a',
                'url' => route('maintenance.customer.create'),
                'label' => 'Nuevo',
            ])  @endcomponent

        @endcomponent

        @component('layouts.components.card-body')

            @component('layouts.components.table', [
                'datatable' => true,
                'base_url' => route('maintenance.customer.index'),
                'edit_url' => route('maintenance.customer.edit', '_id'),
                'columns' => 'cli_codigo,cli_cedula,cli_nombre,cli_apelli,cli_celula,cli_telefo,cli_2telef',
                'code_column' => 'cli_codigo',
                'additional_links' => [
                    route('maintenance.loan.create', ['customer_id' => '__id']),
                ],
                'additional_links_icons' => [
                    'hand-holding-usd',
                ],
            ])
                @slot('head')
                    <th>Código</th>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Teléfono</th>
                    <th>Teléfono 2</th>
                    <th></th>
                @endslot

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
