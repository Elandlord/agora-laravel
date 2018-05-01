<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/cms.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>MEN</b>Technology & Media</a>
  </div>
  <!-- /.login-logo -->
    @yield('content')
    <!-- /.social-auth-links -->


  <!-- /.login-box-body -->
</div>
<script type="text/javascript" src="/js/vue.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
