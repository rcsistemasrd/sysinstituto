@extends('layouts.app')

@section('title', 'Inicio de Sesión')

@section('page_title', 'Inicio de Sesión')

@section('content')
    <div class="col-6 offset-3">
        @component('layouts.components.card')

            @component('layouts.components.form', [
                'name' => 'login',
                'url' => route('auth.auth'),
            ])

                @component('layouts.components.card-body')

                    @component('layouts.components.form-group', [
                        'type' => 'text',
                        'label' => 'Usuario',
                        'name' => 'username',
                    ]) @endcomponent

                    @component('layouts.components.form-group', [
                        'type' => 'password',
                        'label' => 'Contraseña',
                        'name' => 'password',
                    ]) @endcomponent

                    @component('layouts.components.button', ['label' => 'Iniciar Sesión'])  @endcomponent

                @endcomponent

            @endcomponent

        @endcomponent
    </div>
@endsection
