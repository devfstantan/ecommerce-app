@extends('bo.layout.main')
@section('title', 'Liste Stores')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>MAnager</th>
                <th>Nombre de produits</th>
                <th>
                    <a href="{{ route('bo.stores.create') }}" class="btn btn-outline-primary btn-sm">
                        Nouveau Store
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->phone }}</td>
                    <td>{{ $store->manager->name }}</td>
                    <td>{{ $store->products_count }}</td>
                    <td>
                        <a href="{{ route('bo.stores.show', $store) }}" class="btn btn-outline-info btn-sm">
                            Afficher
                        </a>
                        <a href="{{ route('bo.stores.edit', $store) }}" class="btn btn-outline-warning btn-sm">
                            Editer
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('bo.stores.destroy', $store) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $stores->links() }}
@endsection
