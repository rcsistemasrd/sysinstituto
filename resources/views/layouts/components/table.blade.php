<div class="table-responsive"{!! isset($overflow) ? ' style="overflow: scroll;max-height: '.$overflow.'px;"' : '' !!}>
    <table
        class="table table-striped table-bordered table-hover table-sm table-light {{ isset($datatable) ? ' datatable' : '' }}"
        base_url="{{ $base_url }}"
        edit_url="{{ $edit_url }}"
        columns="{{ $columns }}"
        code_column={{ $code_column }}
        additional_links="{{ isset($additional_links) ? implode('|', $additional_links) : '' }}"
        additional_links_icons="{{ isset($additional_links_icons) ? implode('|', $additional_links_icons) : '' }}"
        >
        {{-- <caption>{{ $caption }}</caption> --}}

        <thead style="background-color: #3ba3b9 !important;">
            <tr>
                {{ $head }}
                @isset($additional_links)
                    @foreach ($additional_links as $number)
                        <th></th>
                    @endforeach
                @endisset
            </tr>
        </thead>

        <tbody>
            @isset($body)
                {{ $body }}
            @endisset
        </tbody>
    </table>
</div>
