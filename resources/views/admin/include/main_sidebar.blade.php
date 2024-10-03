<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('storage/profile/'.$admin_info->image)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$admin_info->name}}</p>
                <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        {!! Form::open(['url' => 'admin/product/search', 'class'=>'sidebar-form']) !!}
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search product..."  required/>
            <span class="input-group-btn">
                <button type='submit' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
        {!! Form::close() !!}

        <ul class="sidebar-menu">

            <!-- Dashboard -->
            @if($admin_info->user_type == 'admin')
            <li class="{{(Request::is('*dashboard') ? 'active' : '')}}"><a href="{{ url('admin/dashboard') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>

            <li class="{{(Request::is('*/farmer-info*') ? 'active' : '')}}"><a href="{{ url('admin/farmer-info') }}"><i class='fa fa-user-secret'></i> <span>Farmer</span></a></li>

            <li class="{{(Request::is('*/driver-info*') ? 'active' : '')}}"><a href="{{ url('admin/driver-info') }}"><i class='fa fa-user-circle'></i> <span>Driver</span></a></li>

            <li class="{{(Request::is('*/category*') ? 'active' : '')}}"><a href="{{ url('admin/category') }}"><i class='fa fa-th'></i> <span>Category</span></a></li>

            <li class="header">NOTIFICATION</li>

            <li class="{{(Request::is('*contact*') ? 'active' : '')}}"><a href="{{ url('admin/contact') }}"><i class='fa fa-envelope-o'></i> <span>Message</span></a></li>
            @endif

            @if($admin_info->user_type == 'seller')
            <li class="{{(Request::is('*/seller-dashboard') ? 'active' : '')}}"><a href="{{ url('admin/seller-dashboard') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>

            <li class="{{(Request::is('*/seller-category*') ? 'active' : '')}}"><a href="{{ url('admin/seller-category') }}"><i class='fa fa-th'></i> <span>Category</span></a></li>

            <li class="{{(Request::is('*/seller-product*') ? 'active' : '')}}"><a href="{{ url('admin/seller-product') }}"><i class='fa fa-eercast'></i> <span>Product</span></a></li>

            <li class="header">NOTIFICATION</li>

            <li class="{{(Request::is('*/seller-order*') ? 'active' : '')}}"><a href="{{ url('admin/seller-order') }}"><i class='fa fa-shopping-cart '></i> <span>Order</span></a></li>
            
            <li class="{{(Request::is('*seller-review*') ? 'active' : '')}}"><a href="{{ url('admin/seller-review') }}"><i class='fa fa-star-half-o'></i> <span>Review</span></a></li>
             @endif

             @if($admin_info->user_type == 'driver')
            <li class="{{(Request::is('*/driver-dashboard') ? 'active' : '')}}"><a href="{{ url('admin/driver-dashboard') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>

            <li class="{{(Request::is('*/driver-history*') ? 'active' : '')}}"><a href="{{ url('admin/driver-history') }}"><i class='fa fa-history'></i> <span>History</span></a></li>

            <li class="header">NOTIFICATION</li>

            <li class="{{(Request::is('*/driver-order*') ? 'active' : '')}}"><a href="{{ url('admin/driver-order') }}"><i class='fa fa-bell-o'></i> <span>Order</span></a></li>
            @endif

        </ul>
    </section>
</aside>
