@props(['method', 'action', 'inputs'])

<form method="{{ $method }}" action="{{ $action }}">
    @csrf
    @foreach ($inputs as $input)
        @php
            $has_label = $input['label'] != '';
        @endphp
        @if ($has_label)
            <label for="{{ $input['id'] }}">
                {{ $input['label'] }}
        @endif
        <input id="{{ $input['id'] }}" name="{{ $input['id'] }}" type="{{ $input['type'] }}"
            value="{{ $input['value'] }}" />
        @if ($has_label)
            </label>
        @endif
        @error($input['id'])
            <span class="error" >{{ $message }}</span>
        @enderror
        <br />
    @endforeach
</form>