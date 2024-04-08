<?php

namespace App\Http\Controllers\Bo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['store','categories'])->latest()->paginate();

        return view('bo.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        $categories = Category::all();
        return view('bo.products.create',[
            'stores' => $stores,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * validation: 
     * - title: obligatoire,
     * - sku: obkigatoire, unique
     * - price: obligatoire, nombre > 0
     * - store: id existe dans stores
     * - categories: array ids dans categories
     */
    public function store(Request $request)
    {
        // 1- validate le fomulaire
        $validated = $request->validate([
            'title' => ['required'],
            'sku' => ['required','unique:products,sku'],
            'price' => ['required','numeric','min:0'],
            'description' => ['nullable'],
            'store_id' => ['required','exists:stores,id'],
            'categories' => ['nullable','array'],
        ]);

        // 2- Créer le produits
        $validated['is_published'] = isset($request->is_published);
        $product = Product::create($validated);
        $product->categories()->attach($request->categories);

        // 3- redériger vers la page bo.products.index
        return to_route('bo.products.index')->with('success','Produit créé avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('bo.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $selected_categories = [];
        foreach ($product->categories as $cat) {
            $selected_categories[] = $cat->id;
        }

        $stores = Store::all();
        $categories = Category::all();
        
        return view('bo.products.edit',[
            'product' => $product,
            'selected_categories' => $selected_categories,
            'stores' => $stores,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 1- validate le fomulaire
        $validated = $request->validate([
            'title' => ['required'],
            'sku' => ['required', Rule::unique('products', 'sku')->ignore($product->id)],
            'price' => ['required','numeric','min:0'],
            'description' => ['nullable'],
            'store_id' => ['required','exists:stores,id'],
            'categories' => ['nullable','array'],
        ]);

        // 2- Mettre à jour le produits
        $validated['is_published'] = isset($request->is_published);
        $product->update($validated);
        $product->categories()->sync($request->categories);

        // 3- redériger vers la page bo.products.index
        return to_route('bo.products.index')->with('success','Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('bo.products.index')->with('success','Produit Supprimé avec succès');


    }
}
