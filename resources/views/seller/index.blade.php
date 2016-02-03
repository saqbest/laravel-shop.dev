@extends('layouts.master')

@section('title', 'Seller')


@section('content')
    <form id="add_form" class="form-horizontal" action="" method="post"
          enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! Form::select('currency', $currencies, $currency,['class' => 'currency']) !!}
    </form>

    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#sectionA">Product list</a></li>
            <li><a data-toggle="tab" href="#sectionB">Add product</a></li>

        </ul>
        <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
                <div class="cont">
                    <p>Product List</p>
                    <ul class="products">

                        @foreach ($products as $product)
                            <li>
                                <a href="#">
                                    <img src="/uploads/{{$product->image}}">
                                    <h4>{{ $product->name }}</h4>
                                    <p>@currency($product->price , $currency)</p>
                                    <span> Quantity :{{$product->quantity}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div id="sectionB" class="tab-pane fade">
                <div class="cont">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="add_form" class="form-horizontal" action="" method="post"
                          enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <fieldset>

                            <!-- Form Name -->


                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="product_name">Product name</label>

                                <div class="col-md-4">
                                    <input id="product_name" name="product_name" type="text" placeholder="Product name"
                                           class="form-control input-md">
                                    <label id="product_name-error" class="error" for="product_name"
                                           style="display: inline-block;"></label>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="price">Price</label>

                                <div class="col-md-4">
                                    <input id="price" name="price" type="text" placeholder="Price"
                                           class="form-control input-md">
                                    <label id="price-error" class="error" for="price"
                                           style="display: inline-block;"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="quantity">Quantity</label>

                                <div class="col-md-4">
                                    <input id="quantity" name="quantity" type="text" placeholder="Quantity"
                                           class="form-control input-md">
                                    <label id="quantity-error" class="error" for="quantity"
                                           style="display: inline-block;"></label>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description</label>

                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="resume">Photo attach</label>

                                <div class="col-md-4">
                                    <input id="photo" name="photo" class="input-file" type="file">
                                </div>

                            </div>


                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="submit"></label>

                                <div class="col-md-4">

                                    <button id="submit" name="submit" class="btn btn-primary">Upload and save</button>
                                </div>

                            </div>

                        </fieldset>
                    </form>
                    <div id="message"></div>

                </div>

            </div>
        </div>
    </div>

@endsection
