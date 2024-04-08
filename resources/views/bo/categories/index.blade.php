@extends('bo.layout.main')
@section('title', 'Liste Catégories')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nombre de produits</th>
                <th>
                    <a href="{{ route('bo.categories.create') }}" class="btn btn-outline-primary btn-sm">
                        Nouvelle Catégorie
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count}}</td>
                    <td>
                        <a href="{{ route('bo.categories.show', $category) }}" class="btn btn-outline-info btn-sm">
                            Afficher
                        </a>
                        <a href="{{ route('bo.categories.edit', $category) }}" class="btn btn-outline-warning btn-sm">
                            Editer
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('bo.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer" class="btn btn-outline-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
