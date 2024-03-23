<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('front.index') }}">E-Commerce App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="{{ route('front.index') }}">Produits</a></li>

            </ul>
            <div class="d-flex gap-2">
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
                
                @auth
                    <a href="{{route('bo.index')}}" class="btn btn-secondary ml-2">Administration</a>
                @else
                    <a href="{{ route('auth.login') }}" class="btn btn-dark ml-2">Connexion</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
