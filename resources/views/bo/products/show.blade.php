@extends('bo.layout.main')
@section('title', 'Détails Store')

@section('content')
    <div class="container  my-5 ">
        <h4>{{ $product->title }}</h4>
        <x-product-rating :stars="$product->rating" class="justify-content-start" />
        <p>{{ $product->description }}</p>
    </div>
    <ul class="list-group">
        <li class="list-group-item">SKU: {{$product->sku}}</li>
        <li class="list-group-item">
            Publié:
            @if ($product->is_published)
                <i class="fa-solid fa-check text-success"></i>
            @else
                <i class="fa-solid fa-xmark text-danger"></i>
            @endif
        </li>
        <li class="list-group-item">
            Prix: <x-product-price :value="$product['price']" />
        </li>
        <li class="list-group-item">
            Rating: {{$product->rating}} ( {{$product->scores_count}}  ) 
        </li>
        <li class="list-group-item">
            Store: <a href="{{ route('bo.stores.show', $product->store) }}">{{ $product->store->name }}</a>
        </li>
        <li class="list-group-item">
            Catégories:
            @foreach ($product->categories as $cat)
                <span class="badge text-bg-light">{{ $cat->name }}</span>
            @endforeach
        </li>
    </ul>

@endsection
