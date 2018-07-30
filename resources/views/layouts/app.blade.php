<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{mix('css/less/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/blog-post.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/metisMenu.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/style.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="padding:0;">

@include('layouts.sidebar')

@yield('sidebar')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        @yield('content')

        <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/jq.js') }}"></script>
<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('js/libs/bootstrap.js')}}"></script>
<script src="{{asset('js/libs/jquery.js')}}"></script>
<script src="{{asset('js/libs/metisMenu.js')}}"></script>
<script src="{{asset('js/libs/scripts.js')}}"></script>

@yield('scripts')
</body>
</html>
