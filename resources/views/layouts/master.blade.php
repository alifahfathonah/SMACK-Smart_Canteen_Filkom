<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    
    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ url('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ url('css/price-range.css')}}" rel="stylesheet">
    <link href="{{ url('css/animate.css')}}" rel="stylesheet">
	<link href="{{ url('css/main.css')}}" rel="stylesheet">
	<link href="{{ url('css/responsive.css')}}" rel="stylesheet">
	<!--<link rel="stylesheet" href="css/csseasyzoom.css">-->

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ url('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<body>
    
    @include('layouts.header')
    @yield('slide')
    @yield('content')
    @include('layouts.footer')

	<!-- javascript -->
	

        <script src="{{ url('js/jquery.js')}}"></script>
        <script src="{{ url('js/bootstrap.min.js')}}"></script>
        <script src="{{ url('js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{ url('js/jquery.prettyPhoto.js')}}"></script>

</body>
</html>
