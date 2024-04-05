<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{route('bo.index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Tableau de board
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts"
                aria-expanded="false" aria-controls="collapseProducts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Produits
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="layout-static.html">Liste Produits</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Nouveau Produit</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" >
                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                Catégories
            </a>
            <a class="nav-link collapsed" href="#" >
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Stores
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Connecté en tant que:</div>
        {{ Auth::user()->name }}
    </div>
</nav>
