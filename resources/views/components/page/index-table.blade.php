@props(['columns', 'data'])

<table id="index">
    <tr>
        @foreach ($columns as $col)
            <th>{{ $col }}</th>
        @endforeach
    </tr>
    @foreach ($data as $row)
        <tr>
            @foreach ($row as $cell)
                <td>{{ $cell }}</td>
            @endforeach
        </tr>
    @endforeach

</table>
