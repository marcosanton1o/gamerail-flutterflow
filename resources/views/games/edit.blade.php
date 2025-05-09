@extends("layouts.form")
@section("title", "Editanto " . $game->title)
@section("content")
<form id="form" class="" data-parsley-validate action="{{ route('games.update', $game->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $game->id }}">
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="title" :value="__('Título')" />
            <x-text-input required maxLength="30" minLength="2" id="title" name="title" value="{{ old('title', $game->title) }}" type="text" class="w-full" />
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="price" :value="__('Preço')" />
            <x-text-input
                required
                maxlength="15"
                inputmode="numeric"
                id="price"
                name="price"
                type="number"
                value="{{ old('price', $game->price) }}"
                class="w-full" />
        </div>
    </div>

    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="game_category_id" :value="__('Categoria')" />
            <select name="game_category_id" id="game_category_id" class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white">
                <option value="">Selecione a categoria</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('game_category_id', $game->game_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="release_date" :value="__('Data de Lançamento')" />
            <x-text-input required id="release_date" name="release_date" type="date" class="w-full" value="{{ old('release_date', $game->release_date) }}"
                onkeydown="return false;" />
        </div>
    </div>

    <!-- Linha: Desenvolvedora e Publicadora -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="developer_id" :value="__('Desenvolvedora')" />
            <select class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white" name="developer_id" id="developer_id" required class="w-full rounded-md border-gray-300 p-2">
                <option value="">Selec. a desenvolvedora</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ old('developer_id', $game->developer_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="publisher_id" :value="__('Publicadora')" />
            <select name="publisher_id" id="publisher_id" required class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white">
                <option value="">Selecione a publicadora</option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ old('publisher_id', $game->publisher_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <x-input-label :value="__('Descrição')" for="description" />
    <textarea required maxLength='200' minLength='2'
        class="h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
        id="description"
        name="description"
        type="text">{{ old('description', $game->description) }}</textarea>

    <x-primary-button class="mb-1 mt-6 flex w-full justify-center">
        {{ __("Confirmar") }}
    </x-primary-button>
    <x-link
        class="mt-3 flex justify-center"
        href="{{route('games.index')}}"
        :value="__('Voltar á Tabela')" />
    </div>
</form>
@endsection

@section("char")
@endsection
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