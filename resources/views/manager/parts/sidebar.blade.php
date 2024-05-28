<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{route('manager.index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Tableau de board
            </a>
            <a class="nav-link collapsed" href="{{route('manager.products.index')}}" data-bs-toggle="collapse" data-bs-target="#collapseProducts"
                aria-expanded="false" aria-controls="collapseProducts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Produits
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('manager.products.index')}}">Liste Produits</a>
                    <a class="nav-link" href="{{route('manager.products.create')}}">Nouveau Produit</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="{{route('manager.store.show')}}" >
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Mon Store
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Connecté en tant que:</div>
        {{ Auth::user()->name }} <br>
        Store: {{Auth::user()->store->name}}
    </div>
</nav>
