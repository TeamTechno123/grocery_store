<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>User Information</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form_action" role="form" action="" method="post">
                <div class="card-body row">

                  <div class="form-group col-md-12 select_sm">
                    <select class="form-control select2" name="role_id" id="role_id" data-placeholder="Select User Type">
                      <option value="">Select User Type</option>
                      <option value="2" <?php if(isset($role_id) && $role_id == '2'){ echo 'selected'; } ?> >Office-Employee</option>
                      <option value="5" <?php if(isset($role_id) && $role_id == '5'){ echo 'selected'; } ?> >Sales-Executive</option>
                      <option value="6" <?php if(isset($role_id) && $role_id == '6'){ echo 'selected'; } ?> >Cash-Employee</option>
                      <option value="7" <?php if(isset($role_id) && $role_id == '7'){ echo 'selected'; } ?> >Delivery-Boy</option>

                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control required title-case text" name="user_name" id="user_name" value="<?php if(isset($user_name)){ echo $user_name; } ?>" placeholder="Enter Name of User" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="user_city" id="user_city" value="<?php if(isset($user_city)){ echo $user_city; } ?>" placeholder="Enter City" required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="number" class="form-control" name="user_mobile" id="user_mobile" value="<?php if(isset($user_mobile)){ echo $user_mobile; } ?>" placeholder="Enter Mobile No." required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="email" class="form-control" name="user_email" id="user_email" value="<?php if(isset($user_email)){ echo $user_email; } ?>" placeholder="Enter Email Id." required>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control " name="user_password" id="user_password" value="<?php if(isset($user_password)){ echo $user_password; } ?>" placeholder="Enter Password" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="<?php echo base_url() ?>User/dashboard" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
// Check Mobile Duplication..
  var user_mobile1 = $('#user_mobile').val();
  $('#user_mobile').on('change',function(){
    var user_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_mobile",
             "column_val":user_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#user_mobile').val(user_mobile1);
          toastr.error(user_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var user_email1 = $('#mobile').val();
  $('#user_email').on('change',function(){
    var user_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_email",
             "column_val":user_email,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#user_email').val(user_email1);
          toastr.error(user_email+' Email Id Exist.');
        }
      }
    });
  });
</script>



</body>
</html>
