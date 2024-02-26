<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="hu" xml:lang="hu">

@php
    define('PRE_TITLE', 'Laraverseny - ');
@endphp

<template id="ajax">
    <title>{{ PRE_TITLE }}</title>
</template>

<head>
    <title> {{ PRE_TITLE }} @yield('title') </title>
    <meta charset="utf8" />
    <link rel="stylesheet" href="{{ asset('/css/colours.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/links.css') }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/js/nav/ajax.js') }}" type="text/javascript"></script>

</head>

<body>
        <x-layout.top-nav />
        <main class="row">
            <x-layout.side-nav />
            <section id="page" class="centered column">
                @yield('page')
            </section>
        </main>
        <x-layout.feedback />
    
</body>

</html>
