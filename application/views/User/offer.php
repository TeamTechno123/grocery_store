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
            <h1>OFFER INFORMATION</h1>
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
                <h3 class="card-title">Add Offer </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Enter Offer Name</label>
                        <input type="text" class="form-control form-control-sm" name="offer_name" id="offer_name" value="<?php if(isset($offer_info)){ echo $offer_info['offer_name']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Image</label>
                        <input type="file" name="offer_img" id="offer_img" class="form-control form-control-sm" <?php if(!isset($update)){ echo 'update'; } ?>>
                      </div>
                      <?php if(isset($update)){ ?>
                        <div class="form-group col-md-6">
                          <img width="60%" src="<?php echo base_url(); ?>assets/images/master/<?php echo $offer_info['offer_img']; ?>" alt="">
                          <input type="hidden" name="old_img" id="old_img" value="<?php echo $offer_info['offer_img']; ?>" class="form-control form-control-sm">
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="offer_status" id="offer_status" value="1" <?php if(isset($offer_info) && $offer_info['offer_status'] == 1){ echo 'checked'; } elseif (!isset($offer_info)){ echo 'checked'; } ?>>
                      <label for="offer_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>Master/membership_scheme_list" class="btn btn-default ml-4">Cancel</a>
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
</body>
</html>
