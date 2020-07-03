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
            <h1>Payment Status</h1>
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
                <h3 class="card-title">Change Order Payment Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Date</label>
                        <input type="text" class="form-control form-control-sm" value="<?php if(isset($order_details)){ echo $order_details['order_date']; } ?>" readonly>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Customer Name</label>
                        <input type="text" class="form-control form-control-sm" value="<?php if(isset($order_details)){ echo $order_details['order_cust_fname'].' '.$order_details['order_cust_lname']; } ?>" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Amount</label>
                        <input type="number" min="1" class="form-control form-control-sm" value="<?php if(isset($order_details)){ echo $order_details['order_total_amount']; } ?>" readonly>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Status</label>
                        <select class="form-control select2 form-control-sm" id="order_status" data-placeholder="Select Status" disabled>
                          <option value="">Select Status</option>
                          <?php if(isset($order_status_list)){ foreach ($order_status_list as $list) {
                            if($list->order_status_id == 4 || $list->order_status_id == 5 ||$list->order_status_id == 6){
                          ?>
                          <option value="<?php echo $list->order_status_id; ?>" <?php if(isset($order_details) && $order_details['order_status'] == $list->order_status_id){ echo 'selected'; } ?>><?php echo $list->order_status_name; ?></option>
                        <?php } } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Payment Status</label>
                        <select class="form-control select2 form-control-sm" name="payment_status" id="payment_status" data-placeholder="Select Payment Status">
                          <option value="">Payment Status</option>
                          <option value="1">Paid</option>
                          <option value="2">Order Canceled</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row m-0">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <a href="<?php echo base_url() ?>Order/delivery_boy_order_list" class="btn btn-default ml-4">Cancel</a>
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
</body>
</html>
