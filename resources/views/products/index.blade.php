@extends('layouts.dashboard')
@section('content')
        @if (session('message'))
            <p class="p-3 m-3 mt-1 bg-green-400 border-2 border-green-700 rounded-md text-green-950">{{session('message')}}</p>
        @else
        
        @endif
        <div class="shadow-md flex gap-8 mb-4 justify-center bg-purple-300 items-center font-bold p-2 sm:mx-2 rounded-md">
                <a class="text-lg flex items-center gap-2 text-white bg-purple-600
 cursor-pointer rounded-md p-3 transition-all hover:bg-white hover:border-b-4 border-box
  hover:border-purple-700 hover:text-purple-700 justify-center" href="{{route('products.create')}}">
                    <i class="bx bx-plus text-2xl"></i>Adicionar Produto</a>
        
            @if($totalProducts > 0)
        <p class="text-purple-800 text-xl">Produtos Totais: {{$totalProducts}}</p>
        </div>
        <div class="overflow-auto rounded-md shadow-md sm:mx-2">
                <table class="w-full">
                    <thead class="bg-purple-600 font-bold text-white sticky">
                    
                <tr>
                    <th class="p-3 font-bold text-left">ID</th>
                                    <th class="p-3 font-bold text-left">Nome</th>
                                    <th class="p-3 font-bold text-left">Preço</th>
                                    <th class="p-3 font-bold text-left">Categoria</th>
                                    <th class="p-3 font-bold text-left">Fabricante</th>
                                    <th class="p-3 font-bold text-left">Lançamento</th>
                                    <th class="p-3 font-bold text-left">Descrição</th>
                                    <th class="p-3 font-bold text-left">Editar</th>
                                    <th class="p-3 font-bold text-left">Deletar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-purple-500">
                @foreach ($products as $product)
                <tr class="divide-x divide-purple-500 bg-purple-300 text-purple-800">
                                        <td class="p-3 font-bold">{{ $product->id }}</td>
                                        <td class="p-3 font-bold truncate">{{$product->name}}</td>
                                        <td class="p-3 font-bold">R${{$product->price}}</td>
                                        <td class="p-3 font-bold truncate">{{ $product->category->name ?? 'Sem categ' }}</td>
                                        <td class="p-3 font-bold truncate">{{ $product->manufacturer->name ?? 'Sem fabri' }}</td>
                                        <td class="p-3 font-bold">{{$product->release_date}}</td>
                    <td class="p-1 font-bold truncate max-w-32">{{$product->description}}</td>
                                        <td class="font-bold  justify-center items-center">
                        <a class="cursor-pointer rounded-md hover:scale-110 transition-all
                         hover:bg-purple-700 bg-purple-600 ml-4 my-1 px-2 p-1 text-white bx bx-edit-alt
                          text-xl" href="/products/edit/{{$product->id}}">
                        </a>
</td>


                        <td class="font-bold justify-center m-2 items-center">
                            <form method="POST" action="/products/destroy/{{$product->id}}">
                    @csrf
                    @method('DELETE')
    <button class="bx bx-trash cursor-pointer px-2 ml-4 py-1 text-xl transition-all hover:scale-110
         hover:bg-pink-800 rounded-md bg-pink-700 text-white"
        type="submit"></button>
    </form>
                
            </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        @else
            <p class="text-purple-800 text-xl">Nenhum Produto encontrado</p>
        
        @endif
    @endsection