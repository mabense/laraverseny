@extends('layout')

@props(['code', 'message'])

@section('title')
    {{ $message }}
@endsection

@section('page')
    <x-card class="centered stretch-height column nowrap">
        {{ $code }} | {{ $message }}
    </x-card>
@endsection
