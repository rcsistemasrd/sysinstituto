<!DOCTYPE html>
<html lang="es">

@include('layouts.partials.head')

<body id="page-top" base_url="{{ url('/') }}">

    @include('layouts.partials.navbar')

    <div id="wrapper">

        @include('layouts.partials.sidebar')

        <div id="content-wrapper">

            <div class="container">

                <div class="row justify-content-center">
					<h4>@yield('page_title')</h4>
				</div> 						                

                @include('layouts.partials.messages')

                @yield('content')

            </div>

            @include('layouts.partials.footer')

        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts.partials.scripts')

    @yield('scripts')
</body>
</html>
