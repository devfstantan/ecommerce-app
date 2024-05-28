@extends('manager.layout.main')
@section('title', 'Liste Produits')

@section('content')
    @if (count($products))
        <table class="table table-hover">
            <thead>
                <th></th>
                <th>sku</th>
                <th>Titre</th>
                <th>Rating</th>
                <th>Prix</th>
                <th>Est publié?</th>
                <th>Store</th>
                <th>Catégories</th>
                <th colspan="2" class="text-end">
                    <a href="{{ route('manager.products.create') }}" class="btn btn-outline-primary btn-sm">
                        Nouveau
                    </a>
                </th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->image }}" alt="{{ $product->image }}" class="img-fluid" style="height:2em" />
                        </td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->title }}</td>
                        <td class="text-end">
                            <x-product-rating :stars="$product->rating" class="justify-content-end" />
                        </td>
                        <td class="text-end">
                            <x-product-price :value="$product['price']" />
                        </td>
                        <td class="text-center">
                            @if ($product->is_published)
                                <i class="fa-solid fa-check text-success"></i>
                            @else
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('manager.stores.show', $product->store) }}">{{ $product->store->name }}</a>
                        </td>
                        <td>
                            @foreach ($product->categories as $cat)
                                <span class="badge text-bg-light">{{ $cat->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('manager.products.show', $product) }}" class="btn btn-outline-info btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('manager.products.edit', $product) }}" class="btn btn-outline-warning btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('manager.products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="" class="btn btn-outline-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center">Aucun Produit</div>
    @endif
    {{ $products->links() }}
@endsection
