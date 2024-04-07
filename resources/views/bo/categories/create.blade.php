@extends('bo.layout.main')
@section('title', 'Nouvelle Catégorie')

@section('content')
    <form action="{{ route('bo.categories.store') }}" method="post">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" value="{{old('name')}}" id="name" name="name" placeholder="" class="form-control">
            <label for="name">Nom de la catégorie</label>
            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <textarea  id="description" name="description" placeholder="" class="form-control"  rows="10">{{old('description')}}</textarea>
            <label for="description">Description</label>
            @error('description')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>
@endsection
