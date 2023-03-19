
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Product</h1>

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


        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" class="form-control" id="barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class = "form-group">
                <label for = "category_id" > Category </label >
                <select class = "custom-select"id = "category_id" name="category_id" required> --}}
                @foreach($categories as $category)
                <option value ="{{ $category->id }}" {{ old( 'category_id' ,$product-> category_id ) ==$category-> id ? 'selected' : '' }} > {{ $category->name }}</option>
                @endforeach
                 </select>
                </div >
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control" id="short_description" name="short_description" value="{{ old('short_description', $product->short_description) }}">
            </div>
            <div class="form-group">
                <label for="long_description">Long Description</label>
                <textarea class="form-control" id="long_description" name="long_description">{{ old('long_description', $product->long_description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step=".01" class= "form-control"id= "price"name= "price"value= "{{ old('price', $product->price) }}"required >
            </div >
            <div class= "form-group">
                <label for= "quantity">Quantity</label >
                <input type= "number"class= "form-control"id= "quantity"name= "quantity"value= "{{ old('quantity', $product->quantity) }}"required >
            </div >
            <div class= "form-group">
                <br>

                @if($product->image)
                <img src="{{ asset('/' . $product->image)}}" alt="" style="width: 30%">
                @endif
                 <br>
                <label for= "image">Image </label >
                    <input type = "file"class = "form-control"id = "image"name = "image" accept = ".jpg,.jpeg,.png,.gif"/>
            </div >

                <button type ="submit" class ="btn btn-primary "> Save changes</button>
            </div >

            </form >
        @endsection
    </div>
</div>
