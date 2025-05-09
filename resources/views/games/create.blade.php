@extends("layouts.form")
@section("title", "Adicionar Jogo")
@section("content")
<form data-parsley-validate action="{{ route('games.store') }}" id="form" method="POST" class="max-w-3xl mx-auto p-6">
    @csrf

    <!-- Linha: Título e Preço -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="title" :value="__('Título*')" />
            <x-text-input
                required
                maxLength="30"
                minLength="2"
                id="title"
                name="title"
                type="text"
                class="w-full {{ $errors->has('title') ? 'border-red-500' : '' }}"
                value="{{ old('title') }}" />

            @if ($errors->has('title'))
            <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="price" :value="__('Preço*')" />
            <x-text-input
                required
                id=" price"
                name="price"
                type="text"
                oninput="formatarValor(this)"
                placeholder="Digite o Preço"
                class=" w-full" />
        </div>
    </div>

    <!-- Linha: Categoria e Data de Lançamento -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="game_category_id" :value="__('Categoria*')" />
            <select name="game_category_id" id="game_category_id" class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white">
                <option value="">Selecione a categoria</option>

                <option value="{{ $category->id }}">{{ $category->name }}</option>
            </select>
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="release_date" :value="__('Data de Lançamento')" />
            <x-text-input id="release_date" name="release_date" type="date" class="w-full"
                onkeydown="return false;" />
        </div>
    </div>

    <!-- Linha: Desenvolvedora e Publicadora -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="developer_id" :value="__('Desenvolvedora*')" />
            <select class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white" name="developer_id" id="developer_id" required class="w-full rounded-md border-gray-300 p-2">
                <option value="">Selec. a desenvolvedora</option>

                <option value="{{ $company->id }}">{{ $company->name }}</option>
            </select>
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="publisher_id" :value="__('Publicadora*')" />
            <select name="publisher_id" id="publisher_id" required class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white">
                <option value="">Selecione a publicadora</option>

                <option value="{{ $company->id }}">{{ $company->name }}</option>
            </select>
        </div>
    </div>

    <!-- Descrição -->
    <div>
        <x-input-label for="description" :value="__('Descrição')" />
        <textarea maxLength='200' minLength='2'
            class="h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
            id="description"
            name="description"
            type="text"></textarea>
    </div>

    <!-- Botões -->
    <div class="flex flex-col items-center mt-6">
        <x-primary-button class="mb-1 w-full justify-center">
            {{ __("Confirmar") }}
        </x-primary-button>
        <x-link class="mt-3" href="{{ route('games.index') }}" :value="__('Voltar à Tabela')" />
    </div>
</form>
<script>
    document.getElementById('form').addEventListener('submit', function() {
        const input = document.getElementById('price');
        let valor = input.value;

        valor = valor.replace(/R\$\s?/, '');

        valor = valor.replace(/\./g, '');

        valor = valor.replace(',', '.');

        input.value = valor;
    });
</script>
@endsection

@section("char")
@endsection