@isset($attributes)
    @php
        $str_attributes = '';
    @endphp

    @foreach ($attributes as $attr => $val)
        @php
            $str_attributes .= $attr . '="' . $val . '" ';
        @endphp
    @endforeach
@endisset

@if ($type == 'select')
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>

        <select
            class="form-control form-control-sm{{ $errors->has($name) ? ' is-invalid' : '' }}{{ isset($classes) ? (' ' . implode(' ', $classes)) : '' }}"
            name="{{ $name }}"
            id="{{ $name }}"
            {{ isset($readonly) ? ' readonly' : '' }}
            {{ isset($str_attributes) ? $str_attributes : '' }}
        >
            @if (count($items) == 1)
                @foreach ($items as $key => $item)
                    <option value="{{ $key }}" selected>{{ title_case($item) }}</option>
                @endforeach
            @else
                <option value="">Seleccione...</option>

                @foreach ($items as $key => $item)
                    <option value="{{ $key }}"{{ ($value ?? old($name)) == $key ? ' selected':'' }}>{{ title_case($item) }}</option>
                @endforeach
            @endif
        </select>

        @if ($errors->has($name))
            <div class="invalid-feedback">{{ $errors->first($name) }}</div>
        @endif
    </div>
@elseif ($type == 'textarea')
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>

        <textarea
            class="form-control form-control-sm{{ $errors->has($name) ? ' is-invalid' : '' }}{{ isset($classes) ? (' ' . implode(' ', $classes)) : '' }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder ?? '' }}"
            rows="{{ $rows ?? 3 }}"
            {{ isset($readonly) ? ' readonly' : '' }}
            {{ isset($str_attributes) ? $str_attributes : '' }}
        >{{ $value ?? old($name) }}</textarea>

        @if ($errors->has($name))
            <div class="invalid-feedback">{{ $errors->first($name) }}</div>
        @endif
    </div>
@else
    <div class="form-group">
        <label for="{{ $name }}">{{ $label }}</label>

        <input
            type="{{ $type }}"
            class="form-control form-control-sm{{ $errors->has($name) ? ' is-invalid' : '' }} text-{{ $align ?? 'left' }}{{ isset($classes) ? (' ' . implode(' ', $classes)) : '' }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder ?? '' }}"

            @if ($type != 'checkbox')
                value="{{ isset($value) ? (isset($format) ? format_str($value, $format) : $value) : old($name) }}"
            @endif

            {{ isset($readonly) ? ' readonly' : '' }}
            {!! isset($str_attributes) ? $str_attributes : '' !!}
        >

        @if ($errors->has($name))
            <div class="invalid-feedback">{{ $errors->first($name) }}</div>
        @endif
    </div>
@endif
