<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{

    public function index()
    {
        $Productstotal = Product::count();
        $Products = Product::All();

        return response()->json([
            'Productstotal' => $Productstotal,
            'Products' => $Products
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $Product = Product::create([

            'name' => $request->title,
            'description' => $request->developer,
            'price' => $request->publisher,
            'category' => $request->category,
            'total_sales' => $request->total_sales,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Jogo criado com sucesso!',
            'Product' => $Product
        ], 201);
    }

    public function show($id)
    {
        $Product = Product::find($id);

        if (!$Product) {
            return response()->json(['message' => 'Jogo não encontrado'], 404);
        }

        return response()->json($Product);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $Product = Product::find($id);

        if (!$Product) {
            return response()->json(['message' => 'Jogo não encontrado'], 404);
        }

        $Product->update($request->all());

        return response()->json([
            'message' => 'Jogo atualizado com sucesso!',
            'Product' => $Product
        ]);
    }

    public function destroy($id)
    {
        $Product = Product::find($id);

        if (!$Product) {
            return response()->json(['message' => 'Jogo não encontrado'], 404);
        }

        $Product->delete();

        return response()->json(['message' => 'Jogo deletado com sucesso!']);
    }
}
