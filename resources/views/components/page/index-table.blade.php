@props(['data'])

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
            név: {{ $row['surname'] }} {{ $row['givenname'] }} </br>
            email: {{ $row['email'] }} </br>
            {{-- @foreach ($row as $column => $cell)
            {{ $column }}: {{ $cell }} </br>
            @endforeach --}}
        </x-card>
    @endforeach
</section>
