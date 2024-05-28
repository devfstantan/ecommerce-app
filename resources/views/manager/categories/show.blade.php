@extends('manager.layout.main')
@section('title', 'Détails Catégorie')

@section('content')
   <div class="container py-5  my-5 bg-light ">
    <h4>{{ $category->name }}</h4>
    <p>{{ $category->description }}</p>
   </div>
    @if (count($category->products))
    <table class="table table-hover">
        <thead>
            <th></th>
            <th>Titre</th>
            <th>Rating</th>
            <th>Prix</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($category->products as $product)
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
