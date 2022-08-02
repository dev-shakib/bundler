<h1 style="text-align:center">INDEX</h1>
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
        @if ($sec->isDefault == 1)
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
                <tr>
                    <td>{{ $sec->name }}</td>
                    <td>{{ $filePageStart }}-{{ $filePageEnd = $filePageEnd + $item->totalPage }}</td>
                </tr>
                @php
                    $filePageStart += $item->totalPage;
                @endphp
            @endforeach
            @php
                $start += $sec->files->sum('totalPage');
            @endphp
        @endif
    @endforeach
</table>
