@extends('layout.dashboard')

@section('dashboard_stylesheet')
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <style>
        input:focus,
        input:active,
        select:focus,
        select:active {
            outline: none !important;
        }

    </style>
@endsection

{{-- Page Title --}}
@section('page_title', 'Edit Product')

@section('dashboard_content')
    <div class="container mx-auto bg-white p-3">
        <form class="row" action="{{ action('ProductController@update', ['id' => $product->product_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-12 col-md-6">
                <h1 class="text-center">Product Image</h1>
                <div class="col-sm-12 col-md-10 col-lg-6 mr-auto ml-auto border p-4">
                    <div class="form-group">
                        <label><strong>Upload Images</strong></label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input form-control" id="imageUpload">
                            <label class="custom-file-label" for="imageUpload">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-block btn-dark" for="imageUpload" id="imageUploadLabelBtn" >Upload</label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Product Name *</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Product name" required value="{{$product->product_name}}"
                            aria-required="true">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sku">Product SKU</label>
                        <input id="sku" name="sku" type="text" class="form-control" placeholder="Product sku" value="{{$product->sku}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">State</label>
                    <select id="category" name="category" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}" {{ $category->category_id === $product->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cost">Cost</label>
                        <input id="cost" name="cost" type="number" class="form-control" value="{{ $product->cost }}" step="0.01" min="0" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input id="price" name="price" type="number" class="form-control" value="{{ $product->price }}" step="0.01" min="0" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark float-right">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('dashboard_script')
    <script>
        $('#imageUpload').on('change', function(event) {
            $(this).prop('readonly', true);
        });
    </script>
@endsection
