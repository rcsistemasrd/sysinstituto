@extends('layouts.app')

@section('title', 'Clientes')

@section('page_title', 'Nuevo Cliente')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'customer',
            'url' => route('maintenance.customer.store'),
        ])

            @component('layouts.components.card-body', ['title' => 'Datos del Cliente'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Tipo de Identificación',
                            'name' => 'identification_type',
                            'items' => $identification_types,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Identificación',
                            'name' => 'identification',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Nombres',
                            'name' => 'names',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Apellidos',
                            'name' => 'surnames',
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Calle',
                            'name' => 'street',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'No.',
                            'name' => 'street_number',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Sector',
                            'name' => 'sector',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Zona',
                            'name' => 'zone',
                            'items' => $zones,
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Correo',
                            'name' => 'email',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Teléfono',
                            'name' => 'phone',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Teléfono 2',
                            'name' => 'phone2',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Celular',
                            'name' => 'cell_phone',
                        ]) @endcomponent
                    </div>
                </div>
            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Datos del Trabajo'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Compañía',
                            'name' => 'company',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Departamento',
                            'name' => 'department',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Posición',
                            'name' => 'position',
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Dirección',
                            'name' => 'address',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Sueldo',
                            'name' => 'salary',
                            'placeholder' => '0.00',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Otros Ingresos',
                            'name' => 'other_salary',
                            'placeholder' => '0.00',
                            'align' => 'right',
                        ]) @endcomponent
                    </div>
                </div>

                @component('layouts.components.button', ['label' => 'Crear'])  @endcomponent

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
