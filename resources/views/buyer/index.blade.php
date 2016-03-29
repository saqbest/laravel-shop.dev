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
                <li style="float: right">
                    <a href="/cart"><span>Shoping items:<span class="total"> {{count($shopping_cart)}}</span></span>  </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="page_content">
        <div id="page_content_inner">
            <div class="md-card">
                <div class="md-card-content">
                    <form method="post" class="uk-form-stacked">
                        {!! csrf_field() !!}
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-3-10">
                                <label for="product_search_name">Product Name</label>
                                <input type="text" class="md-input" name="product_name" value="{{$product_name}}"
                                       id="product_search_name">
                            </div>
                            <div class="uk-width-medium-4-10">
                                <input type="text" id="ionslider_2" name="price_range" data-ion-slider data-min="0"
                                       data-max="100000" data-from="{{ $price_from }}" data-to="{{$price_to}}"
                                       data-type="double" data-grid="true" data-prefix="$"/>
                                <span class="uk-form-help-block">Double</span>
                            </div>
                            <div class="uk-width-medium-2-10">
                                <div class="uk-margin-small-top">
                                    <select name="type" id="product_search_status" data-md-selectize
                                            data-md-selectize-bottom>
                                        <option selected="selected" value=""></option>
                                        <option value="type1" {{ ($type=="type1")? 'selected="selected"' : '' }}>Type
                                            1
                                        </option>
                                        <option value="type2" {{ ($type=="type2")? 'selected="selected"' : '' }}>Type
                                            2
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-10 uk-text-center">
                                <button type="submit" href="#" class="md-btn md-btn-primary uk-margin-small-top">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h3 class="heading_a uk-margin-bottom">Products:</h3>

            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4"
                 data-uk-grid="{gutter: 20, controls: '#products_sort'}"
                 style="position: relative; margin-left: -20px; height: 2254px;">
                @foreach ($products as $product)

                    <div data-product-name="{{$product->name}}" data-grid-prepared="true"
                         style="position: absolute; box-sizing: border-box; padding-left: 20px; padding-bottom: 20px; top: 1895px; left: 990.75px; opacity: 1;">
                        <div class="md-card md-card-hover-img">
                            <div class="md-card-head uk-text-center uk-position-relative">
                                <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">@currency($product->price , $currency)</div>
                                <img class="md-card-head-img" src="/uploads/300x300/{{$product->image}}" alt="">
                            </div>
                            <div class="md-card-content">
                                <h4 class="heading_c uk-margin-bottom">
                                    {{ $product->name }}
                                    <span class="sub-heading">Quantity :{{$product->quantity}}
                                        Type :{{$product->type}}</span>
                                </h4>
                                <p>{{$product->short_description}}</p>
                                <a class="md-btn md-btn-small" href="/product/{{$product->id}}">More</a>
                                <a class="md-btn md-btn-primary add" href="#" data-key="{{$product->id}}">Add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div>
        <div class="col-md-4 col-md-offset-4">
            {!!$products->appends(['product_name' =>$product_name,'price_range'=>$price_range,'type'=>$type])->render()!!}
        </div>
    </div>
    <!-- google web fonts -->
    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js" type="text/javascript" async=""></script>
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function () {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
@endsection
