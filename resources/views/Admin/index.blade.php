@extends('Admin.master')
@section('content')
     <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon green">
                    <i class="nc-icon nc-layers-3"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> الفواتير</p>
                <h3 class="card-title">{{$employees}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="#">الفواتير</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6"  style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon yellow">
                    <i class="nc-icon nc-grid-45"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> المنتجات</p>
                <h3 class="card-title">{{$users}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="#">المنتجات</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon cayan" >
                    <i class="nc-icon nc-app"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> عروض الاسعار</p>
                <h3 class="card-title">{{$con}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="#">عروض الاسعار</a>
                </div>
              </div>
            </div>
          </div>
       
          {{-- <div id="container" style="width: 75%;">
            <canvas id="canvas"></canvas>
            </div> --}}

    </div>

{{-- @push('custom-scripts')
<script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
<script src="http://www.chartjs.org/samples/latest/utils.js"></script>
<script>
        var chartdata = {
    type: 'bar',
    data: {
    labels: <?php echo json_encode(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Augt', 'Sep', 'Oct', 'Nov', 'Dec']); ?>,
    // labels: month,
    datasets: [
    {
    label: 'this year',
    backgroundColor: '#26B99A',
    borderWidth: 1,
    data: {{mothly()}}
    }
    ]
    },


    options: {
        animations: {
      y: {
        easing: 'easeInOutElastic',
        from: (ctx) => {
          if (ctx.type === 'data') {
            if (ctx.mode === 'default' && !ctx.dropped) {
              ctx.dropped = true;
              return 0;
            }
          }
        }
      }
    },

    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }
    }
    }
    var ctx = document.getElementById('canvas').getContext('2d');
    new Chart(ctx, chartdata);
    </script>

</script> --}}

{{-- @endpush --}}
@endsection
