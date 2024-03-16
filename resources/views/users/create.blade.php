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
                    'value' => '',
                ],
                [
                    'id' => 'givenname',
                    'label' => 'Keresztnév',
                    'type' => 'text',
                    'value' => '',
                ],
                [
                    'id' => 'email',
                    'label' => 'Email',
                    'type' => 'email',
                    'value' => '',
                ],
                [
                    'id' => 'password',
                    'label' => 'Jelszó',
                    'type' => 'password',
                    'value' => '',
                ],
                [
                    'id' => 'password_confirmation',
                    'label' => 'Jelszó még egyszer',
                    'type' => 'password',
                    'value' => '',
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
