@include('admin.dashboard.header')
<style>
  svg{
    display: none;
  }
  .leading-5{
    margin-top:16px !important;
  }
  .justify-between{
   margin-top:20px !important;
  }
  .text-small{
    white-space: nowrap; 
  width: 170px; 
  overflow: hidden;
  text-overflow: ellipsis; 
  }
  </style>
<div class="content-wrapper">

<div class="card">
              <div class="card-header">
                <h2 class="card-title">Listing Table</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: scroll">
                <form action="{{url('admin/dashboard/search')}}">
                <div class="row">
                    <div class="col-md-2">
                    <select name="country" id="" class="form-control my-2" required>
                    <option value="">Select Country</option>
                     @foreach ($all_country as $country)
                    <option value="{{$country->country}}">{{$country->country}}</option>
                    @endforeach
                  </select>
                  </div>
                   <div class="col-md-2">
                    <select name="category" id="" class="form-control my-2" required>
                    <option value="">Select Category</option>
                    @foreach ($all_category as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                  </div>
                   <div class="col-md-2">
                    <button type="submit" class="btn btn-primary my-2">Filter</button>
                </div>
                </div> <br>

              </form>
             
                <table class="table table-bordered table-striped" id="table">
                  <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th>Listing Logo</th>
                    <th>Listing</th>
                    <th>Category</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                 @if(count($listing_data)>0)
                 @foreach ($listing_data as $val)
                 <tr id="{{$val->listing_id}}">
                     <td>{{$no++;}}</td>
                      <td><img src="{{url('listing_photo')}}/{{$val->photo}}" alt="" class="img-thumbnail" style="width:50px;"></td>
                     <td ><p class="text-small">{{$val->listing_title}}</p></td>
                     <td>{{$val->category_name}}</td>
                     <td>{{$val->address}}</td>
                     <td>
           <select name="" class="form-control" id="" onchange="ListingStatus(this.value,{{$val->listing_id}})">
 <option value="1" @if ($val->status==1) selected   
           @endif>Activate</option>
           <option value="0" @if ($val->status==0) selected       
             @endif>Deactivate</option>
              <option value="2" @if ($val->status==2) selected       
             @endif>Verified</option>
           </select>
                     </td>
                     <td class="text-center">
                         <a href="{{route('admin.dashboard.listing-update',['id'=>$val->listing_id])}}" class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         </a> &ensp;
                         <a href="javascript:void(0)" onclick="DeleteListing({{$val->listing_id}})" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>

                     </td>

                 </tr>

                 @endforeach

                 @else 
                 <td colspan="7" style="color:red; text-align:center; ">Listing Not Found</td>
                 @endif


                  </tbody>
                </table>
                <div class="">
                  {{$listing_data->links()}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
</div>
@include('admin.dashboard.footer')
  
<script>
  $('#listing').addClass('active');
  $('#view-listing').addClass('active');
</script>