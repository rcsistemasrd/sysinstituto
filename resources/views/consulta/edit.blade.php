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
				<form class="form-horizontal shadow rounded py-3 px-4 " action="{{ route('cliente.update',$clisup->cli_codigo) }}" method="POST" autocomplete="off">
				{{ csrf_field() }} 		
				<input name="_method" type="hidden" value="PATCH">
					<div class="form-row">
						<div class="form-group col-md-2">
      						<label for="supcli">Suplidor/Cliente</label>
      						<select id="supcli" name= "supcli" class="form-control">
							  @foreach ($tipo as $reg)        							>																		
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
      						<input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ $clisup->cli_cedula }}" maxlength="30" autofocus>
    					</div>
    					<div class="form-group col-md-4">
      						<label for="nombre">Nombre</label>
      						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $clisup->cli_nombre }}" maxlength="30" >
    					</div>
    					<div class="form-group col-md-4">
      						<label for="apellidos">Apellidos</label>
      						<input type="text" class="form-control" id="apellidos" name= "apellidos" value="{{ $clisup->cli_apelli }}" maxlength="30" >
    					</div>						
						
  					</div>

					<h5>Dirección</h5>
					<div class="form-row">
    					<div class="form-group col-md-4">
      						<label for="calle">Calle</label>
      						<input type="text" class="form-control" id="calle" name="calle" value="{{ $clisup->cli_calle }}" maxlength="40">
    					</div>
    					<div class="form-group col-md-1">
      						<label for="numero">Numero</label>
      						<input type="text" class="form-control" id="numero" name="numero" value="{{ $clisup->cli_numero }}" maxlength="10">
    					</div>
    					<div class="form-group col-md-4">
      						<label for="sector">Sector</label>
      						<input type="text" class="form-control" id="sector" name="sector" value="{{ $clisup->cli_sector }}" maxlength="40">  
    					</div>			

						<div class="form-group col-md-3">
      						<label for="fechanac">F.Nacimiento</label>
      						<input type="date" class="form-control" id="fechanac" name="fechanac" value="{{ $clisup->cli_fecnac }}" >
    					</div>
						
  					</div>
					
					<div class="form-row">
    					<div class="form-group col-md-3">
      						<label for="celular">Celular</label>
      						<input type="text" class="form-control" id="celular" name="celular" value="{{ $clisup->cli_celula }}" maxlength="20">
    					</div>
    					<div class="form-group col-md-3">
      						<label for="oficina">Oficina</label>
      						<input type="text" class="form-control" id="oficina" name="oficina" value="{{ $clisup->cli_telefo }}" maxlength="20">
    					</div>
    					<div class="form-group col-md-3">
      						<label for="casa">Casa</label>
      						<input type="text" class="form-control" id="casa" name="casa" value="{{ $clisup->cli_2telef }}" maxlength="20">
    					</div>
						<div class="form-group col-md-3">
      						<label for="correo">Email</label>
      						<input type="email" class="form-control" id="correo" name="correo" value="{{ $clisup->cli_email }}" maxlength="60">
    					</div>
  					</div>  	  	
					
					<div class="form-row">					
						<div class="form-group col-md-4">
							<label for="precio">Precios</label>
							<select id="precio" name= "precio" class="form-control">
								@foreach ($precios as $reg)        							>
									<option value="{{$reg->tab_codigo}}">{{$reg->tab_descri}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group col-md-4">
							<label for="tiponcf">Tipos NCF</label>
							<select id="tiponcf" name= "tiponcf" class="form-control">
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
							<select id="empresa" name= "empresa" class="form-control">
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
      						<input type="number" class="form-control" id="limite" name="limite" value="{{ $clisup->cli_montoc }}">
    					</div>		
						
						<div class="form-group col-md-2">
      						<label for="dias">Día(s) a Vencer</label>
      						<input type="number" class="form-control" id="dias" name="dias" value="{{ $clisup->cli_montop }}">
    					</div>		

						<div class="form-group col-md-6">
      						<label for="contacto">Contacto</label>
      						<input type="text" class="form-control" id="contacto" name="contacto" value="{{ $clisup->cli_descri }}">
    					</div>				
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="itbis" name="itbis">
								<label class="form-che|ck-label" for="itbis">
									Calcular ITBIS
								</label>
							</div>
						</div>
					
						<div class="form-group col-md-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="iitbis" name="iitbis">
								<label class="form-che|ck-label" for="iitbis">
									Precios Incluir ITBIS
								</label>
							</div>
						</div>
						
						<div class="form-group col-md-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="estatu" name="estatu">
								<label class="form-che|ck-label" for="estatu">
									Estatu
								</label>
							</div>
						</div>
						
					</div>
					  
					<button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
					<a href="{{ route('cliente.index') }}" <button type="button" class="btn btn-secondary btn-sm">Atrás</button> </a>
					  
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection