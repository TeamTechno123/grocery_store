<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Needs On Doors | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">
</head>
<body class="">

<div class="container ">
  <div class="row">
    <div class="col-md-6 col-6 text-left">
      <a href="<?php echo base_url(); ?>"> <img class="top-img" src="<?php echo base_url(); ?>assets/images//new/newlogo.png" alt="" ></a>
    </div>
     <div class="col-md-6 col-6  text-right">
      <img class="top-img my-auto" src="<?php echo base_url(); ?>assets/images/play.png" alt="">
    </div>
  </div>
</div>

<div class="container-fluid">


<div class="hold-transition login-page bg-grocery" width="100%" >
<div class="login-box">
  <div class="login-logo">
    <!-- <b class="text-white">Login</b> -->
  </div>
  <!-- /.login-logo -->
  <div class="card px-3">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form method="post" action="">
        <label>Mobile No.</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile Number" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        <span class="text-red"> <?php echo form_error('email'); ?> </span>
        <label>Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-red"> <?php echo form_error('password'); ?> </span>
        <div class="row">
          <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <div class="col-8">
            <p style="font-size:14px;margin-bottom:2px;"> <a href="<?php echo base_url(); ?>Forgot-Password">Forgot Password ?</a> </p>
            <p style="font-size:14px; ">New Customer ? <a href="<?php echo base_url(); ?>Signup">Sign up Now</a> </p>                    </div>
        </div>
      </form>
      <!-- <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="alert alert-danger p-2 msg_invalid" style="display:none" role="alert">
    Invalid Information
  </div>




</div>
</div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
<?php if($this->session->flashdata('msg')){ ?>
  $(document).ready(function(){
    // alert();
    $('.msg_invalid').show().delay(5000).fadeOut();
  });
<?php } ?>
</script>

<script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('signup_success')){ ?>
    $(document).ready(function(){
      toastr.success('Sign Up Successfully. Login Now.');
    });
  <?php } ?>
  <?php if($this->session->flashdata('update_success')){ ?>
    $(document).ready(function(){
      toastr.success('Updated successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('delete_success')){ ?>
    $(document).ready(function(){
      toastr.error('Deleted successfully');
    });
  <?php } ?>
</script>
</body>
</html>
