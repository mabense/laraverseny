@extends('layout')

@props(['data'])

@section('title')
    Felhasználók
@endsection

@section('page')
    <x-page.detail-box />
    <x-page.button-bar />
    <x-page.index>
        @foreach ($data as $row)
            <x-card>
                név: {{ $row['surname'] }} {{ $row['givenname'] }} </br>
                email: {{ $row['email'] }} </br>
                {{-- @foreach ($row as $column => $cell)
                {{ $column }}: {{ $cell }} </br>
                @endforeach --}}
            </x-card>
        @endforeach
    </x-page.index>
@endsection
