@extends('layouts.app')

@section('title', 'Prestamos -> Pago')

@section('page_title', 'Aplicar Cobro Móviles')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.store'),
        ])

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
                                <th># Referencia</th>
                                <th># Préstamo</th>
                                <th>Nombre</th>
                                <th>Monto</th>
                                <th>Mora</th>
                                <th>Otros Ingresos</th>
                                <th>Descuento</th>
                                <th>Acreditar</th>
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
                                    <td>&nbsp;</td>
                                </tr>
                            @endslot
                    @endcomponent
                </div>
            </div>
            @component('layouts.components.button', ['label' => 'Aceptar'])  @endcomponent
        @endcomponent
    @endcomponent

@endsection
