@include('admin.dashboard.header')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Updated Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Updated Category Form</li>
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
                <h3 class="card-title">Update Category Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="update_category_form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" name="category" value="{{$category_data->category_name}}">
                  </div>
                  <input type="hidden" name="category_id" value="{{$category_data->id}}">
                  {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Review Text</label>
                    <textarea class="form-control" name="text" id="" cols="30" rows="8" placeholder="Type Client Review Text Here.."></textarea>
                  </div> --}}
                  <div class="form-group">
                  <div class="form-group">

                    <label for="">Select Category Icon</label>
                <input type="file" name="file" class="form-control" id="imageInput" onchange="previewImage()">
                  </div>
                  <img id="imagePreview" src="#" alt="" style="width:200px; border-radius:5px;" />
                  <label class="text-info" for="" style="margin-left:10px;">If you don't change the icon, the previous icon will remain ..</label>

                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <center>
                      <button type="submit" class="btn btn-primary" id="btn">Update Category &nbsp; <i class="fa fa-plus-square" aria-hidden="true"></i></button>
                   
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

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
  </script>
@include('admin.dashboard.footer')
<script>
  $('#category').addClass('active');
  $('#view-category').addClass('active');
</script>