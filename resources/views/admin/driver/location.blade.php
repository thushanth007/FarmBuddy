@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Location <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Location</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if (count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

        <ul class="nav nav-tabs">
            <li @if(Request::is('*location')) class="active" @endif><a href="{{url('admin/driver-location')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active">
                <body onload="initMap()">
                    <h3>Click on the map to get latitude and longitude:</h3>
                    <div id="map" style="width: 100%; height: 400px;"></div>
                    <form method="POST" action="/admin/driver-location">
                        @csrf
                        <input type="text" id="lat" name="latitude" placeholder="Latitude">
                        <input type="text" id="lng" name="longitude" placeholder="Longitude">
                        <button type="submit">Submit</button>
                    </form>
                </body>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 8.78755734015209, lng: 80.48483021834353},
                zoom: 12
            });

            google.maps.event.addListener(map, 'click', function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                
                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
            });
        }
    </script>
@endsection
