@extends('layouts.app')

@section('title', 'Clientes')

@section('page_title', 'Editando al Cliente *' . $customer->full_name . '*')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'customer',
            'url' => route('maintenance.customer.update', $customer->cli_codigo),
            'method_field' => 'PUT',
        ])

            @component('layouts.components.card-body', ['title' => 'Datos del Cliente'])
                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Tipo de Identificación',
                            'name' => 'identification_type',
                            'items' => $identification_types,
                            'value' => $customer->cli_tipoid,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Identificación',
                            'name' => 'identification',
                            'value' => $customer->cli_cedula,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Nombres',
                            'name' => 'names',
                            'value' => $customer->cli_nombre,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Apellidos',
                            'name' => 'surnames',
                            'value' => $customer->cli_apelli,
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Calle',
                            'name' => 'street',
                            'value' => $customer->cli_calle,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'No.',
                            'name' => 'street_number',
                            'value' => $customer->cli_numero,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Sector',
                            'name' => 'sector',
                            'value' => $customer->cli_sector,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'select',
                            'label' => 'Zona',
                            'name' => 'zone',
                            'items' => $zones,
                            'value' => $customer->cli_zona,
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Correo',
                            'name' => 'email',
                            'value' => $customer->cli_email,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Teléfono',
                            'name' => 'phone',
                            'value' => $customer->cli_telefo,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Teléfono 2',
                            'name' => 'phone2',
                            'value' => $customer->cli_2telef,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Celular',
                            'name' => 'cell_phone',
                            'value' => $customer->cli_celula,
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
                            'value' => $customer->cli_empres,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Departamento',
                            'name' => 'department',
                            'value' => $customer->cli_dempre,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Posición',
                            'name' => 'position',
                            'value' => $customer->cli_posici,
                        ]) @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Dirección',
                            'name' => 'address',
                            'value' => $customer->cli_direcc,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Sueldo',
                            'name' => 'salary',
                            'placeholder' => '0.00',
                            'align' => 'right',
                            'value' => $customer->cli_sueldo,
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Otros Ingresos',
                            'name' => 'other_salary',
                            'placeholder' => '0.00',
                            'align' => 'right',
                            'value' => $customer->cli_otrosi,
                        ]) @endcomponent
                    </div>
                </div>

                @component('layouts.components.button', ['label' => 'Editar'])  @endcomponent
                @component('layouts.components.button', ['label' => 'Eliminar', 'style' => 'danger', 'deleteForm' => 'customer'])  @endcomponent

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
