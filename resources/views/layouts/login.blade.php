<!DOCTYPE html>
<html lang="pt-BR">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield("title")</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{asset('js/custom.js')}}"defer></script>
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        @vite("resources/css/app.css")
    </head>
<body class="w-screen h-screen flex bg-slate-600">
    <img class="absolute w-screen h-screen object-cover" src="{{asset('images/bg1.webp')}}" alt="">
    <div class="absolute opacity-65 bg-purple-950  w-screen h-screen"></div>

    <div class="flex bg-gradient-to-r from-purple-950 to-purple-800 sm:from-30% md:to-fuchsia-700 rounded-xl px-8 py-8
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
</html>