<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kirana Bhara | Check OTP</title>
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

<div class="container">
  <div class="row">
    <div class="col-md-6  col-6 pt-1 pb-0 text-left">
    <a href="<?php echo base_url(); ?>"> <img class="top-img logo-login" src="<?php echo base_url(); ?>assets/images/kirana_bhara.png" alt="" height="80px"></a>
    </div>
     <div class="col-md-6 col-6 m-mt3 pt-3 pb-3 text-right">
      <img class="top-img" src="<?php echo base_url(); ?>assets/images/play.png" alt="">
    </div>
  </div>
</div>

<div class="hold-transition login-page bg-grocery" >
<div class="login-box">
  <div class="login-logo">
    <b class="text-white">Signup Using OTP</b>
  </div>
  <!-- /.login-logo -->
  <div class="card px-3">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form method="post" action="">
        <label>Enter OTP Here</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="otp" id="otp" placeholder="Enter OTP Here" required>
          <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enter</button>
          </div>
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
    <?php if($this->session->flashdata('invalide_otp')){ ?>
      $(document).ready(function(){
        toastr.error('Invalide OTP');
      });
    <?php } ?>
  </script>
</body>
</html>
