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
  </style>

<div class="content-wrapper">

<div class="card">
              <div class="card-header">
                <h2 class="card-title">Category List Table</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: scroll">
                <table class="table table-bordered table-striped" id="category_table">
                  <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th>Category</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($category_data as $val)
                    <tr id="{{$val->id}}">
                        <td>{{$no++;}}</td>
                        <td>{{$val->category_name}}</td>
                        <td><img class="img-thumbnail" src="{{url('category_icon')}}/{{$val->category_icon}}" alt="" style="width:60px; height:50px; background-color:black;"></td>
                        <td>
              <select name="" class="form-control" id="" onchange="Status(this.value,{{$val->id}})">
    <option value="1" @if ($val->status==1) selected   
              @endif>Active</option>
              <option value="0" @if ($val->status==0) selected       
                @endif>Deactive</option>
              </select>
                        </td>
                        <td class="text-center">
                            <a href="{{route('admin.dashboard.category-update',['id'=>$val->id])}}" class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a> &ensp;
                            <a href="javascript:void(0)" onclick="Delete({{$val->id}})" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

                        </td>

                    </tr>
                    @endforeach


                  </tbody>
                </table>
                <div class="">
                  {{$category_data->links()}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
</div>
@include('admin.dashboard.footer')
<script>
  $('#category').addClass('active');
  $('#view-category').addClass('active');
</script>