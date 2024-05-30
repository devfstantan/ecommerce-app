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
        $id_store_product = $request->product->store->id;
        $id_store_user = Auth::user()->store->id;
        if($id_store_product !== $id_store_user){
            abort(403,'Accès refusé');
        }
        
        return $next($request);
    }
}
