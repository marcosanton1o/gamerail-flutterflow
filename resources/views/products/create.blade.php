@extends("layouts.form")
@section("title", "Adicionar Produto")
@section("content")
<form data-parsley-validate action="{{ route('products.store') }}" id="form" method="POST" class="max-w-3xl mx-auto p-6">
    @csrf

    <!-- Linha: Título e Preço -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input required maxLength="30" minLength="2" id="name" name="name" type="text" class="w-full" />
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="price" :value="__('Preço')" />
            <x-text-input 
                required
                id="price"
                name="price"
                type="text"
                oninput="formatarValor(this)"
                class="w-full"
            />
        </div>
    </div>

    <!-- Linha: Categoria e Data de Lançamento -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="category_id" :value="__('Categoria')" />
            <select name="category_id" id="category_id" class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white">
                <option value="">Selecione a categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 mb-4">
            <x-input-label for="release_date" :value="__('Data de Lançamento')" />
            <x-text-input required id="release_date" name="release_date" type="date" class="w-full" onkeydown="return false;" />
        </div>
    </div>

    <!-- Linha: Desenvolvedora -->
    <div class="md:flex md:gap-6">
        <div class="flex-1 mb-4">
            <x-input-label for="manufacturer_id" :value="__('Desenvolvedora')" />
            <select class="w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white" name="manufacturer_id" id="manufacturer_id" required>
                <option value="">Selecione a fabricante</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Descrição -->
    <div>
        <x-input-label for="description" :value="__('Descrição')" />
        <textarea required maxLength='200' minLength='2'
                  class="h-20 w-full rounded-md border-none bg-purple-600 text-white placeholder-white shadow-inner ring-0 transition-all focus:border-fuchsia-500 focus:bg-purple-700 focus:text-white focus:ring-2 focus:ring-white"
                  id="description"
                  name="description"
                  type="text"
        ></textarea>
    </div>

    <!-- Botões -->
    <div class="flex flex-col items-center">
        <x-primary-button class="mt-4 mb-1 w-full justify-center">
            {{ __("Confirmar") }}
        </x-primary-button>
        <x-link class="mt-3" href="{{ route('products.index') }}" :value="__('Voltar à Tabela')" />
    </div>
</form>

<script>
document.getElementById('form').addEventListener('submit', function () {
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
