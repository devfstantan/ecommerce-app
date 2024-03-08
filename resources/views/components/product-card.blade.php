@props(['product'])

<div class="card h-100">
    <!-- Product image-->
    <img class="card-img-top" src="{{ $product['image'] }}" alt="{{ $product['title'] }}" />
    <!-- Product details-->
    <div class="card-body p-4">
        <div class="text-center">
            <!-- Product name-->
            <h5 class="fw-bolder">{{ $product['title'] }}</h5>
            <!-- Product reviews-->
            <x-product-rating :stars="$product['rating']" class="justify-content-center" />
            <!-- Product price-->
            <x-product-price :value="$product['price']" />
        </div>
    </div>
    <!-- Product actions-->
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center">
            <a class="btn btn-outline-dark mt-auto" href="{{route('front.products.show',['product' => $product])}}">Afficher</a>
        </div>
    </div>
</div>
