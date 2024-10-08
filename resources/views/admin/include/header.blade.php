<header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
        <span class="logo-mini"><b>F</b>B</span>
        <span class="logo-lg"><b>{{ $option->name }}</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if($admin_info->user_type == 'admin')
                <li class="messages-menu">
                    <a href="{{url('admin/contact')}}">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{$message}}</span>
                    </a>
                </li>
                @endif

                @if($admin_info->user_type == 'seller')
                <li class="messages-menu">
                    <a href="{{url('admin/seller-order')}}">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-success">0</span>
                    </a>
                </li>
                <li class="messages-menu">
                    <a href="{{url('admin/seller-review')}}">
                        <i class="fa fa-star-half-o"></i>
                        <span class="label label-success">0</span>
                    </a>
                </li>
                @endif

                @if($admin_info->user_type == 'driver')
                <li class="messages-menu">
                    <a href="{{url('admin/driver-order')}}">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-success">0</span>
                    </a>
                </li>
                @endif

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('storage/profile/'.$admin_info->image)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{$admin_info->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('storage/profile/'.$admin_info->image)}}" class="img-circle" alt="User Image">
                            <p>
                                {{$admin_info->name}} - {{ $option->name }}
                                <small>Member since Nov. 2024</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{url('admin/profile')}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Sign out</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

                @if($admin_info->user_type == 'admin')
                <li>
                    <a href="{{url('admin/setting')}}"><i class="fa fa-gears"></i></a>
                </li>
                @endif

                @if($admin_info->user_type == 'seller')
                <li>
                    <a href="{{url('admin/seller-location')}}"><i class="fa fa-map-marker"></i></a>
                </li>
                @endif

                @if($admin_info->user_type == 'driver')
                <li>
                    <a href="{{url('admin/driver-location')}}"><i class="fa fa-map-marker"></i></a>
                </li>
                @endif

            </ul>
        </div>
    </nav>
</header>
