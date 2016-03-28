@extends('layouts.editproduct')

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

    <div id="page_content_inner">
        <form action="/product/update/{{$product[0]->id}}" method="post" class="uk-form-stacked" id="product_edit_form">
            {!! csrf_field() !!}

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery checked name="product_edit_active_control"
                                       id="product_edit_active_control"/>
                            </div>
                            <label class="uk-display-block uk-margin-small-top"
                                   for="product_edit_active_control">Active</label>
                        </div>
                    </div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons">&#xE146;</i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                Photos
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                <button type="button"
                                        class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                <img src="/uploads/300x300/{{$product[0]->image}}" alt="" class="img_medium"/>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Details
                            </h3>
                        </div>
                        <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                <div class="uk-width-large-1-2">
                                    <div class="uk-form-row">
                                        <label for="product_edit_name_control">Product Name</label>
                                        <input type="text" class="md-input" id="product_edit_name_control"
                                               name="product_name" value="{{$product[0]->name}}"/>
                                        <span style="color: red"
                                              class="parsley-type log-form">{{$errors->first('product_name')}}</span>

                                    </div>
                                    <div class="uk-form-row">
                                        <label for="product_edit_manufacturer_control">Product price</label>
                                        <input type="text" class="md-input" id="product_edit_manufacturer_control"
                                               name="price" value="{{$product[0]->price}}"/>
                                        <span style="color: red"
                                              class="parsley-type log-form">{{$errors->first('price')}}</span>

                                    </div>
                                    <div class="uk-form-row">
                                        <label for="product_edit_sn_control">Product quantity</label>
                                        <input type="text" class="md-input" id="product_edit_sn_control" name="quantity"
                                               value="{{$product[0]->quantity}}"/>
                                        <span style="color: red"
                                              class="parsley-type log-form">{{$errors->first('quantity')}}</span>

                                    </div>
                                    <div class="uk-form-row">
                                        <label for="product_edit_memory_control" class="uk-form-label">Type</label>
                                        <select id="product_edit_memory_control" name="type" data-md-selectize>
                                            <option value="type1"{{ ($product[0]->type=="type1")? 'selected="selected"' : '' }}>
                                                Type1
                                            </option>
                                            <option value="type2"{{ ($product[0]->type=="type2")? 'selected="selected"' : '' }}>
                                                Type2
                                            </option>
                                        </select>
                                        <span style="color: red"
                                              class="parsley-type log-form">{{$errors->first('type')}}</span>

                                    </div>

                                </div>
                                <div class="uk-width-large-1-2">

                                    <div class="uk-form-row">
                                        <label for="product_edit_description_control">Description</label>
                                        <textarea class="md-input" name="description"
                                                  id="product_edit_description_control" cols="30"
                                                  rows="4">{{$product[0]->description}}</textarea>
                                        <span style="color: red"
                                              class="parsley-type log-form">{{$errors->first('description')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <input type="submit" style="display: none" class="send_info_update">
        </form>

    </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="product_edit_submit">
            <i class="material-icons">&#xE161;</i>
        </a>
    </div>

    <!-- google web fonts -->
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