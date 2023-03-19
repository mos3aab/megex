
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create New Product</h1>

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

            <!-- Display a form to create a new product -->
            <!-- Use old input values if validation fails -->
            <!-- Use csrf token for security -->
            <!-- Use route helper to generate action url -->
            <!-- Start of form -->

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" id="barcode" class="form-control" value="{{ old('barcode') }}">
                    @error('barcode')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id"> Category </label>
                    <select name ="category_id" id ="category_id" class ="form-control">
                        @foreach ( $categories as $category )
                            <option value="{{$category->id}} {{ old('category_id') == $category->id ? 'selected' : '' }}">{{$category->name}} </option>
                        @endforeach
                    </select>
                    @error ( 'category_id' )
                        <span class ="text-danger">{{$message}} </span>
                    @enderror
                  </div>
                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <input type="text" name="short_description" id="short_description" class="form-control" value="{{ old('short_description') }}">
                    @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                        <label for="long_description">Long Description</label>
                      <textarea class="form-control" name="long_description" id="" rows="3"></textarea>
                      @error('long_description')
                        <span class= "text-danger">{{ $message }}</span>
                     @enderror

                 </div>
                 <div class= "form-group">
                     <label for= "price">Price</label>
                     <input type= "number" step= "0.01"name= "price"id= "price"class= "form-control"value= "{{ old('price') }}">
                     @error('price')
                         <span class= "text-danger">{{ $message }}</span>
                     @enderror
                 </div>
                 <div class= "form-group">
                     <label for= "quantity">Quantity</label>
                     <input type= "number"name= "quantity"id= "quantity"class= "form-control"value="{{ old('quantity') }}">
                     @error('quantity')
                         <span class =  text-danger>{{ $message }}</span>
                     @enderror
                 </div>
                 <div class="form-group">
                      <label for ="image"> Image </label>
                      <input type ="file" name="image" id="image" class="form-control" >
                      @error ('image')
                          <span class="text-danger"> {{$message}} </span >
                      @enderror </div>

                  <button type ="submit" class ="btn btn-primary"> Create Product </button>
                </div >
            </form>

    </div>
</div>
