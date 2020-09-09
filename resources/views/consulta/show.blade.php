@extends ('layouts.app')
@section('page_title', 'Editar Cliente')
@section ('content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">			
			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>		
	</div>		
	
	<div class="container">
		<div class="row">
			<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
				<div class="well well-sm">          
				<form class="form-horizontal shadow rounded py-3 px-4 " action="{{ route('cliente.store') }}" method="POST" autocomplete="off">
				{{ csrf_field() }} 		

					<div class="form-row">
						<div class="form-group col-md-2">
      						<label for="supcli">Suplidor/Cliente</label>
      						<select id="supcli" name= "supcli" class="form-control" disabled>
							  @foreach ($tipo as $reg)        																									
									@if ($reg->tab_codigo==$clisup->cli_clipro)
                       			  		<option value="{{$reg->tab_codigo}}" selected>{{$reg->tab_descri}}</option>
                       				@else
									   <option value="{{$reg->tab_codigo}}">{{$reg->tab_descri}}</option>
									@endif	   	
    						  @endforeach							 							  
      						</select>
    					</div>	
						
						<div class="form-group col-md-2">
      						<label for="identificacion">Identificación</label>
      						<input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ $clisup->cli_cedula }}" maxlength="30" readonly>
    					</div>
    					<div class="form-group col-md-4">
      						<label for="nombre">Nombre</label>
      						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $clisup->cli_nombre }}" readonly >
    					</div>
    					<div class="form-group col-md-4">
      						<label for="apellidos">Apellidos</label>
      						<input type="text" class="form-control" id="apellidos" name= "apellidos" value="{{ $clisup->cli_apelli }}" readonly >
    					</div>						
						
  					</div>

					<h5>Dirección</h5>
					<div class="form-row">
    					<div class="form-group col-md-4">
      						<label for="calle">Calle</label>
      						<input type="text" class="form-control" id="calle" name="calle" value="{{ $clisup->cli_calle }}" readonly>
    					</div>
    					<div class="form-group col-md-1">
      						<label for="numero">Numero</label>
      						<input type="text" class="form-control" id="numero" name="numero" value="{{ $clisup->cli_numero }}" readonly>
    					</div>
    					<div class="form-group col-md-4">
      						<label for="sector">Sector</label>
      						<input type="text" class="form-control" id="sector" name="sector" value="{{ $clisup->cli_sector }}" readonly>  
    					</div>			

						<div class="form-group col-md-3">
      						<label for="fechanac">F.Nacimiento</label>
      						<input type="date" class="form-control" id="fechanac" name="fechanac" value="{{ $clisup->cli_fecnac }}" readonly >
    					</div>
						
  					</div>
					
					<div class="form-row">
    					<div class="form-group col-md-3">
      						<label for="celular">Celular</label>
      						<input type="text" class="form-control" id="celular" name="celular" value="{{ $clisup->cli_celula }}" readonly>
    					</div>
    					<div class="form-group col-md-3">
      						<label for="oficina">Oficina</label>
      						<input type="text" class="form-control" id="oficina" name="oficina" value="{{ $clisup->cli_telefo }}" readonly>
    					</div>
    					<div class="form-group col-md-3">
      						<label for="casa">Casa</label>
      						<input type="text" class="form-control" id="casa" name="casa" value="{{ $clisup->cli_2telef }}" readonly>
    					</div>
						<div class="form-group col-md-3">
      						<label for="correo">Email</label>
      						<input type="email" class="form-control" id="correo" name="correo" value="{{ $clisup->cli_email }}" readonly>
    					</div>
  					</div>  	  	
					
					<div class="form-row">					
						<div class="form-group col-md-4">
							<label for="precio">Precios</label>
							<select id="precio" name= "precio" class="form-control" disabled>
								@foreach ($precios as $reg)        							>
									<option value="{{$reg->tab_codigo}}">{{$reg->tab_descri}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group col-md-4">
							<label for="tiponcf">Tipos NCF</label>
							<select id="tiponcf" name= "tiponcf" class="form-control" disabled>
								@foreach ($ncfs as $reg)        							>																		
									@if ($reg->tab_codigo==$clisup->cli_tipo)
                       			  		<option value="{{$reg->tab_codigo}}" selected>{{$reg->tab_descri}}</option>
                       				@else
									   <option value="{{$reg->tab_codigo}}">{{$reg->tab_descri}}</option>
									@endif									
								@endforeach
							</select>
						</div>
						
						<div class="form-group col-md-4">
							<label for="empresa">Empresas</label>
							<select id="empresa" name= "empresa" class="form-control" disabled>
								@foreach ($empresas as $reg)        							>																		
									@if ($reg->emp_codigo==$clisup->cli_empresa)
                       			  		<option value="{{$reg->emp_codigo}}" selected>{{$reg->emp_descri}}</option>
                       				@else
									   <option value="{{$reg->emp_codigo}}">{{$reg->emp_descri}}</option>
									@endif
								@endforeach
							</select>
						</div>												
  					</div>		
					
					<div class="form-row">
						<div class="form-group col-md-2">
      						<label for="limite">Limite de Crédito</label>
      						<input type="number" class="form-control" id="limite" name="limite" value="{{ $clisup->cli_montoc }}" readonly>
    					</div>		
						
						<div class="form-group col-md-2">
      						<label for="dias">Día(s) a Vencer</label>
      						<input type="number" class="form-control" id="dias" name="dias" value="{{ $clisup->cli_montop }}" readonly>
    					</div>		

						<div class="form-group col-md-6">
      						<label for="contacto">Contacto</label>
      						<input type="text" class="form-control" id="contacto" name="contacto" value="{{ $clisup->cli_descri }}" readonly>
    					</div>				
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="itbis" name="itbis" disabled>
								<label class="form-che|ck-label" for="itbis">
									Calcular ITBIS
								</label>
							</div>
						</div>
					
						<div class="form-group col-md-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="iitbis" name="iitbis" disabled>
								<label class="form-che|ck-label" for="iitbis">
									Precios Incluir ITBIS
								</label>
							</div>
						</div>
					</div>					  					
					
					<a href="{{ route('cliente.index') }}" <button type="button" class="btn btn-secondary btn-sm">Atrás</button> </a>					  
					
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection