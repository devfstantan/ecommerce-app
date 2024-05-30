<?php

namespace App\Http\Controllers\Bo;

use App\Http\Controllers\Controller;
use App\Mail\StoreCreatedMail;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::withCount('products')
            ->with('manager')
            ->latest('products_count')
            ->paginate();
        return view('bo.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bo.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1- valider le formulaire
        $validated = $request->validate([
            'name' => ['required', 'unique:stores,name'],
            'address' => ['nullable', 'min:5'],
            'phone' => ['nullable', 'regex:/^\+?[0-9 -\.]+$/'],
            'manager_name' => ['required'],
            'manager_email' => ['required','email','unique:users,email'],
            'manager_password' => ['required','min:6','confirmed'],
        ]);

        // 2- créer le manager
        $manager = User::create([
            'name' => $validated['manager_name'],
            'email' => $validated['manager_email'],
            'password' => Hash::make($validated['manager_password']),
        ]);
        $manager->role = "store-manager";
        $manager->email_verified_at = Date::now();
        $manager->save();
        
        // 3- creéer le store
        $store = Store::create($validated);

        $store->manager_id = $manager->id;
        $store->save();

        // 4- envoyer l'email au manager
        Mail::to($manager->email)->send(
            new StoreCreatedMail($manager, $store, $validated['manager_password'])
        );
        // 5- redériger vers l'index des stores
        return to_route('bo.stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return view('bo.stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('bo.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
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
        return to_route('bo.stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $has_products = $store->products()->exists();
        if ($has_products) {
            return  to_route("bo.stores.index")->with('error', 'Impossible de supprimer le store');
        }
        
        $manager = $store->manager;
        if ($store->delete() && $manager->delete()) {
            return  to_route("bo.stores.index")->with('success', 'Store Supprimé');
        }
    }
}
