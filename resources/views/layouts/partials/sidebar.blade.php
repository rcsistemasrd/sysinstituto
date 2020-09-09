<ul class="sidebar navbar-nav" style="background-color: #3ba3b9 !important;">
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li> --}}

    @if (auth()->check() && session()->has('menus'))
        @foreach (session()->get('menus') as $menu)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $menu->men_descri }}</span>
                </a>
                <div class="dropdown-menu">
                    {{-- <h6 class="dropdown-header">Login Screens:</h6> --}}
                    {{-- <div class="dropdown-divider"></div> --}}
                    @foreach ($menu->submenus as $submenu)
                        @if (Route::has($submenu->sub_link))
                            <a class="dropdown-item" href="{{ route($submenu->sub_link) }}">{{ $submenu->sub_descri }}</a>
                        @endif
                    @endforeach
                </div>
            </li>
        @endforeach
    @endif

</ul>
