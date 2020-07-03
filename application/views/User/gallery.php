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
            <h1>GALLERY INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Gallery </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Enter Gallery Name</label>
                        <input type="text" class="form-control form-control-sm" name="gallery_name" id="gallery_name" value="<?php if(isset($gallery_info)){ echo $gallery_info['gallery_name']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Image</label>
                        <input type="file" name="gallery_img" id="gallery_img" class="form-control form-control-sm" <?php if(!isset($update)){ echo 'update'; } ?>>
                      </div>
                      <?php if(isset($update)){ ?>
                        <div class="form-group col-md-6">
                          <img width="60%" src="<?php echo base_url(); ?>assets/images/master/<?php echo $gallery_info['gallery_img']; ?>" alt="">
                          <input type="hidden" name="old_img" id="old_img" value="<?php echo $gallery_info['gallery_img']; ?>" class="form-control form-control-sm">
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="gallery_status" id="gallery_status" value="1" <?php if(isset($gallery_info) && $gallery_info['gallery_status'] == 1){ echo 'checked'; } elseif (!isset($gallery_info)){ echo 'checked'; } ?>>
                      <label for="gallery_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="" class="btn btn-default ml-4">Cancel</a>
                  </div>
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
  var supplier_mobile1 = $('#supplier_mobile').val();
  $('#supplier_mobile').on('change',function(){
    var supplier_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"supplier_mobile",
             "column_val":supplier_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#supplier_mobile').val(supplier_mobile1);
          toastr.error(supplier_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var supplier_email1 = $('#mobile').val();
  $('#supplier_email').on('change',function(){
    var supplier_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"supplier_email",
             "column_val":supplier_email,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#supplier_email').val(supplier_email1);
          toastr.error(supplier_email+' Email Id Exist.');
        }
      }
    });
  });
</script>


</body>
</html>
