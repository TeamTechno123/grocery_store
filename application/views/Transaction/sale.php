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
            <h1>Sale</h1>
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
                <h3 class="card-title">Sale</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-10 offset-md-1 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Sale No.</label>
                        <input type="number" class="form-control form-control-sm" name="sale_no" id="sale_no" value="<?php if(isset($sale_info)){ echo $sale_info['sale_no']; } else{ echo $sale_no; } ?>" readonly  required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Sale Date.</label>
                        <input type="text" class="form-control form-control-sm" name="sale_date"  value="<?php if(isset($sale_info)){ echo $sale_info['sale_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Customer</label>
                        <select class="form-control select2 form-control-sm" name="customer_id" id="customer_id" data-placeholder="Select Customer">
                          <option value="">Select Customer</option>
                          <?php if(isset($customer_list)){ foreach ($customer_list as $list) { ?>
                          <option value="<?php echo $list->customer_id; ?>" <?php if(isset($sale_info) && $sale_info['customer_id'] == $list->customer_id){ echo 'selected'; } ?>><?php echo '[#'.$list->customer_id.'] '.$list->customer_fname.' '.$list->customer_lname; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>

              <div class="form-group col-md-6 mt-3">
                <label style="font-size:16px !important;" >Add Sale Product</label>
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
                  <table id="myTable" class="table table-bsaleed tbl_list">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th class="wt_150">Price</th>
                      <th class="wt_150">Qty</th>
                      <th class="wt_150">Amount</th>
                      <th class="wt_50"></th>
                    </tr>
                    </thead>
                    <?php if(isset($sale_pro_list)){ $i=0; foreach ($sale_pro_list as $list) { ?>
                      <input type="hidden" name="input[<?php echo $i; ?>][sale_pro_id]" value="<?php echo $list->sale_pro_id; ?>">
                      <tr>
                        <td>
                          <input type="text" class="form-control form-control-sm" value="<?php echo $list->sale_pro_name.' - '.$list->sale_pro_weight.' '.$list->sale_pro_unit; ?>" required readonly>
                          <input type="hidden" id="pro_attri_id_<?php echo $list->product_id; ?>_<?php echo $list->pro_attri_id; ?>" pro_attri_id="<?php echo $list->pro_attri_id; ?>"  product_id="<?php echo $list->product_id; ?>">

                          <input type="hidden" name="input[<?php echo $i; ?>][product_id]" value="<?php echo $list->product_id; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][pro_attri_id]" value="<?php echo $list->pro_attri_id; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][sale_pro_name]" value="<?php echo $list->sale_pro_name; ?>">
                          <input type="hidden" class="sale_pro_weight" name="input[<?php echo $i; ?>][sale_pro_weight]" value="<?php echo $list->sale_pro_weight; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][sale_pro_unit]" value="<?php echo $list->sale_pro_unit; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][sale_pro_mrp]" value="<?php echo $list->sale_pro_mrp; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][sale_pro_dis_per]" value="<?php echo $list->sale_pro_dis_per; ?>">
                          <input type="hidden" name="input[<?php echo $i; ?>][sale_pro_dis_amt]" value="<?php echo $list->sale_pro_dis_amt; ?>">
                        </td>
                        <td class="wt_150">
                          <input type="number" min="1.00" step="0.01" class="form-control form-control-sm sale_pro_price" name="input[<?php echo $i; ?>][sale_pro_price]" value="<?php echo $list->sale_pro_price; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="hidden" class="sale_pro_tot_weight" name="input[<?php echo $i; ?>][sale_pro_tot_weight]" value="<?php echo $list->sale_pro_tot_weight; ?>">
                          <input type="number" min="0.01" step="0.01" class="form-control form-control-sm sale_pro_qty" name="input[<?php echo $i; ?>][sale_pro_qty]" value="<?php echo $list->sale_pro_qty; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm sale_pro_amt" name="input[<?php echo $i; ?>][sale_pro_amt]" value="<?php echo $list->sale_pro_amt; ?>" required readonly>
                        </td>
                        <td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>
                      </tr>
                    <?php $i++; } } ?>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Amount</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="sale_amount" id="sale_amount" value="<?php if(isset($sale_info)){ echo $sale_info['sale_amount']; } ?>" required readonly>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>GST</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="sale_gst" id="sale_gst" value="<?php if(isset($sale_info)){ echo $sale_info['sale_gst']; } ?>"  readonly>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Shipping Charges</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="sale_shipping_amt" id="sale_shipping_amt" value="<?php if(isset($sale_info)){ echo $sale_info['sale_shipping_amt']; } ?>" >
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Total Amount</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="sale_total_amount" id="sale_total_amount" value="<?php if(isset($sale_info)){ echo $sale_info['sale_total_amount']; } ?>" required readonly>
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
          var pro_attri_weight =  data['pro_attri_weight'];
          var pro_attri_unit =  data['unit_name'];
          var pro_attri_mrp =  data['pro_attri_mrp'];
          var pro_attri_price =  data['pro_attri_price'];
          var pro_attri_dis_per =  data['pro_attri_dis_per'];
          var pro_attri_dis_amt =  data['pro_attri_dis_amt'];
          product_sale(product_id, product_name,pro_attri_weight,pro_attri_unit,pro_attri_mrp,pro_attri_price,pro_attri_dis_per,pro_attri_dis_amt);
        }
      });

      function product_sale(product_id,product_name,pro_attri_weight,pro_attri_unit,pro_attri_mrp,pro_attri_price,pro_attri_dis_per,pro_attri_dis_amt){
        var item_exist_id = $('input[pro_attri_id="'+pro_attri_id+'"][product_id="'+product_id+'"]').attr('id');
        if(item_exist_id){
          var old_qty = $('#'+item_exist_id+'').closest("tr").find('.sale_pro_qty').val();
          if(old_qty == ''){ old_qty = 0; }
          var old_qty = parseFloat(old_qty);
          var new_qty = old_qty + 1;
          $('#'+item_exist_id+'').closest("tr").find('.sale_pro_qty').val(new_qty);
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
              '<input type="hidden" name="input['+i+'][sale_pro_name]" value="'+product_name+'">'+
              '<input type="hidden" class="sale_pro_weight" name="input['+i+'][sale_pro_weight]" value="'+pro_attri_weight+'">'+
              '<input type="hidden" name="input['+i+'][sale_pro_unit]" value="'+pro_attri_unit+'">'+
              '<input type="hidden" name="input['+i+'][sale_pro_mrp]" value="'+pro_attri_mrp+'">'+
              '<input type="hidden" name="input['+i+'][sale_pro_dis_per]" value="'+pro_attri_dis_per+'">'+
              '<input type="hidden" name="input['+i+'][sale_pro_dis_amt]" value="'+pro_attri_dis_amt+'">'+
            '</td>'+
            '<td class="wt_150">'+
              '<input type="number" min="1.00" step="0.01" class="form-control form-control-sm sale_pro_price" name="input['+i+'][sale_pro_price]" value="'+pro_attri_price+'" required>'+
            '</td>'+
            '<td class="wt_150">'+
              '<input type="hidden" class="sale_pro_tot_weight" name="input['+i+'][sale_pro_tot_weight]" value="'+pro_attri_weight+'">'+
              '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm sale_pro_qty" name="input['+i+'][sale_pro_qty]" value="1" required>'+
            '</td>'+
            '<td class="wt_150">'+
              '<input type="number" min="0.01" step="0.01"  class="form-control form-control-sm sale_pro_amt" name="input['+i+'][sale_pro_amt]" value="'+pro_attri_price+'" required readonly>'+
            '</td>'+
            '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
          '</tr>';
          $('#myTable').append(row);
        }

        var sale_pro_qty =  $('#'+item_exist_id+'').closest('tr').find('.sale_pro_qty').val();
        var sale_pro_price =  $('#'+item_exist_id+'').closest('tr').find('.sale_pro_price').val();
        var sale_pro_weight = $('#'+item_exist_id+'').closest('tr').find('.sale_pro_weight').val();

        if(sale_pro_qty == ''){ sale_pro_qty = 0; }
        if(sale_pro_price == ''){ sale_pro_price = 0; }
        if(sale_pro_weight == ''){ sale_pro_weight = 0; }
        var sale_pro_price = parseFloat(sale_pro_price);
        var sale_pro_qty = parseFloat(sale_pro_qty);
        var sale_pro_weight = parseFloat(sale_pro_weight);

        var sale_pro_tot_weight = sale_pro_weight * sale_pro_qty;
        $('#'+item_exist_id+'').closest('tr').find('.sale_pro_tot_weight').val(sale_pro_tot_weight.toFixed(2));

        var sale_pro_amt = sale_pro_price * sale_pro_qty;
        $('#'+item_exist_id+'').closest('tr').find('.sale_pro_amt').val(sale_pro_amt.toFixed(2));

        var sale_amount = 0;
        $(".sale_pro_amt").each(function() {
          var sale_pro_amt = $(this).val();
          if(!isNaN(sale_pro_amt) && sale_pro_amt.length != 0) {
            sale_amount += parseFloat(sale_pro_amt);
          }
        });
        $('#sale_amount').val(sale_amount);
        var sale_shipping_amt = $('#sale_shipping_amt').val();
        if(sale_shipping_amt == ''){ sale_shipping_amt = 0; }
        var sale_shipping_amt = parseFloat(sale_shipping_amt);
        $('#sale_total_amount').val(sale_shipping_amt + sale_amount);
      }
    } else{
      toastr.error('Select Product From List');
    }
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
    var sale_pro_price =   $(this).closest('tr').find('.sale_pro_price').val();
    var sale_pro_qty =   $(this).closest('tr').find('.sale_pro_qty').val();
    var sale_gst =   $('#sale_gst').val();
    var sale_shipping_amt =   $('#sale_shipping_amt').val();
    if(sale_pro_price == ''){ sale_pro_price = 0; }
    if(sale_pro_qty == ''){ sale_pro_qty = 0; }
    if(sale_gst == ''){ sale_gst = 0; }
    if(sale_shipping_amt == ''){ sale_shipping_amt = 0; }
    var sale_pro_price = parseFloat(sale_pro_price);
    var sale_pro_qty = parseFloat(sale_pro_qty);
    var sale_gst = parseFloat(sale_gst);
    var sale_shipping_amt = parseFloat(sale_shipping_amt);

    var sale_pro_amt = sale_pro_price * sale_pro_qty;
    $(this).closest('tr').find('.sale_pro_amt').val(sale_pro_amt.toFixed(2));

    var sale_amount = 0;
    $(".sale_pro_amt").each(function() {
      var sale_pro_amt = $(this).val();
      if(!isNaN(sale_pro_amt) && sale_pro_amt.length != 0) {
          sale_amount += parseFloat(sale_pro_amt);
      }
    });
    $('#sale_amount').val(sale_amount);
    $('#sale_total_amount').val(sale_amount + sale_gst + sale_shipping_amt);
  });

  $('#myTable').on('change', 'input.sale_pro_price, input.sale_pro_qty', function () {
    var sale_pro_price =   $(this).closest('tr').find('.sale_pro_price').val();
    var sale_pro_qty =   $(this).closest('tr').find('.sale_pro_qty').val();
    var sale_pro_weight = $(this).closest('tr').find('.sale_pro_weight').val();
    var sale_gst =   $('#sale_gst').val();
    var sale_shipping_amt =   $('#sale_shipping_amt').val();

    if(sale_pro_price == ''){ sale_pro_price = 0; }
    if(sale_pro_qty == ''){ sale_pro_qty = 0; }
    if(sale_pro_weight == ''){ sale_pro_weight = 0; }
    if(sale_gst == ''){ sale_gst = 0; }
    if(sale_shipping_amt == ''){ sale_shipping_amt = 0; }

    var sale_pro_price = parseFloat(sale_pro_price);
    var sale_pro_qty = parseFloat(sale_pro_qty);
    var sale_pro_weight = parseFloat(sale_pro_weight);
    var sale_gst = parseFloat(sale_gst);
    var sale_shipping_amt = parseFloat(sale_shipping_amt);

    var sale_pro_tot_weight = sale_pro_qty * sale_pro_weight;
    $(this).closest('tr').find('.sale_pro_tot_weight').val(sale_pro_tot_weight.toFixed(2));

    var sale_pro_amt = sale_pro_price * sale_pro_qty;
    $(this).closest('tr').find('.sale_pro_amt').val(sale_pro_amt.toFixed(2));

    var sale_amount = 0;
    $(".sale_pro_amt").each(function() {
      var sale_pro_amt = $(this).val();
      if(!isNaN(sale_pro_amt) && sale_pro_amt.length != 0) {
          sale_amount += parseFloat(sale_pro_amt);
      }
    });
    $('#sale_amount').val(sale_amount);
    $('#sale_total_amount').val(sale_amount + sale_gst + sale_shipping_amt);
  });

  $('#sale_shipping_amt').on('change', function () {
    var sale_shipping_amt = $(this).val();
    var sale_amount = $('#sale_amount').val();
    if(sale_shipping_amt == ''){ sale_shipping_amt = 0; }
    if(sale_amount == ''){ sale_amount = 0; }
    var sale_shipping_amt = parseFloat(sale_shipping_amt);
    var sale_amount = parseFloat(sale_amount);
    $('#sale_total_amount').val(sale_shipping_amt + sale_amount);
  });

  // function calculation(sale_pro_price,sale_pro_qty){
  //   if(sale_pro_price == ''){ sale_pro_price = 0; }
  //   if(sale_pro_qty == ''){ sale_pro_qty = 0; }
  //   var sale_pro_price = parseFloat(sale_pro_price);
  //   var sale_pro_qty = parseFloat(sale_pro_qty);
  //
  //   var sale_pro_amt = sale_pro_price * sale_pro_qty;
  //   $(this).closest('tr').find('.sale_pro_amt').val(sale_pro_amt.toFixed(2));
  // }

  </script>
</body>
</html>
