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
            <h1>Coupon</h1>
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
                <h3 class="card-title">Add Coupon</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-10 offset-md-1 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Coupon Code </label>
                        <input type="text" class="form-control form-control-sm" name="coupon_code" id="coupon_code" value="<?php if(isset($coupon_info['coupon_code'])){ echo $coupon_info['coupon_code']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Coupon Expiry Date</label>
                        <input type="text" class="form-control form-control-sm" name="coupon_exp_date" value="<?php if(isset($coupon_info['coupon_exp_date'])){ echo $coupon_info['coupon_exp_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Description (Optional)</label>
                        <input type="text" class="form-control form-control-sm" name="coupon_desc" id="coupon_desc" value="<?php if(isset($coupon_info['coupon_desc'])){ echo $coupon_info['coupon_desc']; } ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Coupon Discount Amount</label>
                        <input type="number" min="1" class="form-control form-control-sm" name="coupon_amt" id="coupon_amt" value="<?php if(isset($coupon_info['coupon_amt'])){ echo $coupon_info['coupon_amt']; } ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Minimum Spend</label>
                        <input type="number" min="0" step="1" class="form-control form-control-sm" name="coupon_min_spend" id="coupon_min_spend" value="<?php if(isset($coupon_info['coupon_min_spend'])){ echo $coupon_info['coupon_min_spend']; } ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Maximum Spend</label>
                        <input type="number" min="0" step="1" class="form-control form-control-sm" name="coupon_max_spend" id="coupon_max_spend" value="<?php if(isset($coupon_info['coupon_max_spend'])){ echo $coupon_info['coupon_max_spend']; } ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Usage Limit Per User</label>
                        <input type="number" min="0" step="1" class="form-control form-control-sm" name="limit_per_user" id="limit_per_user" value="<?php if(isset($coupon_info['limit_per_user'])){ echo $coupon_info['limit_per_user']; } ?>" >
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer row m-0">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="coupon_status" id="coupon_status" value="1"  <?php if(isset($coupon_info['coupon_status']) && $coupon_info['coupon_status'] == 1){ echo 'checked'; } elseif (!isset($coupon_info['coupon_status'])){ echo 'checked'; } ?>>
                      <label for="coupon_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>Product/coupon_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
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
