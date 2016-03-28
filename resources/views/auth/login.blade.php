@extends('layouts.login')

@section('title', 'Login')

@section('content')
    <script>
        var key = "{{ $key }}";
    </script>
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}

                    <div class="uk-form-row">
                        <label for="login_username">Username or email</label>
                        <input class="md-input" type="text" id="login_username" name="email"
                               value="{{ old('email') }}"/>
                        <span style="color: red" class="parsley-type log-form">{{$errors->first('email')}}</span>

                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" type="password" id="password" name="password"/>
                        <span style="color: red" class="parsley-type log-form">{{$errors->first('password')}}</span>

                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                    </div>
                    <div class="uk-margin-top">
                        <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                        <span class="icheck-inline">
                            <input type="checkbox" name="remember" id="login_page_stay_signed" data-md-icheck/>
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button"
                        class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps
                    Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your
                        password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button"
                        class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset"/>
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding" id="register_form" style="display: none">
                <button type="button"
                        class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <form method="POST" action="/auth/register" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="uk-form-row">
                        <label for="register_username">Username</label>
                        <input class="md-input" type="text" id="register_username" name="name"
                               value="{{ old('name') }}"/>
                        <span style="color: red" class="parsley-type reg-form">{{$errors->first('name')}}</span>
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password">Password</label>
                        <input class="md-input" type="password" id="register_password" name="password"/>
                        <span style="color: red" class="parsley-type reg-form">{{$errors->first('password')}}</span>

                    </div>
                    <div class="uk-form-row">
                        <label for="register_password_repeat">Repeat Password</label>
                        <input class="md-input" type="password" id="register_password_repeat"
                               name="password_confirmation"/>
                        <span style="color: red"
                              class="parsley-type reg-form">{{$errors->first('password_confirmation')}}</span>

                    </div>
                    <div class="uk-form-row">
                        <label for="register_email">E-mail</label>
                        <input class="md-input" type="text" id="register_email" name="email"
                               value="{{ old('email') }}"/>
                        <span style="color: red" class="parsley-type reg-form">{{$errors->first('email')}}</span>

                    </div>
                    <div class="uk-form-row">
                    <span class="icheck-inline">
                                        <input type="radio" name="role" value="1" id="radio_demo_inline_1" checked
                                               data-md-icheck/>
                                        <label for="radio_demo_inline_1" class="inline-label">Buyer</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <input type="radio" name="role" value="2" id="radio_demo_inline_2"
                                               data-md-icheck/>
                                        <label for="radio_demo_inline_2" class="inline-label">Seller</label>
                                    </span>
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</button>
                    </div>
                </form>
            </div>
    </div>
        <div class="uk-margin-top uk-text-center">
            <a href="#" class="signup_fix" id="signup_form_show">Create an account</a>
        </div>
    </div>

@endsection