@extends('layouts.app')

@section('title', 'Consulta')

@section('page_title', 'Consulta')

@section('content')
    @component('layouts.components.card')

        @component('layouts.components.card-body')

            @component('layouts.components.button', [
                'type' => 'a',
                'url' => route('consulta.create'),
                'label' => 'Nuevo',
            ])  @endcomponent

        @endcomponent		
		
		<a class="btn btn-success btn-xl" href="{{ route('consulta.excel') }}"><i class="fas fa-file-excel"></i> Excel</a>												

        @component('layouts.components.card-body')

            @component('layouts.components.table', [
                'datatable' => true,
                'base_url' => route('consulta.index'),
                'edit_url' => route('consulta.edit', 'id'),
                'columns' => 'id,producto,conduce,recibidor,cliente2,buque,placacamion,canttm',
                'code_column' => 'id',
                '',
                '',
            ])			

                @slot('head')					
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Conduce</th>
                    <th>Recibidor</th>
                    <th>Cliente2</th>                    
					<th>Buque</th>                    
					<th>Camión</th>
					<th>TonMet</th>
                    <th></th>
                @endslot

            @endcomponent

        @endcomponent

    @endcomponent

@endsection
