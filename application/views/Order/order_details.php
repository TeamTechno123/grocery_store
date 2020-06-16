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
            <h1>Order</h1>
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
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Order No. : </label> <?php if(isset($order_info)){ echo $order_info['order_no']; } else{ echo $order_no; } ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Order Date</label> : <?php if(isset($order_info)){ echo $order_info['order_date']; } ?>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <?php $customer_id = $order_info['customer_id'];
                        $customer_info = $this->User_Model->get_info_arr_fields('customer_fname,customer_lname','customer_id', $customer_id, 'customer'); ?>
                        <label>Customer : </label> <?php echo $customer_info[0]['customer_fname'].' '.$customer_info[0]['customer_lname'] ?>
                      </div>
                      <div class="form-group col-md-12 row pr-2" >
                        <div class="form-group col-md-12">
                          <label>Billing Address : </label>
                        </div>
                        <div class="col-md-6">
                          <label>Name : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_fname']; } ?> <?php if(isset($order_info)){ echo $order_info['order_cust_lname']; } ?>
                        </div>                        
                        <div class="col-md-12">
                          <label>Address : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_addr']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>City : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_city']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>Pin Code : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_pin']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>Mobile : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_mob']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>Email : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_email']; } ?>
                        </div>
                      </div>
                      <!-- <div class="form-group col-md-6 row pl-4">
                        <div class="form-group col-md-12">
                          <label>Shipping Address : </label>
                        </div>
                        <div class="col-md-6">
                          <label>Name : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_s_fname']; } ?> <?php if(isset($order_info)){ echo $order_info['order_cust_s_lname']; } ?>
                        </div>
                        <div class="col-md-12">
                          <label>Address : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_s_addr']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>City : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_s_city']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>Pin Code : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_s_pin']; } ?>
                        </div>
                        <div class="col-md-6">
                          <label>Mobile : </label> <?php if(isset($order_info)){ echo $order_info['order_cust_s_mob']; } ?>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>

              <div class="form-group col-md-12 mt-3 text-center">
                <label style="font-size:16px !important;" >Product Details</label>
              </div>

              <div class="col-md-12">
                <div class="" style="overflow-x:auto;">
                  <table id="myTable" class="table table-bordered tbl_list">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th class="wt_150">Price</th>
                      <th class="wt_150">Qty</th>
                      <th class="wt_150">Amount</th>
                    </tr>
                    </thead>
                    <?php if(isset($order_pro_list)){ $i=0; foreach ($order_pro_list as $list) { ?>
                      <input type="hidden" name="input[<?php echo $i; ?>][order_pro_id]" value="<?php echo $list->order_pro_id; ?>">
                      <tr>
                        <td>
                          <?php echo $list->order_pro_name; ?>
                        </td>
                        <td class="wt_150">
                          <?php echo $list->order_pro_price; ?>
                        </td>
                        <td class="wt_150">
                          <?php echo $list->order_pro_qty; ?>
                        </td>
                        <td class="wt_150">
                          <?php echo $list->order_pro_amt; ?>
                        </td>
                      </tr>
                    <?php $i++; } } ?>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group col-md-3 offset-md-7 text-right"><label>Amount : </label></div>
              <div class="form-group col-md-2">
                <?php if(isset($order_info)){ echo $order_info['order_amount']; } ?>
              </div>
              <div class="form-group col-md-3 offset-md-7 text-right"><label>GST : </label></div>
              <div class="form-group col-md-2">
                <?php if(isset($order_info)){ echo $order_info['order_gst']; } ?>
              </div>
              <div class="form-group col-md-3 offset-md-7 text-right"><label>Shipping Charges : </label></div>
              <div class="form-group col-md-2">
                <?php if(isset($order_info)){ echo $order_info['order_shipping_amt']; } ?>
              </div>
              <div class="form-group col-md-3 offset-md-7 text-right"><label>Total Amount : </label></div>
              <div class="form-group col-md-2">
                <?php if(isset($order_info)){ echo $order_info['order_total_amount']; } ?>
              </div>

            </div>
                <!-- <div class="card-footer row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/manufacturer_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div> -->
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
