<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? '' }}</title>
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <link rel="icon" type="image/svg+xml" href="#" sizes="any">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>

<x-components.header-component />

<main class="container mt-5 mb-5">
    {{ $slot }}
</main>

@vite('resources/js/app.js')
@livewireScripts

</body>
</html>