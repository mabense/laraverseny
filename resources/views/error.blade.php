@extends('layout')

@props(['code', 'message'])

@section('title')
    {{ $message }}
@endsection

@section('page')
    <centered>
        {{ $code }} | {{ $message }}
    </centered>
@endsection