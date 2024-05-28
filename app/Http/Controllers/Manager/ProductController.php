<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['store', 'categories'])->latest()->paginate();

        return view('manager.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        $categories = Category::all();
        return view('manager.products.create', [
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
            'sku' => ['required', 'unique:products,sku'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
            'store_id' => ['required', 'exists:stores,id'],
            'categories' => ['nullable', 'array'],
            "image" => ['nullable', 'image', 'max:2048']
        ]);

        // 2- store image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/products');
            $validated['image'] = str_replace('public', '/storage', $path);
        }

        // 3- Créer le produit
        $validated['is_published'] = isset($request->is_published);
        $product = Product::create($validated);

        // 4- attacher catégories
        $product->categories()->attach($request->categories);

        // 5- redériger vers la page manager.products.index
        return to_route('manager.products.index')->with('success', 'Produit créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('manager.products.show', compact('product'));
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

        return view('manager.products.edit', [
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
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
            'store_id' => ['required', 'exists:stores,id'],
            'categories' => ['nullable', 'array'],
            "image" => ['nullable', 'image', 'max:2048']
        ]);
         // 1- update image
        if ($request->hasFile('image')) {
            Storage::delete( str_replace('/storage', 'public', $product->image) );
            $path = $request->file('image')->store('public/products');
            $validated['image'] = str_replace('public', '/storage', $path);
        }

        // 2- Mettre à jour le produit
        $validated['is_published'] = isset($request->is_published);
        $product->update($validated);
        $product->categories()->sync($request->categories);

        // 3- redériger vers la page manager.products.index
        return to_route('manager.products.index')->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // 1- supprimer l'image
        if($product->image){
            Storage::delete( str_replace('/storage', 'public', $product->image) );
        }
        // 2- supprimer le produit
        $product->delete();

        // 3- redirect vers products.index
        return to_route('manager.products.index')->with('success', 'Produit Supprimé avec succès');
    }
}
