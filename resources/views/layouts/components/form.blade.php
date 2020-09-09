<form action="{{ $url }}" method="{{ $method ?? 'post' }}" name="form-{{ $name }}">
    @isset($hidden_fields)
        @foreach ($hidden_fields as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    @endisset

    {{ csrf_field() }}
    {{ method_field($method_field ?? 'POST') }}

    {{ $slot }}
</form>
