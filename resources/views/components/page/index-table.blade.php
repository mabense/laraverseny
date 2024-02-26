@props(['columns', 'data'])

{{-- <table id="index">
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

</table> --}}

<section id="index" class="centered column nowrap">
    @foreach ($data as $row)
        <x-card>
            @foreach ($row as $column => $cell)
                {{ $columns[$column] }}: {{ $cell }} </br>
            @endforeach
        </x-card>
    @endforeach
</section>
