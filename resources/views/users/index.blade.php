@extends('layout')

@props(['data'])

@section('title')
    Felhasználók
@endsection

@section('page')
    <x-page.detail-box />
    <x-page.button-bar />
    <x-page.index-table :data="$data" />
@endsection
