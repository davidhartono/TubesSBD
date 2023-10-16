<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Database</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/admin/users') }}">Users</a>
                        <a class="nav-link" href="{{ url('/admin/recipes') }}">Recipes</a>
                        <a class="nav-link" href="{{ url('/admin/tips') }}">Tips</a>
                        <a class="nav-link" href="{{ url('/admin/ingredients') }}">Ingredients</a>
                        {{-- <a class="nav-link" href="{{ url('/admin/challenges') }}">Challenges</a> --}}
                        <a class="nav-link" href="{{ url('/admin/comments') }}">Comments</a>
                        <a class="nav-link" href="{{ url('/admin/activity') }}">Activity</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>
