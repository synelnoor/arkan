<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Saung Cisadane Kuliner</title>
	<link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}" />
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700,300italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/animat/animate.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/fancybox/jquery.fancybox.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/nivo-lightbox/nivo-lightbox.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/themes/default/default.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.theme.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.transitions.css')}}">
	
	<link rel="stylesheet" href="{{ asset('css/style.css')}}" />
	<link rel="stylesheet" href="{{ asset('css/responsive.css')}}" />
</head>
<body>


	<div class='preloader'><div class='loaded'>&nbsp;</div></div>

	@include('component.header')
	
	@include('component.banner')
	
	@include('component.feature')
	
	@include('component.special')

	@include('component.about')

	@include('component.menu')

	@include('component.footer')
	

	<!-- STRAT SCROLL TO TOP -->
	
	<div class="scrollup">
		<a href="#"><i class="fa fa-chevron-up"></i></a>
	</div>
	
	
	
	
	

	<script type="text/javascript" src="{{ asset('js/jquery/jquery.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('js/fancybox/jquery.fancybox.pack.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('js/nivo-lightbox/nivo-lightbox.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
	
	
	
	<script type="text/javascript" src="{{ asset('js/jquery-easing/jquery.easing.1.3.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/wow/wow.min.js') }}"></script>
</body>
</html>