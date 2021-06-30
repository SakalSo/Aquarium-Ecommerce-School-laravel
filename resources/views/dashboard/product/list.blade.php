@extends('layout.dashboard')

@php
$idSort = app('request')->input('product_id-sort');
$nameSort = app('request')->input('name-sort');
$categorySort = app('request')->input('category-sort');
$createdAtSort = app('request')->input('created_at-sort');
$updatedAtSort = app('request')->input('updated_at-sort');
@endphp

{{-- Page Title --}}
@section('page_title', 'Products List')

@section('dashboard_content')
    @include('partials.flash-message')

    {{-- Table --}}
    <table class="table shadow-lg bg-white">
        <thead class="thead-dark thead-btn">
            <tr>
                <form action="{{ action('Dashboard\DashboardController@product') }}" method="GET" id="product_id-sort-form">
                    @csrf
                    <th onclick="$('#product_id-sort-form').submit()">
                        ID
                        @if ($idSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="product_id-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="product_id-sort" value="desc">
                        @endif
                </form>
                <form action="{{ action('Dashboard\DashboardController@product') }}" method="GET" id="product_name-sort-form">
                    @csrf
                    <th onclick="$('#product_name-sort-form').submit()">
                        Name
                        @if ($nameSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="product_name-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="product_name-sort" value="desc">
                        @endif
                </form>
                <form action="{{ action('Dashboard\DashboardController@product') }}" method="GET" id="category_id-sort-form">
                    @csrf
                    <th onclick="$('#category_id-sort-form').submit()">
                        Category
                        @if ($categorySort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="category_id-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="category_id-sort" value="desc">
                        @endif
                </form>
                <form action="{{ action('Dashboard\DashboardController@product') }}" method="GET" id="created_at-sort-form">
                    @csrf
                    <th onclick="$('#created_at-sort-form').submit()">
                        Date Created
                        @if ($createdAtSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="created_at-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="created_at-sort" value="desc">
                        @endif
                </form>
                <form action="{{ action('Dashboard\DashboardController@product') }}" method="GET" id="updated_at-sort-form">
                    @csrf
                    <th onclick="$('#updated_at-sort-form').submit()">
                        Date Updated
                        @if ($updatedAtSort === 'desc')
                            <i class="fas fa-caret-up ml-2"></i>
                            <input type="hidden" name="updated_at-sort" value="asc">
                        @else
                            <i class="fas fa-caret-down ml-2"></i>
                            <input type="hidden" name="updated_at-sort" value="desc">
                        @endif
                    </th>
                    <th>Option</th>
                </form>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td class="d-flex">
                        <a class="text-dark mr-1"
                            href="{{ url('dashboard/product/edit', ['id' => $product->product_id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ action('ProductController@destroy', ['id' => $product->product_id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class=" btn btn-link p-0 text-dark ml-3"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
    <hr class="w-75 mx-auto">
    {{-- Add a product --}}
    <div class="container-fluid">
        <div class="d-flex  justify-content-center">
            <div class="d-inline-block text-center bg-white shadow-lg rounded-lg mx-auto p-2">
                <p class="text-gray d-inline-block">Add a product</p>
                <a class="d-block text-gray mb-1" href="{{ url('dashboard/product/add') }}" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="fas fa-plus-circle " style="font-size: 40px"></i>
                </a>
            </div>
        </div>
    </div>


@endsection
