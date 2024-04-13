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
</head>

<body>
    @yield('page')
</body>

</html>