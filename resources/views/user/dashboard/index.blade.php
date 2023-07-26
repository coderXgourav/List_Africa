@include('user.dashboard.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Dashboard </h1> --}}
          </div><!-- /.col -->
        </div> <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     @if($listing_count>0)
     <div class="small-box bg-success" style="width:25%;">
              <div class="inner">
                <h3>{{$listing_count}}<sup style="font-size: 20px"></sup></h3>

                <p>Your Listing</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('user/listing')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
     @else 
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row" style="display:block;">
         <div class="col md-12 col-lg-12 m-auto">
          <center>
            <img src="{{url('img/africa-logo.png')}}" alt="" style="width:105px;">
          </center>
          <h3 class="text-success text-center"> <b>Congratulation !</b></h3>
         </div>
         <div class="col md-12 col-lg-312 m-auto">
          <h3 class="text-center"> <b>You have successfully joined Africa Listing Site</b></h3>
          <br>
          <p class="text-center" style="font-size:21px;">Please Submit Your Company Listing </p>
          <div class="text-center">
            <img src="{{url('star.png')}}" alt="" style="width:35px;">   
            <img src="{{url('star.png')}}" alt="" style="width:35px;">   
            <img src="{{url('star.png')}}" alt="" style="width:35px;">   
            <img src="{{url('star.png')}}" alt="" style="width:35px;">   
            <img src="{{url('star.png')}}" alt="" style="width:35px;">  
          </div>
         </div>     
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      @endif

     

    </section>
    <!-- /.content -->
  </div>
@include('user.dashboard.footer')
<script>
  $('#dashboard').addClass('active');
  </script>
