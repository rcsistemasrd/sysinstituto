@extends('layouts.app')

@section('title', 'Prestamos -> Pago')

@section('page_title', 'Aplicar Cobro Móviles')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.store'),
        ])

            @component('layouts.components.card-body')

                <div class="row">
                    <div class="col-3">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Empleado',
                            'name' => 'employee_id',
                            'placeholder' => '00000',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Nombre',
                            'name' => 'employee_name',
                            'readonly' => true,
                            'value' => '',
                        ]) @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @component('layouts.components.button', [
                            'type' => 'a',
                            'label' => 'Buscar...',
                            'url' => '#',
                        ])  @endcomponent
                    </div>
                </div>

            @endcomponent

            @component('layouts.components.card-body', ['title' => 'Listado de ....'])

                <div class="row">
                    <div class="col">

                        @component('layouts.components.table', [
                            'base_url' => route('maintenance.loan.index'),
                            'edit_url' => route('maintenance.loan.edit', '_id'),
                            'columns' => 'pre_codigo,pre_codcli,pre_suc,pre_smonto,pre_amonto,pre_aproba,pre_balanc',
                            'code_column' => 'pre_codigo',
                        ])
                            @slot('head')
                                <th># Recibo</th>
                                <th># Préstamo</th>
                                <th>Nombre</th>
                                <th>Monto</th>
                                <th>Mora</th>
                                <th>Cobrado</th>
                                <th>Empleado</th>
                            @endslot

                            @slot('body')
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
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
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endslot

                        @endcomponent

                    </div>
                </div>

        @endcomponent

        @component('layouts.components.card-body', ['title' => ''])

            <div class="row">
                <div class="col-3">
                    @component('layouts.components.form-group', [
                        'type' => 'text',
                        'align' => 'right',
                        'label' => 'Total Cobrados',
                        'name' => 'total_amount',
                        'placeholder' => '0.00',
                    ]) @endcomponent
                </div>
            </div>

            @component('layouts.components.button', ['label' => 'Aplicar Cobros'])  @endcomponent

        @endcomponent

    @endcomponent

@endsection
