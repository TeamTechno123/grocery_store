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
            <h1>Employee Cash</h1>
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
                <h3 class="card-title">Employee Cash</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Employee Mobile Number</label>
                        <input type="number" min="1" class="form-control form-control-sm" id="employee_mob_num" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_mob_num']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6 text-left">
                        <button type="button" id="search_employee" class="btn btn-sm btn-primary mt-4">Search </button>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Employee Name</label>
                        <input type="hidden" name="employee_user_id" id="employee_user_id" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_user_id']; } ?>">
                        <input type="Text" class="form-control form-control-sm" id="employee_name" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_name']; } ?>" required readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Employee City</label>
                        <input type="Text" class="form-control form-control-sm" id="employee_city" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_city']; } ?>"  readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Employee Mobile</label>
                        <input type="number" class="form-control form-control-sm" id="employee_mobile" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_mobile']; } ?>" required readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Employee Email</label>
                        <input type="Text" class="form-control form-control-sm" id="employee_email" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_email']; } ?>"  readonly>
                      </div>
                      <div class="col-md-12"><hr></div>
                      <div class="form-group col-md-6">
                        <label>Amount</label>
                        <input type="number" min="1" class="form-control form-control-sm" name="employee_cash_amt" id="employee_cash_amt" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_cash_amt']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date</label>
                        <input type="text" class="form-control form-control-sm" name="employee_cash_date" value="<?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_cash_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control form-control-sm" name="employee_cash_desc" id="employee_cash_desc" rows="3"><?php if(isset($employee_cash_info)){ echo $employee_cash_info['employee_cash_desc']; } ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row m-0">
                  <div class="col-md-6">
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

  <script type="text/javascript">
    $('#search_employee').on('click', function(){
      var employee_mob_num = $("#employee_mob_num").val();
      $.ajax({
        method:"post",
        data:{"employee_mob_num":employee_mob_num},
        url:'get_employee_details',
        dataType: 'json',
        success:function(result){
          if(result == ''){
            $(document).ready(function(){
              toastr.error('Invalid Mobile Number');
            });
          } else{
            $('#employee_user_id').val(result[0].user_id);
            $('#employee_name').val(result[0].user_name);
            $('#employee_city').val(result[0].user_city);
            $('#employee_mobile').val(result[0].user_mobile);
            $('#employee_email').val(result[0].user_email);
          }
        }
      });
    });
  </script>

</body>
</html>
