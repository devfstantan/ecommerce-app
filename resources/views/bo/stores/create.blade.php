@extends('bo.layout.main')
@section('title', 'Nouveau Store')

@section('content')
    <form action="{{ route('bo.stores.store') }}" method="post">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" value="{{old('name')}}" id="name" name="name" placeholder="" class="form-control">
            <label for="name">Nom du store</label>
            @error('name')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="tel" value="{{old('phone')}}" id="phone" name="phone" placeholder="" class="form-control">
            <label for="phone">N° Téléphone</label>
            @error('phone')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" value="{{old('address')}}" id="address" name="address" placeholder="" class="form-control">
            <label for="address">Adresse Postale</label>
            @error('address')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>
@endsection
