@extends('layout')
@section('title', 'Invoices')
@section('header', 'Invoices')
@section('content')
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2 text-end">
        <a href="{{route('product.form')}}" class="btn btn-primary">New Invoice</a>
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
            <th>Date</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->created_at}}</td>
            <td>${{number_format($invoice->subtotal, 0, ",", ".")}}</td>
            <td>${{number_format($invoice->total, 0, ",", ".")}}</td>
            <td class="text-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$invoice->id}}">Detalle</button>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
            <div class="modal fade" id="modal{{$invoice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Invoice #{{$invoice->id}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <b>Product</b>
                                </div>
                                <div class="col-sm-3">
                                    <b>Quantity</b>
                                </div>
                                <div class="col-sm-3">
                                    <b>Price</b>
                                </div>
                                <div class="col-sm-3">
                                    <b>Total</b>
                                </div>
                            </div>
                            @foreach($invoice->products as $product)
                            <div class="row">
                                <div class="col-sm-3">
                                    {{$product->name}}
                                </div>
                                <div class="col-sm-3">
                                    {{$product->pivot->quantity}}
                                </div>
                                <div class="col-sm-3">
                                    ${{number_format($product->pivot->price, 0, ",", ".")}}
                                </div>
                                <div class="col-sm-3">
                                    ${{number_format($product->pivot->price * $product->pivot->quantity, 0, ",", ".")}}
                                </div>
                            </div>
                            @endforeach
                            <div class="row mt-3">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-3">
                                    Subtotal:
                                </div>
                                <div class="col-sm-3">
                                    ${{number_format($invoice->subtotal, 0, ",", ".")}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-3">
                                    IVA:
                                </div>
                                <div class="col-sm-3">
                                    ${{number_format($invoice->total - $invoice->subtotal, 0, ",", ".")}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">

                                </div>
                                <div class="col-sm-3">
                                    Total:
                                </div>
                                <div class="col-sm-3">
                                    ${{number_format($invoice->total, 0, ",", ".")}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection