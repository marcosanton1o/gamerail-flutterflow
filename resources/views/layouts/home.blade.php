@section('title', 'GameRail')
@section('navlink1', 'Início')
@section('navlink2', 'Ofertas')
@section('navlink3', 'Categorias')
@section('navlink4', 'Contato')
@section('devarea')
<a href="{{ route("dashboard") }}">Área Dev</a>
@endsection
@section('searchbar')
<div class="search shadow-inner mt-3 hidden items-center lg:mt-0 lg:flex lg:py-0">
    <div class="relative flex items-center">
        <i class="bx bx-search absolute left-3 text-2xl text-white"></i>
        <input
            class="rounded-md border-none bg-purple-800 px-8 pl-10 text-white placeholder-white ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-800 focus:text-white focus:ring-2 focus:ring-white"
            placeholder="Buscar Jogos..."
            type="text" />
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title")</title>
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js',])
</head>
@extends('layouts.navbar')

<body class="bg-gradient-to-r justify-center shadow-xl min-h-screen z-20 from-purple-950 to-violet-900
px-4 pt-20 text-white w-full">
    @yield("content")
</body>

</html>