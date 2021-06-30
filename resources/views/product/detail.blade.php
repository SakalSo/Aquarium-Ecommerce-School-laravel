@extends('layout.app')

@section('title', 'Product Name')

@section('stylesheet')
    @parent
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
@endsection

@section('content')
    <div class="container">
        <div class="detail-container rounded my-5 row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="rounded-left col-md-6 product bg-white py-5 d-flex flex-column ">
                        <img class="mb-3"
                            src="{{asset($product->image)}}"
                            width=100% alt=""/>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore pariatur quisquam excepturi? Quis dignissimos amet sit minus sequi, quo repellat eveniet architecto deleniti harum odit vitae sed vero optio officiis.</p>
                        <button class="rounded-0 btn btn-warning">View Full Detail</button>
                    </div>
                    <div class="rounded-right col-md-6 detail bg-dange pb-5">
                        <div class="logo text-white text-center mt-5">
                            <img src="{{ asset('img/icons/fish.png') }}" alt="" width=200 class="text-white">
                        </div>
                        <h5 class="px-1 desc mt-5 text-white text-center">
                            {{ Str::title($product->product_name) }}
                        </h5>
                        {{-- <div class="py-5 px-4">
                            Inspirado nos calçados retrô, o Tênis Nike Md Runner 2 garante um visual esportivo clássico para
                            seu dia a dia. Possui tecnologia Phylon, espuma macia que proporciona um amortecimento leve.
                        </div> --}}
                        <div class="text-center mb-5">

                            <h2 class="text-white">${{ $product->price }}</h2>
                        </div>
                        <div class="text-center mb-5">
                            <button class=" text-center btn btn-warning">Add to cart</button>
                        </div>
                        <i class="fa fa-share-square-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
