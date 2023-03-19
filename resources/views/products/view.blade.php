@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Product</h1>

                <!-- Display validation errors if any -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Please fix the following errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($product->category_id)
                    <h5>Category: {{ $product->category->name }}</h5>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <br><br><br>
                        <div class="form-group">
                            <h4>{{ $product->name }}</h4>
                        </div>

                        <div class="form-group">
                            <h4>code: {{ $product->barcode }}</h4>
                        </div>

                        <div class="form-group">
                            <h4>Description : {{ $product->short_description }}</h4>
                        </div>
                        <div class="form-group">
                            <p>{{ $product->long_description }}</p>
                        </div>
                        <div class="form-group">
                            <h4>{{ $product->price }} $ </h4>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Add to Cart</button>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="form-group">
                            <br>
                            @if ($product->image)
                                <img src="{{ asset('/' . $product->image) }}" alt="" style="width: 100%">
                            @endif
                        </div>

                    </div>

                </div>


            </div>



        </div>
    </div>
@endsection
