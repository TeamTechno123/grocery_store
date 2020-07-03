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
            <h1>Receipt</h1>
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
                <h3 class="card-title">Receipt</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Receipt No.</label>
                        <input type="number" class="form-control form-control-sm" name="receipt_no" id="receipt_no" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_no']; } else{ echo $receipt_no; } ?>" readonly  required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Receipt Date</label>
                        <input type="text" class="form-control form-control-sm" name="receipt_date"  value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Customer</label>
                        <select class="form-control select2 form-control-sm" name="customer_id" id="customer_id" data-placeholder="Select Customer">
                          <option value="">Select Customer</option>
                          <?php if(isset($customer_list)){ foreach ($customer_list as $list) { ?>
                          <option value="<?php echo $list->customer_id; ?>" <?php if(isset($receipt_info) && $receipt_info['customer_id'] == $list->customer_id){ echo 'selected'; } ?>><?php echo '[#'.$list->customer_id.'] '.$list->customer_fname.' '.$list->customer_lname; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Outstanding Amount</label>
                        <input type="number" class="form-control form-control-sm" name="outstanding_amt" id="outstanding_amt" value="<?php if(isset($receipt_info)){ echo $receipt_info['outstanding_amt']; } ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Amount</label>
                        <input type="number" min="1" class="form-control form-control-sm" name="receipt_amt" id="receipt_amt" value="<?php if(isset($receipt_info)){ echo $receipt_info['receipt_amt']; } ?>" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control form-control-sm" name="receipt_desc" id="receipt_desc" rows="3"><?php if(isset($receipt_info)){ echo $receipt_info['receipt_desc']; } ?></textarea>
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
    $('#customer_id').on('change', function(){
      var customer_id = $(this).find("option:selected").val();
      $.ajax({
        method:"post",
        data:{"customer_id":customer_id},
        url:'get_customer_outstanding',
        success:function(result){
          $('#outstanding_amt').val(result);
        }
      });
    });
  </script>

</body>
</html>
