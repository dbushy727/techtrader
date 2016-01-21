<!DOCTYPE html>
<html lang="en" ng-app="TechTrader">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TechTrader</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	{{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/all.css">
	<link rel="stylesheet" href="/css/dropzone.min.css">

	{{-- <script src="/js/jquery.min.js"></script> --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
	<script src="/js/dropzone.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper">

	    @include('templates.navigation.navigation')

		<!-- Page Content -->
	    <div id="page-wrapper">
	    	<div class="row">
	        	@yield('content')
	    	</div>
	    </div>
	    <!-- /#page-wrapper -->

	</div>

	<!-- Scripts -->
	{{-- <script src="/js/jquery.min.js"></script> --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	{{-- <script src="/js/bootstrap.min.js"></script> --}}
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> --}}
	<script src="/js/all.js"></script>
	<script>$('.tooltip-drop').tooltip();</script>
</body>
</html>
