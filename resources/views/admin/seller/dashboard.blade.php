@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Dashboard <small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        @if($location->latitude == '') <div class="alert alert-warning"> Please update the location. <a href="{{url('/admin/seller-location')}}">Click here to update.</a></div> @endif
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        <div class="row">

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua">
                  <i class="fa fa-cart-arrow-down"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">Rs.{{$sales}}</span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red">
                  <i class="fa fa-cart-arrow-down"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number">{{$order}}</span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green">
                  <i class="fa fa-cubes"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{$product}}</span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow">
                  <i class="fa fa-star-half-o"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Reviews</span>
                <span class="info-box-number">{{$review}}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Orders Processing Chart</h3>
              </div>
              <div class="box-body">
                <canvas id="orderProductChart" style="width:100%;max-width:600px;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Orders Processing Chart</h3>
              </div>
              <div class="box-body">
                <canvas id="saleProductChart" style="width:100%;max-width:600px;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Sales Processing Chart</h3>
              </div>
              <div class="box-body">
                <div id="saleChart" style="width:100%; height:400px;">
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
  const data = google.visualization.arrayToDataTable([
    ['Monday', 'Mhl'],
    ['Monday',<?php echo $monSale; ?>],
    ['Tuesday',<?php echo $tueSale; ?>],
    ['Wednesday',<?php echo $wedSale; ?>],
    ['Thursday',<?php echo $thuSale; ?>],
    ['Friday',<?php echo $friSale; ?>],
    ['Saturday',<?php echo $satSale; ?>],
    ['Sunday',<?php echo $sunSale; ?>]
  ]);

  const options = {
    title:'Sales Breakdown by Day (Including Driver Payments)'
  };

  const chart = new google.visualization.PieChart(document.getElementById('saleChart'));
    chart.draw(data, options);
  }
</script>

<script>
  var xArray3 = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
  var yArray3 = [
    <?php echo $monOrder; ?>,
    <?php echo $tueOrder; ?>,
    <?php echo $wedOrder; ?>,
    <?php echo $thuOrder; ?>,
    <?php echo $friOrder; ?>,
    <?php echo $satOrder; ?>,
    <?php echo $sunOrder; ?>,
  ];
  var barColors = ["#3f51b5", "#3f51b5","#3f51b5","#3f51b5","#3f51b5"];

  new Chart("orderProductChart", {
    type: "bar",
    data: {
      labels: xArray3,
      datasets: [{
        backgroundColor: barColors,
        data: yArray3
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Daily Customer Orders"
      }
    }
  });
</script>

<script>
  var xArray3 = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
  var yArray3 = [
    <?php echo $monSale; ?>,
    <?php echo $tueSale; ?>,
    <?php echo $wedSale; ?>,
    <?php echo $thuSale; ?>,
    <?php echo $friSale; ?>,
    <?php echo $satSale; ?>,
    <?php echo $sunSale; ?>,
  ];
  var barColors = ["#f56954", "#f56954","#f56954","#f56954","#f56954"];

  new Chart("saleProductChart", {
    type: "bar",
    data: {
      labels: xArray3,
      datasets: [{
        backgroundColor: barColors,
        data: yArray3
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Daily Sales (Including Driver Payments)"
      }
    }
  });
</script>
@endsection
