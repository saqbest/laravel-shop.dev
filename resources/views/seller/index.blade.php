@extends('layouts.seller')

@section('title', 'Seller')


@section('content')
    <div id="top_bar">
        <div class="md-top-bar">
            <ul id="menu_top" class="uk-clearfix">
                <li><a href="/"><i class="material-icons md-24"></i></a></li>
                <li data-uk-dropdown="" style="float: right" aria-haspopup="true" aria-expanded="false" class="">
                    <a href="{{ url('auth/logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>

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
                <div id="page_content">
                    <div id="page_content_inner">
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-1-1">
                                        <div class="uk-overflow-container">
                                            <table class="uk-table">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($products as $product)

                                                    <tr>
                                                        <td><img class="img_thumb"
                                                                 src="/uploads/300x300/{{$product->image}}" alt=""></td>
                                                        <td class="uk-text-large uk-text-nowrap"><a
                                                                    href="/product/{{$product->id}}">{{ $product->name }}</a>
                                                        </td>
                                                        <td class="uk-text-nowrap">@currency($product->price , $currency)</td>
                                                        <td>{{$product->quantity}}</td>
                                                        <td class="uk-text-nowrap"><span
                                                                    class="uk-badge uk-badge-muted">{{$product->type}}</span>
                                                        </td>
                                                        <td class="uk-text-nowrap">
                                                            <a href="/product/{{$product->id}}"><i
                                                                        class="material-icons md-24">&#xE8F4;</i></a>
                                                            <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                            {!! $products->render() !!}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
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
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="sel1">Select type:</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="type" id="sel1">
                                        <option value="type1">Type1</option>
                                        <option value="type2">Type2</option>
                                    </select>
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
