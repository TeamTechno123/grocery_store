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
                <h3 class="card-title">Order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Order No.</label>
                        <input type="number" class="form-control form-control-sm" name="order_no" id="order_no" value="<?php if(isset($order_info)){ echo $order_info['order_no']; } else{ echo $order_no; } ?>" readonly  required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Order Date.</label>
                        <input type="text" class="form-control form-control-sm" name="order_date"  value="<?php if(isset($order_info)){ echo $order_info['order_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Customer</label>
                        <select class="form-control select2 form-control-sm" name="customer_id" id="customer_id" data-placeholder="Select Customer">
                          <option value="">Select Customer</option>
                          <?php if(isset($customer_list)){ foreach ($customer_list as $list) { ?>
                          <option value="<?php echo $list->customer_id; ?>" <?php if(isset($order_info) && $order_info['customer_id'] == $list->customer_id){ echo 'selected'; } ?>><?php echo '[#'.$list->customer_id.'] '.$list->customer_fname.' '.$list->customer_lname; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12 row pr-2">
                        <div class="form-group col-md-12">
                          <label>Shipping Address</label>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Firstname.</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_fname" id="order_cust_fname" value="<?php if(isset($order_info)){ echo $order_info['order_cust_fname']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Lastname.</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_lname" id="order_cust_lname" value="<?php if(isset($order_info)){ echo $order_info['order_cust_lname']; } ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label>Address.</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_addr" id="order_cust_addr" value="<?php if(isset($order_info)){ echo $order_info['order_cust_addr']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>City</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_city" id="order_cust_city" value="<?php if(isset($order_info)){ echo $order_info['order_cust_city']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Pin Code</label>
                          <input type="number" class="form-control form-control-sm" name="order_cust_pin" id="order_cust_pin" value="<?php if(isset($order_info)){ echo $order_info['order_cust_pin']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Mobile</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_mob" id="order_cust_mob" value="<?php if(isset($order_info)){ echo $order_info['order_cust_mob']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Email</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_email" id="order_cust_email" value="<?php if(isset($order_info)){ echo $order_info['order_cust_email']; } ?>" required>
                        </div>
                      </div>
                      <!-- <div class="form-group col-md-6 row pl-4">
                        <div class="form-group col-md-4">
                          <label>Shipping Address</label>
                        </div>
                        <div class="form-group col-md-8">
                          <div class="custom-control custom-checkbox ml-2">
                            <input class="custom-control-input" type="checkbox" name="is_addr_same" id="is_addr_same" value="1" <?php if(isset($order_info) && $order_info['is_addr_same'] == 1){ echo 'checked'; } elseif (!isset($order_info)){ echo 'checked'; } ?>>
                            <label for="is_addr_same" class="custom-control-label">Same As Billing Address</label>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Firstname.</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_s_fname" id="order_cust_s_fname" value="<?php if(isset($order_info)){ echo $order_info['order_cust_s_fname']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Lastname.</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_s_lname" id="order_cust_s_lname" value="<?php if(isset($order_info)){ echo $order_info['order_cust_s_lname']; } ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label>Address.</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_s_addr" id="order_cust_s_addr" value="<?php if(isset($order_info)){ echo $order_info['order_cust_s_addr']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>City</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_s_city" id="order_cust_s_city" value="<?php if(isset($order_info)){ echo $order_info['order_cust_s_city']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Pin Code</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_s_pin" id="order_cust_s_pin" value="<?php if(isset($order_info)){ echo $order_info['order_cust_s_pin']; } ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Mobile</label>
                          <input type="text" class="form-control form-control-sm" name="order_cust_s_mob" id="order_cust_s_mob" value="<?php if(isset($order_info)){ echo $order_info['order_cust_s_mob']; } ?>" required>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>

              <div class="form-group col-md-6 mt-3">
                <label style="font-size:16px !important;" >Add Order Product</label>
              </div>
              <div class="col-md-6 mt-3 text-right">
                <!-- <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">Add Row</button> -->
              </div>
              <div class="form-group col-md-8 offset-md-2 select_sm">
                <label>Product</label>
                <select class="form-control select2 form-control-sm" name="select_product" id="select_product" data-placeholder="Select Customer">
                  <option value="">Select Product</option>
                  <?php foreach ($product_list as $list) { ?>
                    <option value="<?php echo $list->pro_attri_id; ?>"><?php echo $list->product_name.' - '.$list->pro_attri_weight.' '.$list->unit_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-2 mt-3">
                <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1 mt-2" width="150px">Add Product</button>
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
                      <th class="wt_50"></th>
                    </tr>
                    </thead>
                    <?php if(isset($order_pro_list)){ $i=0; foreach ($order_pro_list as $list) { ?>
                      <input type="hidden" name="input[<?php echo $i; ?>][order_pro_id]" value="<?php echo $list->order_pro_id; ?>">
                      <tr>
                        <td>
                          <input type="text" class="form-control form-control-sm" value="<?php echo $list->order_pro_name.' - '.$list->order_pro_weight.' '.$list->order_pro_unit; ?>" required readonly>
                          <input type="hidden" id="pro_attri_id_<?php echo $list->product_id; ?>_<?php echo $list->pro_attri_id; ?>" pro_attri_id="<?php echo $list->pro_attri_id; ?>"  product_id="<?php echo $list->product_id; ?>">

                          <input type="hidden" name="input[<?php echo $i; ?>][product_id]" value="<?php echo $list->product_id; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][pro_attri_id]" value="<?php echo $list->pro_attri_id; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][order_pro_name]" value="<?php echo $list->order_pro_name; ?>">
                          <input type="hidden" class="order_pro_weight" name="input[<?php echo $i; ?>][order_pro_weight]" value="<?php echo $list->order_pro_weight; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][order_pro_unit]" value="<?php echo $list->order_pro_unit; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][order_pro_mrp]" value="<?php echo $list->order_pro_mrp; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][order_pro_dis_per]" value="<?php echo $list->order_pro_dis_per; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][order_pro_dis_amt]" value="<?php echo $list->order_pro_dis_amt; ?>">
                          <input type="hidden" class="order_pro_gst_per" name="input[<?php echo $i; ?>][order_pro_gst_per]" value="<?php echo $list->order_pro_gst_per; ?>">
                          <input type="hidden" class="order_pro_gst_amt" name="input[<?php echo $i; ?>][order_pro_gst_amt]" value="<?php echo $list->order_pro_gst_amt; ?>">
                          <input type="hidden" class="order_pro_basic_amt" name="input[<?php echo $i; ?>][order_pro_basic_amt]" value="<?php echo $list->order_pro_basic_amt; ?>">
                        </td>
                        <td class="wt_150">
                          <input type="number" min="1.00" step="0.01" class="form-control form-control-sm order_pro_price" name="input[<?php echo $i; ?>][order_pro_price]" value="<?php echo $list->order_pro_price; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="hidden" class="order_pro_tot_weight" name="input[<?php echo $i; ?>][order_pro_tot_weight]" value="<?php echo $list->order_pro_tot_weight; ?>">
                          <input type="number" min="0.01" step="0.01" class="form-control form-control-sm order_pro_qty" name="input[<?php echo $i; ?>][order_pro_qty]" value="<?php echo $list->order_pro_qty; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm order_pro_amt" name="input[<?php echo $i; ?>][order_pro_amt]" value="<?php echo $list->order_pro_amt; ?>" required readonly>
                        </td>
                        <td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>
                      </tr>
                    <?php $i++; } } ?>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Basic Amount</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="order_amount" id="order_amount" value="<?php if(isset($order_info)){ echo $order_info['order_amount']; } ?>" required readonly>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>GST</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="order_gst" id="order_gst" value="<?php if(isset($order_info)){ echo $order_info['order_gst']; } ?>"  readonly>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Shipping Charges</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="order_shipping_amt" id="order_shipping_amt" value="<?php if(isset($order_info)){ echo $order_info['order_shipping_amt']; } ?>" >
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Total Amount</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="order_total_amount" id="order_total_amount" value="<?php if(isset($order_info)){ echo $order_info['order_total_amount']; } ?>" required readonly>
              </div>

            </div>
                <div class="card-footer row">
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
  // Check Pincode..
    var order_cust_pin1 = $('#order_cust_pin').val();
    $('#order_cust_pin').on('change',function(){
      var order_cust_pin = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/check_duplication',
        type: 'POST',
        data: {"column_name":"tahsil_pincode_no",
               "column_val":order_cust_pin,
               "table_name":"tahsil_pincode"},
        context: this,
        success: function(result){
          if(result == 0){
            $('#order_cust_pin').val(order_cust_pin1);
            toastr.error(order_cust_pin+' is Invalid.');
            $('#order_cust_pin').focus();
          }
        }
      });
    });

    $("#customer_id").on("change", function(){
      var customer_id =  $('#customer_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>Order/get_cust_info',
        type: 'POST',
        data: {"customer_id":customer_id},
        context: this,
        success: function(result){
  	       // If json_encode responce..
  	        var data = JSON.parse(result);
            $('#order_cust_fname').val(data[0]['customer_fname']);
            $('#order_cust_lname').val(data[0]['customer_lname']);
            $('#order_cust_addr').val(data[0]['customer_address']);
            $('#order_cust_city').val(data[0]['customer_city']);
            $('#order_cust_pin').val(data[0]['customer_pin']);
            $('#order_cust_mob').val(data[0]['customer_mobile']);
            $('#order_cust_email').val(data[0]['customer_email']);
            // alert(data[0]['application_date']);
        }
      });
    });

  // $('#is_addr_same').change(function() {
  //   if(this.checked) {
  //     $('#order_cust_s_fname, #order_cust_s_lname, #order_cust_s_addr, #order_cust_s_city, #order_cust_s_pin, #order_cust_s_mob').attr('disabled',true);
  //   } else{
  //     $('#order_cust_s_fname, #order_cust_s_lname, #order_cust_s_addr, #order_cust_s_city, #order_cust_s_pin, #order_cust_s_mob').attr('disabled',false);
  //   }
  // });
  //
  // // Shipping Address...
  // $(document).ready(function(){
  //   if ($('#is_addr_same').prop('checked')==true){
  //     $('#order_cust_s_fname, #order_cust_s_lname, #order_cust_s_addr, #order_cust_s_city, #order_cust_s_pin, #order_cust_s_mob').attr('disabled',true);
  //   } else{
  //     $('#order_cust_s_fname, #order_cust_s_lname, #order_cust_s_addr, #order_cust_s_city, #order_cust_s_pin, #order_cust_s_mob').attr('disabled',false);
  //   }
  // });

  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>;
  <?php } else { ?>
  var i = 0;
  <?php } ?>

  $('#add_row').click(function(){
    var pro_attri_id = $('#select_product').find("option:selected").val();

    if(pro_attri_id){
      $.ajax({
        url:'<?php echo base_url(); ?>Order/get_product_by_attr_id',
        type: 'POST',
        data: {"pro_attri_id":pro_attri_id},
        context: this,
        success: function(result){
          var data = JSON.parse(result)
          // alert(data['pro_attri_mrp']);
          var product_id =  data['product_id'];
          var product_name =  data['product_name'];
          var tax_rate =  data['tax_rate'];
          var pro_attri_weight =  data['pro_attri_weight'];
          var pro_attri_unit =  data['unit_name'];
          var pro_attri_mrp =  data['pro_attri_mrp'];
          var pro_attri_price =  data['pro_attri_price'];
          var pro_attri_dis_per =  data['pro_attri_dis_per'];
          var pro_attri_dis_amt =  data['pro_attri_dis_amt'];
          product_order(product_id,tax_rate,product_name,pro_attri_weight,pro_attri_unit,pro_attri_mrp,pro_attri_price,pro_attri_dis_per,pro_attri_dis_amt);
        }
      });

      function product_order(product_id,tax_rate,product_name,pro_attri_weight,pro_attri_unit,pro_attri_mrp,pro_attri_price,pro_attri_dis_per,pro_attri_dis_amt){
        var item_exist_id = $('input[pro_attri_id="'+pro_attri_id+'"][product_id="'+product_id+'"]').attr('id');
        if(item_exist_id){
          var old_qty = $('#'+item_exist_id+'').closest("tr").find('.order_pro_qty').val();
          if(old_qty == ''){ old_qty = 0; }
          var old_qty = parseFloat(old_qty);
          var new_qty = old_qty + 1;
          $('#'+item_exist_id+'').closest("tr").find('.order_pro_qty').val(new_qty);
        } else{
          var item_exist_id = 'pro_attri_id_'+product_id+'_'+pro_attri_id+'';
          i++;
          var row = ''+
          '<tr>'+
            '<td>'+
              '<input type="text" class="form-control form-control-sm" value="'+product_name+' - '+pro_attri_weight+' '+pro_attri_unit+'" required readonly>'+
              '<input type="hidden" id="pro_attri_id_'+product_id+'_'+pro_attri_id+'" pro_attri_id="'+pro_attri_id+'"  product_id="'+product_id+'">'+

              '<input type="hidden" name="input['+i+'][product_id]" value="'+product_id+'">'+
              '<input type="hidden" name="input['+i+'][pro_attri_id]" value="'+pro_attri_id+'">'+
              '<input type="hidden" name="input['+i+'][order_pro_name]" value="'+product_name+'">'+
              '<input type="hidden" class="order_pro_weight" name="input['+i+'][order_pro_weight]" value="'+pro_attri_weight+'">'+
              '<input type="hidden" name="input['+i+'][order_pro_unit]" value="'+pro_attri_unit+'">'+
              '<input type="hidden" name="input['+i+'][order_pro_mrp]" value="'+pro_attri_mrp+'">'+
              '<input type="hidden" name="input['+i+'][order_pro_dis_per]" value="'+pro_attri_dis_per+'">'+
              '<input type="hidden" name="input['+i+'][order_pro_dis_amt]" value="'+pro_attri_dis_amt+'">'+
              '<input type="hidden" class="order_pro_gst_per" name="input['+i+'][order_pro_gst_per]" value="'+tax_rate+'">'+
              '<input type="hidden" class="order_pro_gst_amt" name="input['+i+'][order_pro_gst_amt]" value="">'+
              '<input type="hidden" class="order_pro_basic_amt" name="input['+i+'][order_pro_basic_amt]" value="">'+
            '</td>'+
            '<td class="wt_150">'+
              '<input type="number" min="1.00" step="0.01" class="form-control form-control-sm order_pro_price" name="input['+i+'][order_pro_price]" value="'+pro_attri_price+'" required>'+
            '</td>'+
            '<td class="wt_150">'+
              '<input type="hidden" class="order_pro_tot_weight" name="input['+i+'][order_pro_tot_weight]" value="'+pro_attri_weight+'">'+
              '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm order_pro_qty" name="input['+i+'][order_pro_qty]" value="1" required>'+
            '</td>'+
            '<td class="wt_150">'+
              '<input type="number" min="0.01" step="0.01"  class="form-control form-control-sm order_pro_amt" name="input['+i+'][order_pro_amt]" value="'+pro_attri_price+'" required readonly>'+
            '</td>'+
            '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
          '</tr>';
          $('#myTable').append(row);
        }

        var order_pro_qty =  $('#'+item_exist_id+'').closest('tr').find('.order_pro_qty').val();
        var order_pro_price =  $('#'+item_exist_id+'').closest('tr').find('.order_pro_price').val();
        var order_pro_weight = $('#'+item_exist_id+'').closest('tr').find('.order_pro_weight').val();
        var order_pro_gst_per = $('#'+item_exist_id+'').closest('tr').find('.order_pro_gst_per').val();

        if(order_pro_qty == ''){ order_pro_qty = 0; }
        if(order_pro_price == ''){ order_pro_price = 0; }
        if(order_pro_weight == ''){ order_pro_weight = 0; }
        if(order_pro_gst_per == ''){ order_pro_gst_per = 0; }
        var order_pro_price = parseFloat(order_pro_price);
        var order_pro_qty = parseFloat(order_pro_qty);
        var order_pro_weight = parseFloat(order_pro_weight);
        var order_pro_gst_per = parseFloat(order_pro_gst_per);


        var order_pro_tot_weight = order_pro_weight * order_pro_qty;
        $('#'+item_exist_id+'').closest('tr').find('.order_pro_tot_weight').val(order_pro_tot_weight.toFixed(2));

        var order_pro_amt = order_pro_price * order_pro_qty;
        $('#'+item_exist_id+'').closest('tr').find('.order_pro_amt').val(order_pro_amt.toFixed(2));

        var order_pro_gst_amt = order_pro_amt - (order_pro_amt * (100/(100 + order_pro_gst_per)));
        $('#'+item_exist_id+'').closest('tr').find('.order_pro_gst_amt').val(order_pro_gst_amt.toFixed(2));

        var order_pro_basic_amt = order_pro_amt - order_pro_gst_amt;
        $('#'+item_exist_id+'').closest('tr').find('.order_pro_basic_amt').val(order_pro_basic_amt.toFixed(2));

        var order_amount = 0;
        $(".order_pro_basic_amt").each(function() {
          var order_pro_basic_amt = $(this).val();
          if(!isNaN(order_pro_basic_amt) && order_pro_basic_amt.length != 0) {
            order_amount += parseFloat(order_pro_basic_amt);
          }
        });
        $('#order_amount').val(order_amount.toFixed(2));

        var order_gst = 0;
        $(".order_pro_gst_amt").each(function() {
          var order_pro_gst_amt = $(this).val();
          if(!isNaN(order_pro_gst_amt) && order_pro_gst_amt.length != 0) {
            order_gst += parseFloat(order_pro_gst_amt);
          }
        });
        $('#order_gst').val(order_gst.toFixed(2));

        var order_shipping_amt = $('#order_shipping_amt').val();
        if(order_shipping_amt == ''){ order_shipping_amt = 0; }
        var order_shipping_amt = parseFloat(order_shipping_amt.toFixed(2));

        var order_total_amount = order_amount + order_gst + order_shipping_amt;
        $('#order_total_amount').val(order_total_amount.toFixed(2));
      }
    } else{
      toastr.error('Select Product From List');
    }
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
    var order_pro_price =   $(this).closest('tr').find('.order_pro_price').val();
    var order_pro_qty =   $(this).closest('tr').find('.order_pro_qty').val();
    var order_pro_gst_amt =   $(this).closest('tr').find('.order_pro_gst_amt').val();
    var order_gst =   $('#order_gst').val();
    var order_shipping_amt =   $('#order_shipping_amt').val();
    if(order_pro_price == ''){ order_pro_price = 0; }
    if(order_pro_qty == ''){ order_pro_qty = 0; }
    if(order_pro_gst_amt == ''){ order_pro_gst_amt = 0; }
    if(order_gst == ''){ order_gst = 0; }
    if(order_shipping_amt == ''){ order_shipping_amt = 0; }
    var order_pro_price = parseFloat(order_pro_price);
    var order_pro_qty = parseFloat(order_pro_qty);
    var order_pro_gst_amt = parseFloat(order_pro_gst_amt);
    var order_shipping_amt = parseFloat(order_shipping_amt);

    // var order_pro_amt = order_pro_price * order_pro_qty;
    // $(this).closest('tr').find('.order_pro_amt').val(order_pro_amt.toFixed(2));

    var order_amount = 0;
    $(".order_pro_basic_amt").each(function() {
      var order_pro_basic_amt = $(this).val();
      if(!isNaN(order_pro_basic_amt) && order_pro_basic_amt.length != 0) {
        order_amount += parseFloat(order_pro_basic_amt);
      }
    });
    $('#order_amount').val(order_amount.toFixed(2));

    var order_gst = 0;
    $(".order_pro_gst_amt").each(function() {
      var order_pro_gst_amt = $(this).val();
      if(!isNaN(order_pro_gst_amt) && order_pro_gst_amt.length != 0) {
        order_gst += parseFloat(order_pro_gst_amt);
      }
    });
    $('#order_gst').val(order_gst.toFixed(2));

    var order_total_amount = order_amount + order_gst + order_shipping_amt;
    $('#order_total_amount').val(order_total_amount.toFixed(2));
  });

  $('#myTable').on('change', 'input.order_pro_price, input.order_pro_qty', function () {
    var order_pro_price =   $(this).closest('tr').find('.order_pro_price').val();
    var order_pro_qty =   $(this).closest('tr').find('.order_pro_qty').val();
    var order_pro_weight = $(this).closest('tr').find('.order_pro_weight').val();
    var order_pro_gst_per = $(this).closest('tr').find('.order_pro_gst_per').val();
    var order_gst =   $('#order_gst').val();
    var order_shipping_amt =   $('#order_shipping_amt').val();

    if(order_pro_price == ''){ order_pro_price = 0; }
    if(order_pro_qty == ''){ order_pro_qty = 0; }
    if(order_pro_weight == ''){ order_pro_weight = 0; }
    if(order_pro_gst_per == ''){ order_pro_gst_per = 0; }
    if(order_gst == ''){ order_gst = 0; }
    if(order_shipping_amt == ''){ order_shipping_amt = 0; }

    var order_pro_price = parseFloat(order_pro_price);
    var order_pro_qty = parseFloat(order_pro_qty);
    var order_pro_weight = parseFloat(order_pro_weight);
    var order_pro_gst_per = parseFloat(order_pro_gst_per);
    var order_gst = parseFloat(order_gst);
    var order_shipping_amt = parseFloat(order_shipping_amt);

    var order_pro_tot_weight = order_pro_qty * order_pro_weight;
    $(this).closest('tr').find('.order_pro_tot_weight').val(order_pro_tot_weight.toFixed(2));

    var order_pro_amt = order_pro_price * order_pro_qty;
    $(this).closest('tr').find('.order_pro_amt').val(order_pro_amt.toFixed(2));

    var order_pro_gst_amt = order_pro_amt - (order_pro_amt * (100/(100 + order_pro_gst_per)));
    $(this).closest('tr').find('.order_pro_gst_amt').val(order_pro_gst_amt.toFixed(2));

    var order_pro_basic_amt = order_pro_amt - order_pro_gst_amt;
    $(this).closest('tr').find('.order_pro_basic_amt').val(order_pro_basic_amt.toFixed(2));

    var order_amount = 0;
    $(".order_pro_basic_amt").each(function() {
      var order_pro_basic_amt = $(this).val();
      if(!isNaN(order_pro_basic_amt) && order_pro_basic_amt.length != 0) {
        order_amount += parseFloat(order_pro_basic_amt);
      }
    });
    $('#order_amount').val(order_amount.toFixed(2));

    var order_gst = 0;
    $(".order_pro_gst_amt").each(function() {
      var order_pro_gst_amt = $(this).val();
      if(!isNaN(order_pro_gst_amt) && order_pro_gst_amt.length != 0) {
        order_gst += parseFloat(order_pro_gst_amt);
      }
    });
    $('#order_gst').val(order_gst.toFixed(2));

    var order_total_amount = order_amount + order_gst + order_shipping_amt;
    $('#order_total_amount').val(order_total_amount.toFixed(2));
  });

  $('#order_shipping_amt').on('change', function () {
    var order_shipping_amt = $(this).val();
    var order_amount = $('#order_amount').val();
    var order_gst = $('#order_gst').val();
    if(order_shipping_amt == ''){ order_shipping_amt = 0; }
    if(order_amount == ''){ order_amount = 0; }
    if(order_gst == ''){ order_gst = 0; }
    var order_shipping_amt = parseFloat(order_shipping_amt);
    var order_amount = parseFloat(order_amount);
    var order_gst = parseFloat(order_gst);
    $('#order_total_amount').val(order_shipping_amt + order_amount + order_gst);
  });

  </script>
</body>
</html>
