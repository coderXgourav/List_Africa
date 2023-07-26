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
  .dataTables_filter{
    display: flex;
    flex-direction: row-reverse;
  }
  .dataTables_length{
    position: absolute;
  }
  #myTable_previous{
    color: #007bff;
    background-color: transparent;
    border: 1px solid black;
    padding: 5px;
    margin-top: 5px;
    border-radius: 5px;
margin-left: 5px;
  }
  #myTable_next{
    color: #007bff;
    background-color: transparent;
    border: 1px solid black;
    padding: 5px;
    margin-top: 5px;
    border-radius: 5px;
margin-right: 5px;

  }
  #myTable_paginate{
    margin-top:10px;
    display: flex;
    flex-direction: row-reverse;
  }
  #myTable_filter label input{
    border-radius: 10px;
    margin-left:5px;
    outline: none;
  }
  </style>
<div class="content-wrapper">

<div class="card">
              <div class="card-header">
                <h2 class="card-title">User Request Messages Table</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: scroll">
                <table class="table table-bordered table-striped" id="myTable">
                  <thead>
                  <tr>
                    <th>Sl. No</th>
                    <th>User Name</th>
                    <th>Request Message</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                 @if(count($users)>0)
                 @foreach ($users as $val)
                 <tr>
                     <td>{{$no++;}}</td>
                     <td>{{$val->user_name}}</td>
                     <td>{{$val->message}}</td>
                 </tr>

                 @endforeach

                 @else 
                 <td colspan="6" style="color:red; text-align:center; ">Question Not Found</td>
                 @endif


                  </tbody>
                </table>
                <div>
                  {{$users->links()}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
</div>
@include('admin.dashboard.footer')
  
<script>
  $('#request').addClass('active');
</script>

