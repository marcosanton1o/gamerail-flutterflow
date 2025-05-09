<header
    class="header fixed left-0 z-30 top-0 w-screen items-center justify-between bg-purple-600 text-white drop-shadow-md lg:flex lg:px-8 py-3">
    <div class="transition-all lg:px-0 lg:hover:scale-105">
        <a class="items-center font-black" href="">
            <img
                class="w-44 ml-3"
                src="{{ asset("images/grTitle.png") }}"
                alt="logo" />
        </a>
    </div>
    <ul
        class="menu items-center text-semibold hidden text-center font-semibold lg:flex mx-6 gap-4 lg:divide-y-0">
        <li
            class="flex cursor-pointer p-2 bg-purple-700 transition-all hover:scale-110 hover:bg-white hover:text-purple-700 lg:w-auto lg:rounded lg:bg-opacity-0">
            @yield('navlink1')
        </li>

        <li
            class="cursor-pointer flex p-2 bg-purple-700 transition-all hover:scale-110 hover:bg-white hover:text-purple-700 lg:w-auto lg:rounded lg:bg-opacity-0">
            @yield('navlink2')
        </li>

        <li
            class="cursor-pointer flex p-2 bg-purple-700 transition-all hover:scale-110 hover:bg-white hover:text-purple-700 lg:w-auto lg:rounded lg:bg-opacity-0">
            @yield('navlink3')
        </li>

        <li
            class="cursor-pointer flex p-2 bg-purple-700 transition-all hover:scale-110 hover:bg-white hover:text-purple-700 lg:w-auto lg:rounded lg:bg-opacity-0">
            @yield('navlink4')
        </li>
        @yield('navlink5')
        @yield('navlink6')
    </ul>
    @yield('searchbar')
    <div class="absolute right-8 top-3 flex flex-row lg:static">
        @if (auth()->check())
        <div class="group flex items-center">
            <img
                class="h-8 rounded-2xl transition-all group-hover:ring-2 group-hover:ring-white"
                src="{{ asset("images/defIcon.png") }}"
                alt="pfp" />
            <a
                class="dropDbutton bx bx-chevron-down group flex cursor-pointer items-center gap-1 rounded-md pl-1 pr-2 text-3xl font-semibold transition-all"
                onclick="showDropD()"></a>
            <ul
                class="dropD absolute text-center right-4 top-1 mt-10 hidden flex-col items-center rounded-md bg-purple-950 bg-opacity-75 p-2 font-semibold lg:right-6 lg:top-5">
                <li
                    class="m-1 flex items-center justify-center rounded-md bg-purple-600 bg-opacity-15 px-3 py-1 transition-all hover:bg-white hover:py-2 hover:text-purple-700 lg:px-2">
                    Perfil
                </li>
                <li
                    class="m-1 flex justify-center rounded-md bg-purple-600 bg-opacity-15 px-2 py-1 transition-all hover:bg-white hover:py-2 hover:text-purple-700">
                    Lista de desejos
                </li>
                <li
                    class="m-1 flex items-center justify-center gap-1 rounded-md bg-purple-600 bg-opacity-15 px-3 py-1 transition-all hover:bg-white hover:py-2 hover:text-purple-700 lg:px-2">
                    @yield("devarea")
                </li>
                <li
                    class="m-1 flex items-center justify-center gap-1 rounded-md bg-purple-600 bg-opacity-15 px-3 py-1 transition-all hover:bg-white hover:py-2 hover:text-purple-700 lg:px-2">
                    <div class="bx bx-log-out-circle"></div>
                    <a href="{{ route("logout") }}">Logout</a>
                </li>
            </ul>
        </div>
        @else
        <a
            class="group mr-2 flex cursor-pointer items-center gap-1 rounded-md p-1 pr-2 font-semibold transition-all hover:scale-110 hover:bg-white hover:text-purple-700"
            href="{{ route("login") }}">
            <div class="bx bx-log-in-circle text-2xl"></div>
            Login
        </a>
        @endif
        <div class="lg:hidden">
            <button
                class="bx bx-menu mt-0.5 cursor-pointer items-center text-4xl transition-all hover:scale-110"></button>
        </div>
    </div>
</header>