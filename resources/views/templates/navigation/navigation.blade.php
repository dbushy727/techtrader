<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
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
                    <i class="fa fa-envelope fa-fw"></i>
                    @if($unread_message_count = Auth::user()->incoming_messages()->unread()->count())
                        <span class="badge messages_badge">{{ $unread_message_count }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-messages">
                @foreach (Auth::user()->incoming_messages()->unread()->take(3)->get() as $message)
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
        <li class="dropdown">
            <a class="dropdown-toggle tooltip-drop" data-toggle="dropdown" href="#" data-toggle="tooltip" data-placement="bottom" title="Notifications">
                <i class="fa fa-bell fa-fw"></i>
                @if($notification_count = Auth::user()->notifications()->count())
                    <span class="badge messages_badge">{{ $notification_count }}</span>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-messages">
            @foreach (Auth::user()->notifications()->get() as $notification)
                <li>
                    <a href="#">
                        <div>
                            <span class="text-muted pull-right">
                                <em>{{ $notification->created_at->diffForHumans() }}</em>
                            </span>
                        </div>
                        <div class="clearfix">{{ $notification->message }}</div>
                    </a>
                </li>
                <li class="divider"></li>
            @endforeach
            </ul>
        <!-- /.dropdown-messages -->
        </li>
        @endif

        <li class="dropdown">
            <a class="tooltip-drop"  href="/cart" data-toggle="tooltip" data-placement="bottom" title="Cart">
                <i class="fa fa-shopping-basket fa-fw"></i> @if(Auth::user() && Auth::user()->cart_items->count())<span class="badge messages_badge">{{ Auth::user()->cart_items->count() }}</span>@endif
            </a>
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle tooltip-drop" data-toggle="dropdown" href="#" data-toggle="tooltip" data-placement="bottom" title="Profile">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if(Auth::check())
                    <li><a href="/user/products">My Products</a>
                    <li><a href="/user/products">My Orders</a>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-cog fa-fw"></i> Preferences</a>
                    <li><a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                @else
                    <li><a href="/auth/login"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                    <li><a href="/auth/register"><i class="fa fa-pencil-square-o fa-fw"></i> Register</a>
                @endif
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    @include('templates.navigation.sidenav')
</nav>