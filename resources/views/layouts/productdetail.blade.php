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
    <meta name="msapplication-tap-highlight" content="no">

    <title>@yield('title')</title>

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
    <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
    <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
    <![endif]-->
    <link rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Source+Code+Pro:400,700%7CRoboto:400,300,500,700,400italic&amp;subset=latin,latin"
          media="all">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/uikit.almost-flat.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.min.css') }}">

</head>
<body>

<div class="container">
    @yield('content')

</div>
<script src={{ URL::asset('assets/js/common.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/altair-admin-common.min.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/uikit_custom.min.js') }} type="text/javascript"></script>
</body>
</html>