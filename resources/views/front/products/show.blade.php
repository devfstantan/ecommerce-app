@extends('front.layout.main')

@section('title', $product['title'])
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ $product['image'] }}"
                        alt="{{ $product['title'] }}" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: {{ $product['sku'] }}</div>
                    <h1 class="display-5 fw-bolder">{{ $product['title'] }}</h1>
                    <div class="fs-5 mb-1">
                        <x-product-price :value="$product['price']" />
                    </div>
                    <div class="mb-4">
                        <x-product-rating :stars="$product['rating']" />
                    </div>
                    <p class="lead">{{ $product['description'] }}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                            style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    @if (count($relatedProducts) > 0)
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($relatedProducts as $product)
                        <div class="col mb-5">
                            <x-product-card :$product />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
