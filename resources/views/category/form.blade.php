@extends('layout')
@section('title', $category->id? 'Update category' : 'New category')
@section('header', $category->id? 'Update category' : 'New category')
@section('content')

<div class="row mx-0">
    <div class="col-md-6">
        <form action="{{ route('category.save') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ @old('name')?  @old('name'): $category->name}}">
                    @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ @old('description')?  @old('description'): $category->description}}">
                    @error('description')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="d-flex justify-content-end">
                        <a href="/categories" class="btn btn-secondary m-2">Cancel</a>
                        <button type="submit" class="btn btn-primary m-2">Save</button>
                    </div>
                </div>
        </form>
    </div>
</div>

@endsection