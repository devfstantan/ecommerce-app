<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MyProductMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id_store_produit = $request->product->store->id;
        $id_mon_store = Auth::user()->store->id;
        if($id_mon_store !== $id_store_produit){
            abort(403, 'Produit non autorisé');
        }
        return $next($request);
    }
}
