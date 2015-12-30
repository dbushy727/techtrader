<!DOCTYPE html>
<html lang="en" ng-app="TechTrader">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TechTrader</title>

	{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> --}}
	{{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}

	<!-- Fonts -->
	{{-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> --}}
	<link rel="stylesheet" href="/css/all.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper">

	    <!-- Navigation -->
	    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/">TechTrader</a>
	        </div>
	        <!-- /.navbar-header -->

	        <ul class="nav navbar-top-links navbar-right">
                @if(Auth::check())
	        	<li class="">
	        		<a class="tooltip-drop" href="/products/create" data-toggle="tooltip" data-placement="bottom" title="Sell">
	        		    <i class="fa fa-plus fa-fw"></i>
	        		</a>
	        	</li>
	            <li class="dropdown">
		                <a class="dropdown-toggle tooltip-drop" data-toggle="dropdown" href="#" data-toggle="tooltip" data-placement="bottom" title="Messages">
		                    <i class="fa fa-envelope fa-fw"></i> <span class="badge messages_badge">{{ Auth::user()->incoming_messages->count() }}</span>
		                </a>
		                <ul class="dropdown-menu dropdown-messages">
		                @foreach (Auth::user()->incoming_messages->take(3) as $message)
		                    <li>
		                        <a href="#">
		                            <div>
		                                <strong>{{ $message->sender->name }}</strong>
		                                <span class="pull-right text-muted">
		                                    <em>{{ $message->created_at->diffForHumans() }}</em>
		                                </span>
		                            </div>
		                            <div>{{ $message->subject }}</div>
		                        </a>
		                    </li>
		                    <li class="divider"></li>
		                @endforeach
		                <li>
		                	<a href="/user/messages">
		                		View All Messages
		                	</a>
		                </li>
		                </ul>
	                <!-- /.dropdown-messages -->
	            </li>
	            @endif

	            <li class="dropdown">
	                <a class="dropdown-toggle tooltip-drop" data-toggle="dropdown" href="#" data-toggle="tooltip" data-placement="bottom" title="Cart">
	                    <i class="fa fa-shopping-cart fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                </a>
	                <ul class="dropdown-menu">
	                    <li>
	                        <a href="#"> My Cart</a>
	                    </li>
	                    <li>
	                    	<a href="#"> My Wish List</a>
	                    </li>
	                </ul>
	                <!-- /.dropdown-alerts -->
	            </li>
	            <!-- /.dropdown -->
	            <li class="dropdown">
	                <a class="dropdown-toggle tooltip-drop" data-toggle="dropdown" href="#" data-toggle="tooltip" data-placement="bottom" title="Profile">
	                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                </a>
	                <ul class="dropdown-menu dropdown-user">
	                    @if(Auth::check())
	                    	<li><a href="/user/products"><i class="fa fa-cubes fa-fw"></i> My Products</a>
	                    	<li class="divider"></li>
	                    	<li><a href="#"><i class="fa fa-cog fa-fw"></i> Preferences</a>
	                    	<li><a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
	                    @else
	                    	<li><a href="/auth/register"><i class="fa fa-pencil-square-o fa-fw"></i> Register</a>
	                    	<li><a href="/auth/login"><i class="fa fa-sign-in fa-fw"></i> Login</a>
	                    @endif
	                    </li>
	                </ul>
	                <!-- /.dropdown-user -->
	            </li>
	            <!-- /.dropdown -->
	        </ul>
	        <!-- /.navbar-top-links -->

			<!-- SIDE NAV -->
	        <div class="navbar-default sidebar" role="navigation">
	            <div class="sidebar-nav navbar-collapse">
	                <ul class="nav" id="side-menu">
	                    <li class="sidebar-search">
	                        <div class="input-group custom-search-form">
	                            <input type="text" class="form-control" placeholder="Search...">
	                            <span class="input-group-btn">
	                            <button class="btn btn-default" type="button">
	                                <i class="fa fa-search"></i>
	                            </button>
	                        </span>
	                        </div>
	                        <!-- /input-group -->
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-keyboard-o fa-fw"></i> Computers<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="flot.html">Laptops</a>
	                            </li>
	                            <li>
	                                <a href="morris.html">Desktops</a>
	                            </li>
	                            <li>
	                                <a href="morris.html">Peripherals</a>
	                            </li>
	                            <li>
	                                <a href="morris.html">Accessories</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="tables.html"><i class="fa fa-tablet fa-fw"></i> Mobile</a>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-gamepad fa-fw"></i> Gaming<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="flot.html">Systems</a>
	                            </li>
	                            <li>
	                                <a href="morris.html">Games</a>
	                            </li>
	                            <li>
	                                <a href="morris.html">Accessories</a>
	                            </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-wifi fa-fw"></i> Networking<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="panels-wells.html">Modems & Routers</a>
	                            </li>
	                            <li>
	                                <a href="buttons.html">Commercial Networking</a>
	                            </li>
	                            <li>
	                                <a href="notifications.html">Security</a>
	                            </li>
	                            <li>
	                                <a href="typography.html">Accessories</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                    	<a href="#"><i class="fa fa-tv fa-fw"></i> General Electronics<span class="fa arrow"></span></a>
	                    	<ul class="nav nav-second-level">
	                    		<li>
	                    			<a href="#"> Televisions</a>
	                    		</li>
	                    		<li>
	                    			<a href="#"> Cameras</a>
	                    		</li>
	                    		<li>
	                    			<a href="#"> Blu-ray/DVD/CD Players</a>
	                    		</li>
	                    		<li>
	                    			<a href="#"> Accessories</a>
	                    		</li>
	                    	</ul>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-headphones fa-fw"></i> Audio<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="#">Headphones</a>
	                            </li>
	                            <li>
	                                <a href="#">Speakers</a>
	                            </li>
	                            <li>
	                            	<a href="#">Home Theater Systems</a>
	                            </li>
	                            <li>
	                            	<a href="#">Accessories</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-battery-2 fa-fw"></i> Accessories<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="blank.html">Blank Page</a>
	                            </li>
	                            <li>
	                                <a href="login.html">Login Page</a>
	                            </li>
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                </ul>
	            </div>
	            <!-- /.sidebar-collapse -->
	        </div>
	        <!-- /.navbar-static-side -->
	    </nav>

		<!-- Page Content -->
	    <div id="page-wrapper">
	    	<div class="row">
	        	@yield('content')
	    	</div>
	    </div>
	    <!-- /#page-wrapper -->

	</div>

	<!-- Scripts -->
	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
	{{-- <script src="/js/jquery.min.js"></script> --}}
	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
	{{-- <script src="/js/bootstrap.min.js"></script> --}}
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> --}}
	<script src="/js/all.js"></script>
	<script>$('.tooltip-drop').tooltip();</script>
</body>
</html>
