@extends('bo.layout.main')
@section('title', 'Détails Store')

@section('content')
   <div class="container py-5  my-5 bg-light ">
    <div class="row">
        <div class="col-6">
            <h4>{{ $store->name }}</h4>
        </div>
        <div class="col-6">
            Tél: {{ $store->phone }} <br>
            Adreesse : {{ $store->address }} <br>
            Manager: {{ $store->manager->name }}
        </div>
    </div>
   </div>
    @if (count($store->products))
    <table class="table table-hover">
        <thead>
            <th></th>
            <th>Titre</th>
            <th>Rating</th>
            <th>Prix</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($store->products as $product)
                <tr>
                    <td>
                        <img src="{{ $product->image }}" alt="{{ $product->image }}" class="img-fluid" style="height:2em" />
                    </td>
                    <td>{{ $product->title }}</td>
                    <td class="text-end">
                        <x-product-rating :stars="$product->rating" class="justify-content-end" />
                    </td>
                    <td class="text-end">
                        <x-product-price :value="$product['price']" />
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @else
        <div class="text-center">Aucun Produit</div>
    @endif
@endsection
