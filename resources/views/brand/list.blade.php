@extends('layout')
@section('title', 'Marca')
@section('header', 'Marca')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2 text-end">
        <a href="{{route('brand.form')}}" class="btn btn-primary">Nueva Marca</a>
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
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr>
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td class="text-end">
                <a href="{{ route('brand.form',  ['id' => $brand->id]) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('brand.delete', ['id'=>$brand->id]) }}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection