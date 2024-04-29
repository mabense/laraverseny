@extends('layout')

@props(['data'])

@section('title')
    Felhasználók
@endsection

@section('page')
        @foreach ($data as $row)
            <x-card>
                név: {{ $row['surname'] }} {{ $row['givenname'] }} </br>
                email: {{ $row['email'] }} </br>
                {{-- @foreach ($row as $column => $cell)
                {{ $column }}: {{ $cell }} </br>
                @endforeach --}}
            </x-card>
        @endforeach
@endsection
