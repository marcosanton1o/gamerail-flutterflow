
@extends('layouts.login')
@section('title', 'Registrar-se')
@section('content')
@section('char')
<div class="hidden sm:flex flex-col pl-10 items-center">
<img class="w-32 flex mb-1" src="{{asset("images/spantom.gif")}}" alt="shop">
        <span class="font-tale w-64 flex p-2 bg-black border-2 text-pretty border-white text-white">COMO ASSIM VOC- [ANÔNIMO PASPALHO] NÃO CRIOU SUA CONTA
        AINDA?!!! CUSTA [0,00R$] E SÓ PRECISA ME DAR SEU [HYPERLINK BLOCKED].</span>
</div>
        @endsection 

    <form method="POST" id="form" data-parsley-validate action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome*')" />
            <x-text-input id="name" class="block  w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email*')" />
            <x-text-input id="email" class="block  w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha*')" />

            <x-text-input id="password" class="block  w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha*')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <x-primary-button class="items-center w-64 justify-center mt-6">
                {{ __('Registrar-se') }}
            </x-primary-button>
            <x-link class="flex items-center justify-center mt-1 ml-1" href="{{ route('login') }}" :value="__('Já tem uma conta?')" />
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#form').parsley();
    });
</script>
@endsection
