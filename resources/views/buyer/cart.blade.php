@extends('layouts.buyer')

@section('title', 'Buyer')


@section('content')
    @if(count($products)>0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Seller</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            {!! csrf_field() !!}

            @foreach($products as $product)
                <tr class="buy" data-key="{{$product->id}}" data-info="{{ $product->product->id}}">

                    <td>{{ $product->seller()}}</td>
                    <td>{{ $product->product->name}}</td>
                    <td> @currency( $product->product->price, $product->currency)</td>
                    <td><input type="number" name="quantity" value="{{ $product->quantity}}">&nbsp;&nbsp; <span
                                data-info="{{ $product->product->id}}" class="flaticon-refresh57 refresh"></span> <span
                                class="flaticon-delete96 delete" data-key="{{$product->id}}"></span></td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <span class="buy_now"><button type="button" class="btn btn-primary btn-sm">Buy now</button></span>

    @else
        <p>Shopping cart is empty</p>
    @endif

@endsection
