<nav class="navbar navbar-expand navbar-dark bg-dark static-top" style="background-color: #3ba3b9 !important;">
    <a class="navbar-brand mr-1" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">        
            <div class="input-group-append">
               
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">      
	
		 @if (auth()->check())
			<li class="nav-item dropdown no-arrow mx-1">
				<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-question-circle"></i>
					<span class="badge badge-danger">{{ auth()->user()->usr_cia }}</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
					<a class="dropdown-item" href="#">Compañía</a>
					<a class="dropdown-item" href="#">Globales</a>					
				</div>
			</li>
		@endif
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
			
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">                
                @if (auth()->check())                    
				    <a class="dropdown-item" href="#">Perfil</a>
					<a class="dropdown-item" href="#">Password</a>
					<a class="dropdown-item" href="#">Accesos</a>
					<a class="dropdown-item" href="#">Historial</a>
					<a class="dropdown-item" href="{{ route('auth.logout') }}">Cerrar Sesión</a>
                @else
                    <a class="dropdown-item" href="{{ route('auth.login') }}">Iniciar Sesión</a>
                @endif
            </div>
        </li>
    </ul>
</nav>
