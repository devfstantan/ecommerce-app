@extends('auth.layout.main')

@section('title', 'Connexion')

@section('content')
    <div class="bg-light p-5" style="min-width: 50%">
        <h1>Connexion</h1>
        <form action="{{ route('auth.authenticate') }}" method="POST">
            @csrf

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="email">Adresse Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Mot de passe</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="yes" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                  Se sevenir de moi?
                </label>
              </div>

            <input type="submit" value="Connexion" class="btn btn-dark">
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </form>
    </div>
@endsection
