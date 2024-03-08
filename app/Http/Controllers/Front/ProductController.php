<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {

        $products = Product::where('is_published',true)
                            ->latest('rating')
                            ->simplePaginate(8);

        return view('front.products.index', [
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        if(!$product->is_published) abort(404);

        $relatedProducts = Product::where('is_published',true)
                                    ->where('id', '<>', $product->id)
                                    ->inRandomOrder()
                                    ->take(4)
                                    ->get();

        return view('front.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
}

