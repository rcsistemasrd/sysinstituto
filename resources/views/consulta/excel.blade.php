<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consulta de Muelle</title>
</head>
    <body>
        <table border="1" style="font-size: 80%;">
            <tbody>
                <tr>
                    <tr>								
						<th>Id</th>
						<th>Producto</th>																									
						<th>IdCliente</th>
						<th>IdCliente2</th>
						<th>IdDeposito</th>
						<th>Origen</th>																							
						<th>Categoria</th>
						<th>Siglas</th>														
						<th>Fecha</th>
						<th>Conduce</th>
						<th>Recibidor</th>
						<th>Cliente2</th>
						<th>Destino1</th>
						<th>Destino2</th>
						<th>Destino3</th>
						<th>Destino4</th>
						<th>Direccion</th>
						<th>Placa Camion</th>
						<th>Cantidad Toneladas</th>
						<th>QQ</th>
						<th>Buque</th>
						<th>Hora</th>
						<th>BOD</th>
                  </tr>                
                  @foreach($datosexcel as $reg)
					<tr>
						<td>{{ $reg->id }}</td>
						<td>{{ $reg->producto }}</td>									
						<td>{{ $reg->idcliente }}</td>
						<td>{{ $reg->idcliente2 }}</td>
						<td>{{ $reg->iddeposito }}</td>
						<td>{{ $reg->origen }}</td>
						<td>{{ $reg->categoria }}</td>
						<td>{{ $reg->siglas }}</td>									
						<td>{{ $reg->fecha }}</td>
						<td>{{ $reg->conduce }}</td>
						<td>{{ $reg->recibidor }}</td>
						<td>{{ $reg->cliente2 }}</td>
						<td>{{ $reg->destino1 }}</td>
						<td>{{ $reg->destino2 }}</td>
						<td>{{ $reg->destino3 }}</td>
						<td>{{ $reg->destino4 }}</td>
						<td>{{ $reg->direccion }}</td>
						<td>{{ $reg->placacamion }}</td>
						<td>{{ $reg->canttm }}</td>
						<td>{{ $reg->qq }}</td>
						<td>{{ $reg->buque }}</td>
						<td>{{ $reg->hora }}</td>
						<td>{{ $reg->bod }}</td>
					</tr>                
                  @endforeach
            </tbody>
        </table>
        @include('layouts.partials.excel_file')
    </body>
</html>
