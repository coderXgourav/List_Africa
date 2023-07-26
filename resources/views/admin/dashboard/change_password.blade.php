@include('admin.dashboard.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Update Your Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="password_form">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="old" class="form-control" id="inputEmail3" placeholder="Old Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="new" class="form-control" id="new" placeholder="Enter New Password">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="confirm" class="form-control" id="inputPassword3" placeholder="Enter Confirm Password">
                    </div>
                  </div>
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <center>
                    <button type="submit" id="btn" class="btn btn-info">Update Password</button>
                </center>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
      <!-- general form elements -->
      </div>
    </div>
</div>

@include('admin.dashboard.footer')
<script>
  $('#password').addClass('active');
</script>