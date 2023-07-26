@include('admin.dashboard.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Update Listing Form</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Listing Update Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Listing Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="update_listing_form">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Category</label>
                                    <select name="category_id" id="category" class="form-control"
                                        onchange="Name(this.value)">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $value)
<option value="{{ $value->id }}" @if($listing_data->cat_id==$value->id) selected @endif >{{ $value->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1" >Business Listing Title</label>
                                    <input type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="Business Listing Title" name="company" required value="{{$listing_data->listing_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" name="address" class="form-control"
                                    id="location" placeholder="Enter Address Here" value="{{$listing_data->address}}">
                                </div>
                               
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Country</label>
                                    <input type="text" name="country" class="form-control"
                                    id="country" placeholder="Enter Country Name" value="{{$listing_data->country}}">
                                </div> --}}
                                
                                <input type="hidden" name="lat" id="lat" class="form-control" required>
                                <input type="hidden" name="listing_id" value="{{$listing_data->listing_id}}">
                                <input type="hidden" name="lng" id="lng" class="form-control">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone Number</label>
                                    <input type="number" name="phone_number" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Phone No Here" required  value="{{$listing_data->phone_number}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile Number</label>
                                    <input type="number" name="mobile_number" class="form-control"
                                        placeholder="Enter Mobile No Here" required  value="{{$listing_data->mobile_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">FAX</label>
                                    <input type="number" id="" class="form-control"
                                         id="exampleInputEmail1" placeholder="FAX" name="fax" value="{{$listing_data->fax}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control"
                                        id="exampleInputEmail1" placeholder="Type Email Here" name="email" required  value="{{$listing_data->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Website</label>
                                    <input type="url" class="form-control"
                                        id="exampleInputEmail1" placeholder="Type Website Here" name="website"  value="{{$listing_data->website}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Working Hour</label>
                                </div>
                                <table class="table table-stripe">
                                    <tr>
                                        <th>Sunday</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                    </tr>
                                    <tr>
                                        <td>
                                        <label for="on">ON</label> <input id="on1" type="radio" name="1" @if($listing_data->sun_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off1" value="CLOSED" type="radio"  name="1"  @if($listing_data->sun_start=="CLOSED") checked @endif> <br>
                                          <div id="show1">
                                              Start:<input type="time" name="sunday_start" id="sunday_start" required  @if($listing_data->sun_start=="CLOSED") disabled @else value="{{$listing_data->sun_start}}"@endif><br> <br>
                                           End: <input type="time" name="sunday_end" id="sunday_end" required @if($listing_data->sun_start=="CLOSED") disabled @else value="{{$listing_data->sun_end}}" @endif>
                                          </div>
                                        </td>
                                         <td>
                                             <label for="on">ON</label> <input id="on2" type="radio" name="2" @if($listing_data->mon_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off2" type="radio"  name="2"  @if($listing_data->mon_start=="CLOSED") checked @endif>
                                            <div id="show2">
                                              Start:<input type="time" name="monday_start" id="monday_start" required @if($listing_data->mon_start=="CLOSED") disabled @else value="{{$listing_data->mon_start}}"@endif><br> <br>
                                           End: <input type="time" name="monday_end" id="monday_end" required @if($listing_data->mon_start=="CLOSED") disabled @else value="{{$listing_data->mon_end}}"@endif>
                                          </div>
                                        </td>
                                         <td>
                                             <label for="on">ON</label> <input id="on3" type="radio" name="3" @if($listing_data->tue_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off3" type="radio"  name="3" value="CLOSED"  @if($listing_data->tue_start=="CLOSED") checked @endif>
                                            <div id="show3">
                                              Start:<input type="time" name="tue_start" id="tue_start" required @if($listing_data->tue_start=="CLOSED") disabled @else value="{{$listing_data->tue_start}}"@endif><br> <br>
                                           End: <input type="time" name="tue_end" id="tue_end" required @if($listing_data->tue_start=="CLOSED") disabled @else value="{{$listing_data->tue_start}}"@endif>
                                          </div>
                                        </td>
                                         <td>
                                             <label for="on">ON</label> <input id="on4" type="radio" name="4" @if($listing_data->wed_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off4" type="radio"  name="4" value="CLOSED" @if($listing_data->wed_start=="CLOSED") checked @endif>
                                            <div id="show4">
                                              Start:<input type="time" name="wed_start" id="wed_start" required @if($listing_data->wed_start=="CLOSED") disabled @else value="{{$listing_data->wed_start}}"@endif><br> <br>
                                           End: <input type="time" name="wed_end" id="wed_end" required @if($listing_data->wed_start=="CLOSED") disabled @else value="{{$listing_data->wed_end}}"@endif>
                                          </div>
                                        </td>
                                         <td>
                                             <label for="on">ON</label> <input id="on5" type="radio" name="5" @if($listing_data->thusday_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off5" type="radio"  name="5" value="CLOSED" @if($listing_data->thusday_start=="CLOSED") checked @endif>
                                             <div id="show5">
                                              Start:<input type="time" name="thus_start" id="thus_start" required @if($listing_data->thusday_start=="CLOSED") disabled @else value="{{$listing_data->thusday_start}}"@endif><br> <br>
                                           End: <input type="time" name="thus_end" id="thus_end" required @if($listing_data->thusday_start=="CLOSED") disabled @else value="{{$listing_data->thusday_end}}"@endif>
                                          </div>
                                        </td>
                                         <td>
                                             <label for="on">ON</label> <input id="on6" type="radio" name="6" @if($listing_data->friday_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off6" type="radio"  name="6" value="CLOSED" @if($listing_data->friday_start=="CLOSED") checked @endif>
                                            <div id="show6">
                                              Start:<input type="time" name="friday_start" id="friday_start" required  @if($listing_data->friday_start=="CLOSED") disabled @else value="{{$listing_data->friday_start}}"@endif><br> <br>
                                           End: <input type="time" name="friday_end" id="friday_end" required  @if($listing_data->friday_start=="CLOSED") disabled @else value="{{$listing_data->friday_end}}"@endif>
                                          </div>
                                        </td>
                                         <td>
                                             <label for="on">ON</label> <input id="on7" type="radio" name="7" @if($listing_data->saturday_start!="CLOSED") checked @endif>
                                         <label for="off">OFF</label> <input id="off7" type="radio"  name="7" value="CLOSED" @if($listing_data->saturday_end=="CLOSED") checked @endif>
                                             <div id="show7">
                                              Start:<input type="time" name="saturday_start" id="saturday_start" required @if($listing_data->saturday_start=="CLOSED") disabled @else value="{{$listing_data->saturday_start}}"@endif><br> <br>
                                           End: <input type="time" name="saturday_end" id="saturday_end" required  @if($listing_data->saturday_start=="CLOSED") disabled @else value="{{$listing_data->saturday_end}}"@endif>
                                          </div>
                                        </td>
                                        
                                        
                                    </tr>
                                </table>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                     <textarea name="desc" class="form-control" id="" cols="30" rows="5" placeholder="Type Listing Description Here">{{$listing_data->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Establishment Year</label>
                                    <input type="number" id="" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter Establishment Year" name="year" value="{{$listing_data->year}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Employees</label>
                                    <input type="number" id="" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter Total Employees Number Here" name="employe" value="{{$listing_data->employe}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Manager Name</label>
                                    <input type="text" id="" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Manager Name Here" name="manager" value="{{$listing_data->manager}}">
                                </div>


                                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Review Text</label>
                    <textarea class="form-control" name="text" id="" cols="30" rows="8" placeholder="Type Client Review Text Here.."></textarea>
                  </div> --}}
                                <div class="form-group">
                                    <div class="form-group">

                                        <label for="">Select Listing Logo</label>
                                        <input type="file" name="file" class="form-control" id="imageInput"
                                            onchange="previewImage()">
                                    </div>
                                    <img id="imagePreview" src="#" alt=""
                                        style="width:200px; border-radius:5px;" />
                                        <label for="" style="margin-left:10px;" class="text-info">If you don't change the photo, the previous photo will remain ..</label>

                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1"> Gallery Image 1 <small class="text-info">(If you don't change the photo, the previous photo will remain ..)</small></label>
                                    <input type="file" id="" class="form-control"
                                    id="exampleInputEmail1" name="gallery1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"> Gallery Image 2 <small class="text-info">(If you don't change the photo, the previous photo will remain ..)</small></label>
                                    <input type="file" id="" class="form-control"
                                    id="exampleInputEmail1" name="gallery2">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"> Gallery Image 3 <small class="text-info">(If you don't change the photo, the previous photo will remain ..)</small></label>
                                    <input type="file" id="" class="form-control"
                                    id="exampleInputEmail1" name="gallery3">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1"> Gallery Image 4 <small class="text-info">(If you don't change the photo, the previous photo will remain ..)</small></label>
                                    <input type="file" id="" class="form-control"
                                    id="exampleInputEmail1" name="gallery4">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <center>
                                    <button type="submit" class="btn btn-primary" id="btn">Update Listing 
                                        &nbsp;
                                         </button>

                                </center>
                                <br>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->





                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function previewImage() {
        var preview = document.querySelector('#imagePreview');
        var file = document.querySelector('#imageInput').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

@include('admin.dashboard.footer')

<script>
    $(document).ready(function(){
      var autocomplete;
      var id ="location";
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
         types:['geocode'],
      })
      google.maps.event.addListener(autocomplete,'place_changed',function(){
        var place = autocomplete.getPlace();
       
           $('#lat').val(place.geometry.location.lat());
           $('#lng').val(place.geometry.location.lng());
        
        
    })
    });
  </script>
  <script>
    $(document).ready(function(){
      var autocomplete;
      var id ="country";
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
         types:['geocode'],
      })
      google.maps.event.addListener(autocomplete,'place_changed',function(){
        var place = autocomplete.getPlace();
    
        
        
    })
    });
  </script>
  <script>
  $('#listing').addClass('active');
  $('#view-listing').addClass('active');

   $('#listing').addClass('active');
  $('#view-listing').addClass('active');

    $('#off1').click(function(){
        // $('#show1').hide();
        $('#sunday_start').attr('disabled',true);
        $('#sunday_end').attr('disabled',true);
    });
     $('#on1').click(function(){
           $('#sunday_start').attr('disabled',false);
          $('#sunday_end').attr('disabled',false);
    });

     $('#off2').click(function(){
         $('#monday_start').attr('disabled',true);
        $('#monday_end').attr('disabled',true);
    });
     $('#on2').click(function(){
        $('#monday_start').attr('disabled',false);
        $('#monday_end').attr('disabled',false);
    });

     $('#off3').click(function(){
       $('#tue_start').attr('disabled',true);
        $('#tue_end').attr('disabled',true);
    });
     $('#on3').click(function(){
         $('#tue_start').attr('disabled',false);
        $('#tue_end').attr('disabled',false);
    });

     $('#off4').click(function(){
        $('#wed_start').attr('disabled',true);
        $('#wed_end').attr('disabled',true);
    });
     $('#on4').click(function(){
        $('#wed_start').attr('disabled',false);
        $('#wed_end').attr('disabled',false);
    });

     $('#off5').click(function(){
        $('#thus_start').attr('disabled',true);
        $('#thus_end').attr('disabled',true);
    });
     $('#on5').click(function(){
         $('#thus_start').attr('disabled',false);
        $('#thus_end').attr('disabled',false);
    });

     $('#off6').click(function(){
        $('#friday_start').attr('disabled',true);
        $('#friday_end').attr('disabled',true);
    });
     $('#on6').click(function(){
        $('#friday_start').attr('disabled',false);
        $('#friday_end').attr('disabled',false);
    });

     $('#off7').click(function(){
       $('#saturday_start').attr('disabled',true);
        $('#saturday_end').attr('disabled',true);
    });
     $('#on7').click(function(){
         $('#saturday_start').attr('disabled',false);
        $('#saturday_end').attr('disabled',false);
    });
</script>