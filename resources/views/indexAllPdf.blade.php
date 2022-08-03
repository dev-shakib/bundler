<h1 style="text-align:center">{!! $heading !!}</h1>
<table style="width:100%;text-align:left">
    <thead>
        <tr>
            <th></th>
            <th>Pages</th>
        </tr>
    </thead>
    @php
        $filePageStart = 1;
        $filePageEnd = 0;
        $j = 0;
        $start = 1;
    @endphp
    @foreach ($allsections as $sec)
        @if ($sec->isDefault == 1 && $sec->isHiddenInList == 1)
        @else
            @foreach ($sec->files as $item)
                @php
                    $j = $j + $item->totalPage;
                @endphp
            @endforeach
            <tr>
                <th>{{ $sec->name }}</th>
                <th>{{ $start }}-{{ $j }}</th>
            </tr>
            @foreach ($sec->files as $item)
                @php
                    $filePageEnd = $filePageEnd + $item->totalPage;
                @endphp
                <tr>
                    <td>{{ $item->filename }}</td>
                    <td>{{ $filePageStart }}-{{ $filePageEnd }}</td>
                </tr>
                @php
                    $filePageStart += $item->totalPage;
                @endphp
                {{-- IF INDEX --}}
                @php
                    if ($heading == 'INDEX'):
                        DB::table('files')
                            ->where('id', $item->id)
                            ->update(['pages' => $filePageStart . '-' . $filePageEnd]);
                    endif;
                @endphp
            @endforeach
            @php
                $start += $sec->files->sum('totalPage');
            @endphp
            {{-- IF INDEX --}}
            @php
                if ($heading == 'INDEX'):
                    DB::table('sections')
                        ->where('id', $sec->id)
                        ->update(['pages' => $start . '-' . $j]);
                endif;
            @endphp
        @endif
    @endforeach
</table>
