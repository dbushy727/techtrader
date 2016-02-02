<!DOCTYPE html>
<html lang="en" ng-app="TechTrader">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TechTrader</title>

	{{-- JS --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	{{-- CSS --}}
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/3.8.4/css/dropzone.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/all.css">
</head>
<body>
	<div id="wrapper">

	    @include('templates.navigation.navigation')

		<!-- Page Content -->
	    <div id="page-wrapper">
	    	<div class="row">
	    	<div class="top-pad"></div>
	        	@yield('content')
	    	</div>
	    </div>
	    <!-- /#page-wrapper -->

	</div>

	{{-- JS --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/js/all.js"></script>
	<script>$('.tooltip-drop').tooltip();</script>
</body>
</html>
