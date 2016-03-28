@extends('layouts.buyer')

@section('title', 'Buyer')


@section('content')
    <div id="top_bar">
        <div class="md-top-bar">
            <ul id="menu_top" class="uk-clearfix">
                <li><a href="/"><i class="material-icons md-24"></i></a></li>
                <li>Currency
                    <form id="add_form" class="form-horizontal" action="" method="post"
                          enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! Form::select('currency', $currencies, $currency,['class' => 'currency']) !!}
                    </form>
                </li>

                <li data-uk-dropdown="" style="float: right" aria-haspopup="true" aria-expanded="false" class="">
                    <a href="{{ url('auth/logout') }}">Logout</a>
                </li>

            </ul>
        </div>
    </div>

    @if(count($products)>0)
        <form action="/buy" method="post">
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Seller</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            {!! csrf_field() !!}
            {{--name="products[{{ $key }}][item]"--}}
            @foreach($products as $key => $product)
                <tr class="buy" data-key="{{$product->id}}" data-info="{{ $product->product->id}}">
                    <td><input type="checkbox" value="{{$product->product->id}}"></td>
                    <td>{{ $product->seller()}}</td>
                    <td>{{ $product->product->name}}</td>
                    <td> @currency( $product->product->price, $product->currency)</td>
                    <td><input class="quantity" type="number" value="{{ $product->quantity}}">&nbsp;&nbsp; <span
                                data-info="{{ $product->product->id}}" class="flaticon-refresh57 refresh"></span> <span
                                class="flaticon-delete96 delete" data-key="{{$product->id}}"></span></td>
                </tr>
            @endforeach

            </tbody>
        </table>
            <span class=""><button type="submit" class="btn btn-primary btn-sm">Buy now</button></span>
        </form>
    @else
        <p>Shopping cart is empty</p>
    @endif

@endsection
