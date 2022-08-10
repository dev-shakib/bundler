<h1 style="text-align:center">{!! $heading !!}</h1>
<table style="width:100%;text-align:left">
    <thead>
        <tr>
            <th style="width: 15%;"></th>
            <th style="width: 80%;"></th>
            <th style="width: 10%;text-align:right">Pages</th>
        </tr>
    </thead>
    @php
        $filePageStart = 1;
        $filePageEnd = 0;
        $j = 0;
        $start = 1;
        $i = 1;
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
                <th>Section {{ $i++ }} : </th>
                <th style="text-align:left">{{ $sec->name }}</th>
                <th style="text-align:right">{{ $start }}-{{ $j }}</th>
            </tr>
            @foreach ($sec->files as $item)
                @php
                    $filePageEnd = $filePageEnd + $item->totalPage;
                @endphp
                <tr>
                    <td></td>
                    <td style="text-align:left">{{ $item->filename }}</td>
                    <td style="text-align:right">{{ $filePageStart }}-{{ $filePageEnd }}</td>
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