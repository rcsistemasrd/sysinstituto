@if (isset($type) && $type == 'a')
    <a href="{{ $url }}" class="btn btn-outline-{{ $style ?? 'info' }} {{ $size ?? 'btn-sm' }}"{!! isset($deleteForm) ? (' id="submit_' . $deleteForm . '"') : '' !!}>{{ $label }}</a>
@else
    <button type="{{ $type ?? 'submit' }}" class="btn btn-outline-{{ $style ?? 'info' }} {{ $size ?? 'btn-sm' }}"{!! isset($deleteForm) ? (' id="submit_' . $deleteForm . '"') : '' !!}>{{ $label }}</button>
@endif

@isset($deleteForm)
    @section('scripts')
        <script>
            formToDelete('{{ $deleteForm }}')
        </script>
    @endsection
@endisset
