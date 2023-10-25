<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SEMERUSMART</title>
    <!-- Bootstrap -->
    <link rel="icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/LOGOX.svg')}}">
    <link href="{{ asset('public/gen/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/gen/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/gen/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('public/gen/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('public/gen/build/css/custom.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .rcorners1 {
            border-radius: 10px;
        }
        .text-bold {
            font-weight: bold;
        }

        .solid {
            border-style: solid;
        }
    </style>
</head>

<body class="login"
    style="background-image:url({{ asset('public/img/bg1.jpg') }});background-repeat:no-repeat;background-position-x: center;background-attachment: fixed;  background-size: 1400px 800px;">
    @yield('container')
</body>


</html>
