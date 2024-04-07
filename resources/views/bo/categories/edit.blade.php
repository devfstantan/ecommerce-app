@extends('bo.layout.main')
@section('title','Editer Store')

@section('content')
<form action="{{ route('bo.categories.update',$category) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input type="text" value="{{$category->name}}" id="name" name="name" placeholder="" class="form-control">
        <label for="name">Nom de la catégorie</label>
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <textarea id="description" name="description" placeholder="" class="form-control"  rows="10">{{$category->description}}</textarea>
        <label for="description">Description</label>
        @error('description')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <input type="submit" value="Sauvegarder" class="btn btn-primary">
</form>
@endsection