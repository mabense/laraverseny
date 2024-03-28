@extends('layout')

@section('title')
    Welcome
@endsection

@section('page')
    @auth
        <x-card class="centered stretch-height column nowrap">
            Üdv, {{ auth()->user()->surname }} {{ auth()->user()->givenname }}!
        </x-card>
    @else
        <x-card class="centered stretch-height column nowrap">
            Helló, vendég!
        </x-card>
    @endauth
@endsection
