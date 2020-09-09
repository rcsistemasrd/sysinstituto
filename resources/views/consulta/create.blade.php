@extends ('layouts.app')
@section('page_title', 'Crear Cliente')
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
      						<select id="supcli" name= "supcli" class="form-control">
							  @foreach ($suplidorcliente as $reg)        							>
									<option value="{{$reg->tab_codigo}}">{{$reg->tab_descri}}</option>
    						  @endforeach
      						</select>
    					</div>	
						
						<div class="form-group col-md-2">
      						<label for="identificacion">Identificación</label>
      						<input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ old('identificacion') }}" maxlength="30" autofocus>
    					</div>
    					<div class="form-group col-md-4">
      						<label for="nombre">Nombre</label>
      						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" maxlength="30" >
    					</div>
    					<div class="form-group col-md-4">
      						<label for="apellidos">Apellidos</label>
      						<input type="text" class="form-control" id="apellidos" name= "apellidos" value="{{ old('apellidos') }}" maxlength="30" >
    					</div>						
						
  					</div>

					<h5>Dirección</h5>
					<div class="form-row">
    					<div class="form-group col-md-4">
      						<label for="calle">Calle</label>
      						<input type="text" class="form-control" id="calle" name="calle" value="{{ old('calle') }}" maxlength="40">
    					</div>
    					<div class="form-group col-md-1">
      						<label for="numero">Numero</label>
      						<input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" maxlength="10">
    					</div>
    					<div class="form-group col-md-4">
      						<label for="sector">Sector</label>
      						<input type="text" class="form-control" id="sector" name="sector" value="{{ old('sector') }}" maxlength="40">  
    					</div>			

						<div class="form-group col-md-3">
      						<label for="fechanac">F.Nacimiento</label>
      						<input type="date" class="form-control" id="fechanac" name="fechanac" value="{{ old('fechanac') }}" >
    					</div>
						
  					</div>
					
					<div class="form-row">
    					<div class="form-group col-md-3">
      						<label for="celular">Celular</label>
      						<input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" maxlength="20">
    					</div>
    					<div class="form-group col-md-3">
      						<label for="oficina">Oficina</label>
      						<input type="text" class="form-control" id="oficina" name="oficina" value="{{ old('oficina') }}" maxlength="20">
    					</div>
    					<div class="form-group col-md-3">
      						<label for="casa">Casa</label>
      						<input type="text" class="form-control" id="casa" name="casa" value="{{ old('casa') }}" maxlength="20">
    					</div>
						<div class="form-group col-md-3">
      						<label for="correo">Email</label>
      						<input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}" maxlength="60">
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
									<option value="{{$reg->tab_codigo}}">{{$reg->tab_descri}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group col-md-4">
							<label for="empresa">Empresas</label>
							<select id="empresa" name= "empresa" class="form-control">
								@foreach ($empresas as $reg)        							>
									<option value="{{$reg->emp_codigo}}">{{$reg->emp_descri}}</option>
								@endforeach
							</select>
						</div>												
  					</div>		
					
					<div class="form-row">
						<div class="form-group col-md-2">
      						<label for="limite">Limite de Crédito</label>
      						<input type="number" class="form-control" id="limite" name="limite" value="{{ old('limite') }}">
    					</div>		
						
						<div class="form-group col-md-2">
      						<label for="dias">Día(s) a Vencer</label>
      						<input type="number" class="form-control" id="dias" name="dias" value="{{ old('dias') }}">
    					</div>		

						<div class="form-group col-md-6">
      						<label for="contacto">Contacto</label>
      						<input type="text" class="form-control" id="contacto" name="contacto" value="{{ old('contacto') }}">
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
					</div>
					  
					<button type="submit" class="btn btn-primary btn-sm">Aceptar</button>
					<a href="{{ route('cliente.index') }}" <button type="button" class="btn btn-secondary btn-sm">Atrás</button> </a>
					  
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection