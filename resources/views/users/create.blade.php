@extends('layout')

@section('title')
    Regisztráció
@endsection

@section('page')
    <p>
        @auth
            Szia, {{ auth()->user()->surname }} {{ auth()->user()->givenname }}!
        @endauth
    </p>
    <form method="post" action="/signup">
        @csrf
        <input type="text" name="surname" value="{{ old('surname') }}" />
        @error('surname')
            <span class="error-text">{{ $message }}</span>
        @enderror
        <br />

        <input type="text" name="givenname" value="{{ old('givenname') }}" />
        @error('givenname')
            <span class="error-text">{{ $message }}</span>
        @enderror
        <br />

        <input type="email" name="email" value="{{ old('email') }}" />
        @error('email')
            <span class="error-text">{{ $message }}</span>
        @enderror
        <br />

        <input type="password" name="password" value="{{ old('password') }}" />
        @error('password')
            <span class="error-text">{{ $message }}</span>
        @enderror
        <br />

        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
        @error('password_confirmation')
            <span class="error-text">{{ $message }}</span>
        @enderror
        <br />

        <input type="submit" name="ok" value="Mentés" />
    </form>
@endsection
