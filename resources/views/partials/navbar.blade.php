<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img class="mr-2" style="width: 50px;" src="{{ asset('img/icons/fish.png') }}"/>
        Aquario
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-item text-dark mx-1 mx-lg-3 btn-link" href="{{ url('/category', [$category->category_id]) }}">
                        {{ Str::ucfirst(Str::plural($category->category_name)) }}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="d-flex flex-column flex-md-row ">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <ul class="navbar-nav nav-flex-icons ">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link" style="color:#515151;">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item d-md-flex d-none">
                        <span class="vl-s my-auto"></span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link"
                            style="color:#515151;">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color:#515151;">{{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item d-md-flex d-none">
                        <span class="vl-s my-auto"></span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" style="color:#515151;" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>
