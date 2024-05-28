@extends('manager.layout.main')
@section('title','Editer Store')

@section('content')
<form action="{{ route('manager.store.update',$store) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-floating mb-3">
        <input type="text" value="{{$store->name}}" id="name" name="name" placeholder="" class="form-control">
        <label for="name">Nom du store</label>
        @error('name')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="tel" value="{{$store->phone}}" id="phone" name="phone" placeholder="" class="form-control">
        <label for="phone">N° Téléphone</label>
        @error('phone')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="text" value="{{$store->address}}" id="address" name="address" placeholder="" class="form-control">
        <label for="address">Adresse Postale</label>
        @error('address')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <input type="submit" value="Sauvegarder" class="btn btn-primary">
</form>
@endsection