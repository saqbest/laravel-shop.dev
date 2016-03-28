<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <title>@yield('title')</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/uikit.almost-flat.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/login_page.min.css') }}">

</head>
<body class="login_page">

<div class="container">
    @yield('content')
</div>

<script src={{ URL::asset('assets/js/common.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/altair-admin-common.min.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/login.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/script.js') }} type="text/javascript"></script>

</body>
</html>