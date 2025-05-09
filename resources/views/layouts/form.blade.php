@extends('layouts.dashboard')
@section('content')
<body class="w-screen h-screen flex bg-slate-600">
    <img class="absolute w-screen h-screen object-cover" src="{{asset('images/bg1.webp')}}" alt="">
    <div class="absolute opacity-65 bg-purple-950  w-screen h-screen"></div>

    <div class="flex bg-gradient-to-r from-purple-950 to-purple-800 sm:from-70% md:to-purple-900 rounded-xl px-8 py-8
     drop-shadow-xl my-auto mx-auto items-center">
        <div>
        <a href="{{route('dashboard')}}">
    <img class="w-20 mx-auto flex hover:scale-105 transition-all mb-4" src="{{asset('images/grIcon.png')}}" alt="logo">
    </a>
    @yield('content')
    </div>
       @yield('char') 
    </div>
</body>
@endsection