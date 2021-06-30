@extends('layout.app')

@section('title', 'Aquarium Ecommerce')

@section('stylesheet')
    @parent
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
@endsection

@include('partials.flash-message')

@section('content')
    <div id="carouselProductIndicators" class="container carousel slide mx-auto" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselProductIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselProductIndicators" data-slide-to="1"></li>
            <li data-target="#carouselProductIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/product-carousel/showcase-1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/product-carousel/showcase-2.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/product-carousel/showcase-3.jpg') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselProductIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselProductIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container py-5">
        <div class="d-block pb-4 text-center">
            <h3 class="d-inline border-bottom border-dark pb-1">Our Store Policies</h3>
        </div>
        <div class="card-deck">
            <div class="card-wrapper">
                <div class="card text-center">
                    <img class="card-img-top w-50 mx-auto pt-3" src="{{ asset('img/icons/refund.png') }}"
                        alt="Money Back">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Money Back Guruantee</h5>
                        <p class="card-text my-auto">We're guruanteed to refund any product that is damage or missing.</p>
                    </div>
                </div>
            </div>
            <div class="card-wrapper">
                <div class="card text-center">
                    <img class="card-img-top w-50 mx-auto pt-3" src="{{ asset('img/icons/headset.png') }}" alt="Support">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">24/7 Support</h5>
                        <p class="card-text my-auto">We offer excellent 24/7 always on support for any issues.</p>
                    </div>
                </div>
            </div>
            <div class="card-wrapper">
                <div class="card text-center">
                    <img class="card-img-top w-50 mx-auto pt-3" src="{{ asset('img/icons/quality.png') }}" alt="Quality">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Quality Product</h5>
                        <p class="card-text my-auto">Our Products are alway checked before reaching you to insure the best
                            quality.</p>
                    </div>
                </div>
            </div>
            <div class="card-wrapper">
                <div class="card text-center">
                    <img class="card-img-top w-50 mx-auto pt-3" src="{{ asset('img/icons/shipped.png') }}" alt="Delivery">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Free delivery</h5>
                        <p class="card-text my-auto">We offer free delivery for all of our products to any part of the
                            world.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-secondary py-4">
        <div class="d-block text-center">
            <h3 class="d-inline text-white border-bottom border-white pb-1">Our Latest Products</h3>
        </div>
    </div>

    <div class="container py-5 row mx-auto">
        @foreach ($products as $product)
            <div class="product-card col-12 col-sm-6 col-lg-3 px-3">
                <div class="product-card-wrapper h-100">
                    <a href="{{ url('product', ['id' => $product->product_id]) }}">
                        <div class="card h-100 px-3">
                            <img class="mt-4 mx-auto img-thumbnail " src="{{ asset($product->image) }}" width="auto"
                                height="auto" />
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

@endsection

@section('script')
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script>
        sliderInit();
    </script>
@endsection
