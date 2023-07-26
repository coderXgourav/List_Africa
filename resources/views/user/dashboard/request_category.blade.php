@include('user.dashboard.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Category Add Request to Listafrica Admin </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="request_form">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Request Message</label>
                  <div class="col-sm-10">
                    <input type="text" name="request_message" class="form-control"  placeholder="Add Category Request Message text Here.." style="height:60px;" required>
                  </div>
                  {{@csrf_field()}}

                 
                </div>
               
              
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <center>
                    <button type="submit" id="btn" class="btn btn-info">Send Request </button>
                </center>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
      <!-- general form elements -->
      </div>
    </div>
</div>

@include('user.dashboard.footer')
<script>
  $('#password').addClass('active');
</script>