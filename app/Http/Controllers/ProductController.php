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
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category' => $request->category,
        'total_sales' => $request->total_sales,
        'image' => $request->image,
    ]);

    return response()->json([
        'message' => 'Produto criado com sucesso!',
        'Product' => $Product
    ], 201);
}

    public function show($id)
    {
        $Product = Product::find($id);
        if (!$Product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
        return response()->json($Product);
    }
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    
        $updated = $product->update($request->only(['name', 'category', 'price','description','total_sales','image']));

        if ($updated) {
            return response()->json(['message' => 'Produto atualizado com sucesso', 'product' => $product]);
        }

        return response()->json(['message' => 'Erro ao atualizar Produto'], 500);
    }

    public function destroy($id)
{
    $Product = Product::find($id);

    if (!$Product) {
        return response()->json(['message' => 'Produto não encontrado'], 404);
    }

    $Product->delete();

    return response()->noContent(); // Retorna HTTP 204
}
}
