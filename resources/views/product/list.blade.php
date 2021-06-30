@extends('layout.app')

@section('title', 'Products')

@section('stylesheet')
    @parent
    <link rel="stylesheet" href="{{ asset('css/product-list.css') }}">
@endsection

@section('content')
    <div id="wrapper">

        {{-- filter toggler --}}
        <a id="menu-toggle" class="menu-toggler float-left" aria-label="Main Menu">
            <svg width="50" height="50" viewBox="0 0 100 100">
                <path class="line line1"
                    d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                <path class="line line2" d="M 20,50 H 80" />
                <path class="line line3"
                    d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
            </svg>
        </a>

        {{-- filter sidebar --}}
        @include('product.partials.filter-sidebar')
        <div class="py-4">
            <div class="d-block pb-4">
                <div class="d-block text-center">
                    <h2 class="d-inline border-bottom pb-1">Our Collection Of Products</h2>
                </div>
            </div>
            <div class='container row mx-auto'>
                @foreach ($products as $product)
                    <div class="product-card col-12 col-sm-6 col-md-4 col-lg-3 py-3">
                        <div class="product-card-wrapper mx-auto h-100">
                            <a href="{{ url('product', ['id' => $product->product_id]) }}">
                                <div class="card h-100">
                                    <img class="mt-4 mx-auto img-thumbnail" src="{{ asset($product->image) }}"
                                        width="auto" height="auto" />
                                    <div class="card-body text-center mx-auto text-dark">
                                        <h6 class="card-title">{{ $product->product_name }}</h6>
                                        <h4 class="card-text">${{ $product->price }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- END :: PRODUCT LIST -->
        <div class="py-2 pl-5">
            {{ $products->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#menu-toggle").click(function(e) {
            this.classList.toggle('opened');
            this.setAttribute('aria-expanded', this.classList.contains('opened'));
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
@endsection
