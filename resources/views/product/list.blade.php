@extends('layout')
@section('title', 'Productos')
@section('header', 'Productos')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2 text-end">
        <a href="{{route('product.form')}}" class="btn btn-primary">Nuevo producto</a>
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
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->cost}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->brand->name}}</td>
            <td class="text-end">
                <a href="{{ route('product.form',  ['id' => $product->id]) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('product.delete', ['id'=>$product->id]) }}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection