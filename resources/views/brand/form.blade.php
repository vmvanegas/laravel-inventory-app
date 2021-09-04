@extends('layout')
@section('title', $brand->id? 'Update brand' : 'New brand')
@section('header', $brand->id? 'Update brand' : 'New brand')
@section('content')

<div class="row mx-0">
    <div class="col-md-6">
        <form action="{{ route('brand.save') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$brand->id}}">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ @old('name')?  @old('name'): $brand->name}}">
                    @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="d-flex justify-content-end">
                        <a href="/brands" class="btn btn-secondary m-2">Cancel</a>
                        <button type="submit" class="btn btn-primary m-2">Save</button>
                    </div>
                </div>
        </form>
    </div>
</div>

@endsection