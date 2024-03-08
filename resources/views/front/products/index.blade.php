@extends('front.layout.main')

@section('title', 'Accueil')

@section('header')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($products as $product)
                    <div class="col mb-5">
                        <x-product-card :$product />
                    </div>
                @empty
                    <div class="text-center">
                        Aucun Produit Trouvé
                    </div>
                @endforelse
                {{$products->links()}}
            </div>
        </div>
    </section>
@endsection
