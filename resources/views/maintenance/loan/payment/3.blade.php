@extends('layouts.app')

@section('title', 'Prestamos -> Pago')

@section('page_title', 'Reversos')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.form', [
            'name' => 'loan',
            'url' => route('maintenance.loan.store'),
        ])

            @component('layouts.components.card-body', ['title' => 'Reverso o Anulación de Transacción'])

                <div class="row">
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Producto',
                            'name' => 'product_id',
                            'placeholder' => '00000',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Identificación',
                            'name' => 'identification',
                            'readonly' => true,
                            'value' => '',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Código Cliente',
                            'name' => 'customer_id',
                            'readonly' => true,
                            'value' => '',
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        @component('layouts.components.form-group', [
                            'type' => 'text',
                            'label' => 'Nombre Cliente',
                            'name' => 'customer_name',
                            'readonly' => true,
                            'value' => '',
                        ]) @endcomponent
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
                                <th>Código</th>
                                <th># Cliente</th>
                                <th># Cliente</th>
                                <th># Cliente</th>
                                <th># Cliente</th>
                                <th># Cliente</th>
                                <th># Cliente</th>
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

                @component('layouts.components.button', ['label' => 'Crear'])  @endcomponent

        @endcomponent

    @endcomponent

@endsection
