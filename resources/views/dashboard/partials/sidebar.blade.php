<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="btn btn-light">
                <a class="nav-link text-dark w-100 h-100 active" href="{{ url('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="btn btn-light">
                <a class="nav-link text-dark w-100 h-100" href="{{ url('dashboard/product') }}">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="btn btn-light">
                <a class="nav-link text-dark w-100 h-100" href="{{ url('dashboard/staff') }}">
                    <span data-feather="users"></span>
                    Staff
                </a>
            </li>
            <li class="btn btn-light">
                <a class="nav-link text-dark w-100 h-100" href="{{ url('dashboard/customer') }}">
                    <span data-feather="user-plus"></span>
                    Cusomer
                </a>
            </li>
        </ul>
    </div>
</nav>
