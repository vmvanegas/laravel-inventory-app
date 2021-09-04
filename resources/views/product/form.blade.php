@extends('layout')
@section('title', $product->id? 'Update product' : 'New product')
@section('header', $product->id? 'Update product' : 'New product')
@section('content')

<form action="{{ route('product.save') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ @old('name')?  @old('name'): $product->name}}">
            @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="cost" class="col-sm-2 col-form-label">Cost</label>
            <input type="text" class="form-control" name="cost" value="{{ @old('cost')?  @old('cost'): $product->cost }}">
            @error('cost')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{ @old('price')?  @old('price'): $product->price }}">
            @error('price')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="{{ @old('quantity')?  @old('quantity'): $product->quantity }}">
            @error('quantity')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="brand" class="col-sm-2 col-form-label">Brand</label>
            <select class="form-select" name="brand" aria-label="Default select example">
                <option value="{{null}}" hidden>Select...</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}" {{ $product->brand_id == $brand->id? "selected" : "" }}>{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        @error('brand')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <select class="form-select" name="category" aria-label="Default select example">
                <option value="{{null}}" hidden>Select...</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $product->category_id == $category->id? "selected" : "" }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @error('category')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="row mb-3">
        <div class="d-flex justify-content-end">
            <a href="/products" class="btn btn-secondary m-2">Cancel</a>
            <button type="submit" class="btn btn-primary m-2">Save</button>
        </div>
    </div>
</form>

@endsection