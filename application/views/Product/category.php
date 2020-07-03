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
            <h1>Category</h1>
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
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12 select_sm">
                        <label>Main Category</label>
                        <select class="form-control select2" name="main_category_id" id="main_category_id" data-placeholder="Select Main Category" required>
                          <option value="">Select Main Category</option>
                          <option value="-1" <?php if(isset($main_category_id) && $main_category_id == '-1'){ echo 'selected'; } ?>>Leave as Parent</option>
                          <?php if(isset($main_category_list)){ foreach ($main_category_list as $list) { ?>
                          <option value="<?php echo $list->category_id; ?>" <?php if(isset($category_id) && $category_id == $list->category_id){ echo 'selected'; } ?>><?php echo $list->category_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Category Name</label>
                        <input type="text" class="form-control form-control-sm" name="category_name" id="category_name" value="<?php if(isset($category_name)){ echo $category_name; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Image</label>
                        <input type="file" class="form-control form-control-sm" name="category_img" id="category_img" class="form-control" id="exampleInputFile" required>
                      </div>
                      <?php if(isset($update)){ ?>
                        <div class="form-group col-md-6">
                          <img width="50%" src="<?php echo base_url(); ?>assets/images/category/<?php echo $category_img; ?>" alt="Manufacturer Image">
                        </div>
                        <input type="hidden" name="old_img" value="<?php echo $category_img; ?>">
                      <?php } else{ ?>
                        <div class="form-group col-md-6"></div>
                      <?php } ?>
                      <div class="form-group col-md-6">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="show_on_home" id="show_on_home" value="1" <?php if(isset($show_on_home) && $show_on_home == 1){ echo 'checked'; } ?>>
                          <label for="show_on_home" class="custom-control-label">Show on Homepage</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="category_status" id="category_status" value="1" <?php if(isset($category_status) && $category_status == 1){ echo 'checked'; } elseif (!isset($category_status)){ echo 'checked'; } ?>>
                      <label for="category_status" class="custom-control-label">Active</label>
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
  var category_name1 = $('#category_name').val();
  $('#category_name').on('change',function(){
    var category_name = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"category_name",
             "column_val":category_name,
             "table_name":"category"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#category_name').val(category_name1);
          toastr.error(category_name+' Exist.');
        }
      }
    });
  });
</script>
</body>
</html>
