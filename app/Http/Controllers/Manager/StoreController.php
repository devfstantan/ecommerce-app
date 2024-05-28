<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {  
        $store = Auth::user()->store;
        return view('manager.stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $store = Auth::user()->store;
        return view('manager.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $store = Auth::user()->store;

        // 1- valider le formulaire
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('stores', 'name')->ignore($store->id)
            ],
            'address' => ['nullable', 'min:5'],
            'phone' => ['nullable', 'regex:/^\+?[0-9 -\.]+$/']
        ]);

        // 2- creéer le store
        $store->update($validated);

        // 3- redériger vers l'index des stores
        return to_route('manager.stores.index');
    }

    
}
