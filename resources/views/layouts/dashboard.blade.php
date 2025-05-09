@section('navlink1')
<a href="/dashboard">Dashboard</a>
@endsection
@section('navlink2')
<a href="/games">Jogos</a>
@endsection
@section('navlink3')
<a href="/products">Produtos</a>
@endsection
@section('navlink4')
<a href="/companies">Empresas</a>
@endsection
@section('navlink5')
<li
    class="cursor-pointer flex lg:p-2 bg-purple-700 transition-all hover:scale-110 hover:bg-white hover:text-purple-700 lg:w-auto lg:rounded lg:bg-opacity-0">
    <a href="/gameCategories">Categ. Jogos</a>
</li>
@endsection
@section('navlink6')
<li
    class="cursor-pointer  lg:p-2 bg-purple-700 transition-all hover:scale-110 hover:bg-white hover:text-purple-700 lg:w-auto lg:rounded lg:bg-opacity-0">
    <a href="/prodCategories">Categ. Produtos</a>
</li>
@endsection
@section('devarea')
<a href="{{ route("home") }}">Voltar a loja</a>
@endsection
<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield("title")</title>
@vite(['resources/css/app.css', 'resources/js/app.js',])
<link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet" />
</head>
@extends('layouts.navbar')

<body class="bg-gradient-to-r justify-center shadow-xl min-h-screen z-20 from-purple-950 to-violet-900
px-4 pt-20 text-white w-full">
    @yield("content")
</body>

</html>