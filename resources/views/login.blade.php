@extends('layout')

@section('title')
    Bejelentkezés
@endsection

@section('page')
    <x-card class="centered column nowrap">
        @php
            $inputs = [
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
                    'id' => 'ok',
                    'label' => '',
                    'type' => 'submit',
                    'value' => 'Belépés',
                ],
            ];
        @endphp
        <x-page.form method="POST" action="/users" :inputs="$inputs" />
    </x-card>
@endsection
