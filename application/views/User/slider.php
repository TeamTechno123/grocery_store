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
            <h1>SLIDER INFORMATION</h1>
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
                <h3 class="card-title">Slider Information</h3>
              </div>
              <form id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <label>Slider Title</label>
                    <input type="text" class="form-control form-control-sm required" name="slider_title" id="slider_title" value="<?php if(isset($slider_title)){ echo $slider_title; } ?>" placeholder="Slider Title" required>
                  </div>
                  <div class="form-group col-md-12 select_sm">
                    <label>Slider Possition</label>
                    <select class="form-control select2" name="slider_possition" id="slider_possition" data-placeholder="Select Slider Possition" required>
                      <option value="">Select Slider Possition</option>
                      <option value="1">Possition 1</option>
                      <option value="2">Possition 2</option>
                      <option value="3">Possition 3</option>
                      <option value="4">Possition 4</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Select Image</label>
                    <!-- <label>Image Size Must Be 1920px * 600px</label> -->
                    <input type="file" name="slider_img" id="slider_img" class="form-control form-control-sm" id="exampleInputFile">
                  </div>
                  <div class="form-group col-md-6">
                  <div class="form-check">
                    <input type="checkbox" name="slider_status" <?php if(isset($slider_status)&& $slider_status=='0') { echo 'checked'; } ?> value="0" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Disable This</label>
                  </div>
                </div>
                  <?php if(isset($slider_img)){ ?>
                  <div class="form-group col-md-6">
                    <img style="height:150px; width:150px;" src="<?php echo base_url(); ?>assets/images/slider/<?php echo $slider_img; ?>" alt="">
                  </div>
                  <input type="hidden" name="img_old" value="<?php echo $slider_img; ?>">
                  <?php } ?>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</body>
</html>
