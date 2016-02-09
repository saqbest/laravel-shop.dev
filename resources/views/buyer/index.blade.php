@extends('layouts.buyer')

@section('title', 'Buyer')


@section('content')
    <a href="/cart"> <span class="flaticon-shopping122 card"><span class="total">0</span></span> </a>
    <form id="add_form" class="form-horizontal" action="" method="post"
          enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! Form::select('currency', $currencies, $currency,['class' => 'currency']) !!}
    </form>
    <div class="cont">
        <p>Product List</p>
        <ul class="products">

            @foreach ($products as $product)
                <li>

                    <img src="/uploads/300x300/{{$product->image}}">
                    <h4>{{ $product->name }}</h4>
                    <p>@currency($product->price , $currency)</p>
                    <span> Quantity :{{$product->quantity}}</span>
                    <a class="btn btn-primary btn-xs add" href="#" data-key="{{$product->id}}">Add to card</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
