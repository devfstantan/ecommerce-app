@extends('bo.layout.main')
@section('title', 'Nouveau Store')

@section('content')
    <form action="{{ route('bo.stores.store') }}" method="post">
        @csrf

        {{-- NAME --}}
        <div class="form-floating mb-3">
            <input type="text" value="{{ old('name') }}" id="name" name="name" placeholder="" class="form-control">
            <label for="name">Nom du store</label>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- PHONE --}}
        <div class="form-floating mb-3">
            <input type="tel" value="{{ old('phone') }}" id="phone" name="phone" placeholder=""
                class="form-control">
            <label for="phone">N° Téléphone</label>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- ADDRESS --}}
        <div class="form-floating mb-3">
            <input type="text" value="{{ old('address') }}" id="address" name="address" placeholder=""
                class="form-control">
            <label for="address">Adresse Postale</label>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <fieldset>
            <legend>Coordonnées Manager</legend>
            {{-- MANAGER NAME --}}
            <div class="form-floating mb-3">
                <input type="text" value="{{ old('manager_name') }}" id="manager_name" name="manager_name" placeholder=""
                    class="form-control">
                <label for="manager_name">Nom Complet</label>
                @error('manager_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- MANAGER NAME --}}
            <div class="form-floating mb-3">
                <input type="email" value="{{ old('manager_email') }}" id="manager_email" name="manager_email"
                    placeholder="" class="form-control">
                <label for="manager_email">Adresse Mail</label>
                @error('manager_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row row-cols-2">
                {{-- MANAGER PASSWORD --}}
                <div class="form-floating mb-3 col">
                    <input type="password" value="" id="manager_password"
                        name="manager_password" placeholder="" class="form-control">
                    <label for="manager_password">Mot de passe</label>
                    @error('manager_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3 col">
                    <input type="password" value="" id="manager_password_confirmation"
                        name="manager_password_confirmation" placeholder="" class="form-control">
                    <label for="manager_password_confirmation">Confirmer le mot de passe</label>
                    @error('manager_password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </fieldset>

        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>
@endsection
