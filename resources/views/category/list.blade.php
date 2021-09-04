@extends('layout')
@section('title', 'Categories')
@section('header', 'Categories')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2 text-end">
        <a href="{{route('category.form')}}" class="btn btn-primary">New Category</a>
    </div>
</div>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show my-4" role="alert">
    <strong>{{Session::get('message')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td class="text-end" style="white-space: nowrap;">
                <a href="{{ route('category.form',  ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('category.delete', ['id'=>$category->id]) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection