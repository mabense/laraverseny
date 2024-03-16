@extends('layout')

@section('title')
    Regisztráció
@endsection

@section('page')
    <x-card class="centered column nowrap">
        @php
            $inputs = [
                [
                    'id' => 'surname',
                    'label' => 'Vezetéknév',
                    'type' => 'text',
                    'value' => old('surname'),
                ],
                [
                    'id' => 'givenname',
                    'label' => 'Keresztnév',
                    'type' => 'text',
                    'value' => old('givenname'),
                ],
                [
                    'id' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                    'value' => old('email'),
                ],
                [
                    'id' => 'password',
                    'label' => 'Jelszó',
                    'type' => 'password',
                    'value' => old('password'),
                ],
                [
                    'id' => 'password_confirmation',
                    'label' => 'Jelszó még egyszer',
                    'type' => 'password',
                    'value' => old('password_confirmation'),
                ],
                [
                    'id' => 'ok',
                    'label' => '',
                    'type' => 'submit',
                    'value' => 'Regisztráció',
                ],
            ];
        @endphp
        <x-page.form method="POST" action="/users" :inputs="$inputs" />
    </x-card>
@endsection
