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
            <h1>Header Content</h1>
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
                <h3 class="card-title">Update Header Content</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Update Header 1 </label>
                        <input type="text" class="form-control form-control-sm" name="header_content1" id="header_content1" value="<?php if(isset($header_content_info)){ echo $header_content_info['header_content1']; } ?>" placeholder="" >
                      </div>
                      <div class="form-group col-md-12">
                        <label>Update Header 2 </label>
                        <input type="text" class="form-control form-control-sm" name="header_content2" id="header_content2" value="<?php if(isset($header_content_info)){ echo $header_content_info['header_content2']; } ?>" placeholder="" >
                      </div>
                      <div class="form-group col-md-12">
                        <label>Update Header 3 </label>
                        <input type="text" class="form-control form-control-sm" name="header_content3" id="header_content3" value="<?php if(isset($header_content_info)){ echo $header_content_info['header_content3']; } ?>" placeholder="" >
                      </div>
                      <div class="form-group col-md-12">
                        <label>Update Header 4 </label>
                        <input type="text" class="form-control form-control-sm" name="header_content4" id="header_content4" value="<?php if(isset($header_content_info)){ echo $header_content_info['header_content4']; } ?>" placeholder="" >
                      </div>
                      <div class="form-group col-md-12">
                        <label>Update Header 5 </label>
                        <input type="text" class="form-control form-control-sm" name="header_content5" id="header_content5" value="<?php if(isset($header_content_info)){ echo $header_content_info['header_content5']; } ?>" placeholder="" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <!-- <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="tax_status" id="tax_status" value="1" <?php if(isset($header_content_info) && $header_content_info['tax_status'] == 1){ echo 'checked'; } elseif (!isset($header_content_info)){ echo 'checked'; } ?>>
                      <label for="tax_status" class="custom-control-label">Active</label>
                    </div> -->
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/manufacturer_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

  <script type="text/javascript">
  </script>
</body>
</html>
