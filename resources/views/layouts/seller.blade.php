<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/uikit.almost-flat.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.min.css') }}">

</head>
<body>

<div class="container">
    @yield('content')
</div>
<script src={{ URL::asset('/assets/js/jquery.js') }} type="text/javascript"></script>
<script src={{ URL::asset('/assets/js/jquery-ui.js') }} type="text/javascript"></script>
<script src={{ URL::asset('/assets/js/bootstrap.min.js') }} type="text/javascript"></script>
<script src={{ URL::asset('/assets/js/validation-rules.js') }} type="text/javascript"></script>
<script src={{ URL::asset('/assets/js/script.js') }} type="text/javascript"></script>
<script src={{ URL::asset('/assets/js/product-create.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/common.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/altair-admin-common.min.js') }} type="text/javascript"></script>
<script src={{ URL::asset('assets/js/uikit_custom.min.js') }} type="text/javascript"></script>

</body>
</html>