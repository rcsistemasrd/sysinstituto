@isset(session('_flash')['old'])
    @foreach (session('_flash')['old'] as $key)
        @if (session()->has($key) && $key !== '_old_input' && $key !== 'errors')
            <div class="alert alert-{{ $key }} alert-dismissible fade show">
                {{ session($key) }}
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endisset
