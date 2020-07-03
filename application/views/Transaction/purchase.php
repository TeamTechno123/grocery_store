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
            <h1>Purchase</h1>
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
                <h3 class="card-title">Purchase</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-10 offset-md-1 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Purchase No.</label>
                        <input type="number" class="form-control form-control-sm" name="purchase_no" id="purchase_no" value="<?php if(isset($purchase_info)){ echo $purchase_info['purchase_no']; } else{ echo $purchase_no; } ?>" readonly  required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Purchase Date.</label>
                        <input type="text" class="form-control form-control-sm" name="purchase_date"  value="<?php if(isset($purchase_info)){ echo $purchase_info['purchase_date']; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Vendor</label>
                        <select class="form-control select2 form-control-sm" name="vendor_id" id="vendor_id" data-placeholder="Select Vendor">
                          <option value="">Select Vendor</option>
                          <?php if(isset($vendor_list)){ foreach ($vendor_list as $list2) { ?>
                          <option value="<?php echo $list2->vendor_id; ?>" <?php if(isset($purchase_info) && $purchase_info['vendor_id'] == $list2->vendor_id){ echo 'selected'; } ?>><?php echo '[#'.$list2->vendor_id.'] '.$list2->vendor_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1 mt-2" width="150px">Add Row</button>
                  </div>

              <div class="col-md-12">
                <div class="" style="overflow-x:auto;">
                  <table id="myTable" class="table table-bpurchaseed tbl_list">
                    <thead>
                    <tr>
                      <th class="wt_150">Product</th>
                      <th class="wt_150">Weight</th>
                      <th class="wt_150">Unit</th>
                      <th class="wt_150">Qty</th>
                      <th class="wt_150">Price</th>
                      <th class="wt_150">Basic Amount</th>
                      <th class="wt_150">GST Amount</th>
                      <th class="wt_150">Amount</th>
                      <th class="wt_50"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($purchase_pro_list)){ $i=0; foreach ($purchase_pro_list as $list) { ?>
                      <input type="hidden" name="input[<?php echo $i; ?>][purchase_pro_id]" value="<?php echo $list->purchase_pro_id; ?>">
                      <tr>
                        <td class="wt_150">
                          <select class="form-control form-control-sm product_id" name="input[<?php echo $i; ?>][product_id]" data-placeholder="Select Customer" required>
                            <option value="">Select Product</option>
                            <?php foreach ($product_list as $product_list1) { ?>
                              <option value="<?php echo $product_list1->product_id; ?>" pro_attri_id="<?php echo $product_list1->pro_attri_id; ?>" tax_rate="<?php echo $product_list1->tax_rate; ?>" <?php if($product_list1->product_id == $list->product_id){ echo 'selected'; } ?>><?php echo $product_list1->product_name.' - '.$product_list1->pro_attri_weight.''.$product_list1->unit_name; ?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="form-control form-control-sm pro_attri_id" name="input[<?php echo $i; ?>][pro_attri_id]"  value="<?php echo $list->pro_attri_id; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_weight" name="input[<?php echo $i; ?>][purchase_pro_weight]"  value="<?php echo $list->purchase_pro_weight; ?>" required>
                          <input type="hidden" class="form-control form-control-sm purchase_pro_tot_weight" name="input[<?php echo $i; ?>][purchase_pro_tot_weight]"  value="<?php echo $list->purchase_pro_tot_weight; ?>" required>
                        </td>
                        <td class="wt_150">
                          <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][purchase_pro_unit]" data-placeholder="Select Customer" required>
                            <option value="">Select Unit</option>
                            <?php foreach ($unit_list as $unit_list1) { ?>
                              <option value="<?php echo $unit_list1->unit_name; ?>" <?php if($unit_list1->unit_name == $list->purchase_pro_unit){ echo 'selected'; } ?>><?php echo $unit_list1->unit_name; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_qty" name="input[<?php echo $i; ?>][purchase_pro_qty]" value="<?php echo $list->purchase_pro_qty; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="1.00" step="0.01" class="form-control form-control-sm purchase_pro_price" name="input[<?php echo $i; ?>][purchase_pro_price]" value="<?php echo $list->purchase_pro_price; ?>" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm purchase_pro_basic_amt" name="input[<?php echo $i; ?>][purchase_pro_basic_amt]" value="<?php echo $list->purchase_pro_basic_amt; ?>" required readonly>
                        </td>
                        <td class="wt_150">
                          <input type="number" class="form-control form-control-sm purchase_pro_gst_amt" name="input[<?php echo $i; ?>][purchase_pro_gst_amt]" value="<?php echo $list->purchase_pro_gst_amt; ?>" readonly>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm purchase_pro_amt" name="input[<?php echo $i; ?>][purchase_pro_amt]" value="<?php echo $list->purchase_pro_amt; ?>" required readonly>
                        </td>
                        <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                      </tr>
                    <?php $i++; } } else{ ?>
                      <tr>
                        <td class="wt_150">
                          <select class="form-control form-control-sm product_id" name="input[0][product_id]" data-placeholder="Select Customer" required>
                            <option value="">Select Product</option>
                            <?php foreach ($product_list as $product_list1) { ?>
                              <option value="<?php echo $product_list1->product_id; ?>" pro_attri_id="<?php echo $product_list1->pro_attri_id; ?>" tax_rate="<?php echo $product_list1->tax_rate; ?>"><?php echo $product_list1->product_name.' - '.$product_list1->pro_attri_weight.''.$product_list1->unit_name; ?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="form-control form-control-sm pro_attri_id" name="input[0][pro_attri_id]" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_weight" name="input[0][purchase_pro_weight]" required>
                          <input type="hidden" class="form-control form-control-sm purchase_pro_tot_weight" name="input[0][purchase_pro_tot_weight]" required>
                        </td>
                        <td class="wt_150">
                          <select class="form-control form-control-sm" name="input[0][purchase_pro_unit]" data-placeholder="Select Customer" required>
                            <option value="">Select Unit</option>
                            <?php foreach ($unit_list as $unit_list1) { ?>
                              <option value="<?php echo $unit_list1->unit_name; ?>"><?php echo $unit_list1->unit_name; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_qty" name="input[0][purchase_pro_qty]" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="1.00" step="0.01" class="form-control form-control-sm purchase_pro_price" name="input[0][purchase_pro_price]" required>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm purchase_pro_basic_amt" name="input[0][purchase_pro_basic_amt]" required readonly>
                        </td>
                        <td class="wt_150">
                          <input type="number" class="form-control form-control-sm purchase_pro_gst_amt" name="input[0][purchase_pro_gst_amt]" readonly>
                        </td>
                        <td class="wt_150">
                          <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm purchase_pro_amt" name="input[0][purchase_pro_amt]" required readonly>
                        </td>
                        <td class="wt_50"></td>
                      </tr>
                    <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Amount</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="purchase_amount" id="purchase_amount" value="<?php if(isset($purchase_info)){ echo $purchase_info['purchase_amount']; } ?>" required readonly>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>GST</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="purchase_gst" id="purchase_gst" value="<?php if(isset($purchase_info)){ echo $purchase_info['purchase_gst']; } ?>"  readonly>
              </div>
              <div class="form-group col-md-3 offset-md-6 text-right"><label>Total Amount</label></div>
              <div class="form-group col-md-3">
                <input type="text" class="form-control form-control-sm" name="purchase_total_amount" id="purchase_total_amount" value="<?php if(isset($purchase_info)){ echo $purchase_info['purchase_total_amount']; } ?>" required readonly>
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

  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>;
  <?php } else { ?>
  var i = 0;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
      '<td class="wt_150">'+
        '<select class="form-control form-control-sm product_id" name="input['+i+'][product_id]" data-placeholder="Select Customer" required>'+
          '<option value="">Select Product</option>'+
          '<?php foreach ($product_list as $product_list1) { ?>'+
            '<option value="<?php echo $product_list1->product_id; ?>" pro_attri_id="<?php echo $product_list1->pro_attri_id; ?>" tax_rate="<?php echo $product_list1->tax_rate; ?>"><?php echo $product_list1->product_name.' - '.$product_list1->pro_attri_weight.''.$product_list1->unit_name; ?></option>'+
          '<?php } ?>'+
        '</select>'+
        '<input type="hidden" class="form-control form-control-sm pro_attri_id" name="input['+i+'][pro_attri_id]" required>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_weight" name="input['+i+'][purchase_pro_weight]" required>'+
        '<input type="hidden" class="form-control form-control-sm purchase_pro_tot_weight" name="input['+i+'][purchase_pro_tot_weight]" required>'+
      '</td>'+
      '<td class="wt_150">'+
        '<select class="form-control form-control-sm" name="input['+i+'][purchase_pro_unit]" data-placeholder="Select Customer" required>'+
          '<option value="">Select Unit</option>'+
          '<?php foreach ($unit_list as $unit_list1) { ?>'+
            '<option value="<?php echo $unit_list1->unit_name; ?>"><?php echo $unit_list1->unit_name; ?></option>'+
          '<?php } ?>'+
        '</select>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_qty" name="input['+i+'][purchase_pro_qty]" required>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" min="1.00" step="0.01" class="form-control form-control-sm purchase_pro_price" name="input['+i+'][purchase_pro_price]" required>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" min="0.01" step="0.01"  class="form-control form-control-sm purchase_pro_basic_amt" name="input['+i+'][purchase_pro_basic_amt]" required readonly>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" class="form-control form-control-sm purchase_pro_gst_amt" name="input['+i+'][purchase_pro_gst_amt]" readonly>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm purchase_pro_amt" name="input['+i+'][purchase_pro_amt]" required readonly>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);

  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
    var purchase_pro_price =   $(this).closest('tr').find('.purchase_pro_price').val();
    var purchase_pro_qty =   $(this).closest('tr').find('.purchase_pro_qty').val();
    var purchase_pro_weight = $(this).closest('tr').find('.purchase_pro_weight').val();
    var gst_per = $(this).closest('tr').find('.product_id').find("option:selected").attr('tax_rate');

    // var purchase_gst =   $('#purchase_gst').val();

    if(purchase_pro_price == ''){ purchase_pro_price = 0; }
    if(purchase_pro_qty == ''){ purchase_pro_qty = 0; }
    if(purchase_pro_weight == ''){ purchase_pro_weight = 0; }
    // if(purchase_gst == ''){ purchase_gst = 0; }


    var purchase_pro_price = parseFloat(purchase_pro_price);
    var purchase_pro_qty = parseFloat(purchase_pro_qty);
    var purchase_pro_weight = parseFloat(purchase_pro_weight);
    // var purchase_gst = parseFloat(purchase_gst);

    var purchase_pro_tot_weight = purchase_pro_qty * purchase_pro_weight;
    $(this).closest('tr').find('.purchase_pro_tot_weight').val(purchase_pro_tot_weight.toFixed(2));

    var purchase_pro_basic_amt = purchase_pro_price * purchase_pro_qty;
    $(this).closest('tr').find('.purchase_pro_basic_amt').val(purchase_pro_basic_amt.toFixed(2));

    var purchase_pro_gst_amt = (purchase_pro_basic_amt * gst_per) / 100;
    $(this).closest('tr').find('.purchase_pro_gst_amt').val(purchase_pro_gst_amt.toFixed(2));

    var purchase_pro_amt = purchase_pro_basic_amt + purchase_pro_gst_amt;
    $(this).closest('tr').find('.purchase_pro_amt').val(purchase_pro_amt.toFixed(2));

    var purchase_amount = 0;
    $(".purchase_pro_basic_amt").each(function() {
      var purchase_pro_basic_amt = $(this).val();
      if(!isNaN(purchase_pro_basic_amt) && purchase_pro_basic_amt.length != 0) {
          purchase_amount += parseFloat(purchase_pro_basic_amt);
      }
    });
    $('#purchase_amount').val(purchase_amount.toFixed(2));


    var purchase_gst = 0;
    $(".purchase_pro_gst_amt").each(function() {
      var purchase_pro_gst_amt = $(this).val();
      if(!isNaN(purchase_pro_gst_amt) && purchase_pro_gst_amt.length != 0) {
          purchase_gst += parseFloat(purchase_pro_gst_amt);
      }
    });
    $('#purchase_gst').val(purchase_gst.toFixed(2));

    purchase_total_amount = purchase_amount + purchase_gst;
    $('#purchase_total_amount').val(purchase_total_amount.toFixed(2));
  });

  $('#myTable').on('change', 'input.purchase_pro_price, input.purchase_pro_qty, input.purchase_pro_weight', function () {
    var purchase_pro_price =   $(this).closest('tr').find('.purchase_pro_price').val();
    var purchase_pro_qty =   $(this).closest('tr').find('.purchase_pro_qty').val();
    var purchase_pro_weight = $(this).closest('tr').find('.purchase_pro_weight').val();
    var gst_per = $(this).closest('tr').find('.product_id').find("option:selected").attr('tax_rate');
    // var purchase_gst =   $('#purchase_gst').val();

    if(purchase_pro_price == ''){ purchase_pro_price = 0; }
    if(purchase_pro_qty == ''){ purchase_pro_qty = 0; }
    if(purchase_pro_weight == ''){ purchase_pro_weight = 0; }
    // if(purchase_gst == ''){ purchase_gst = 0; }

    var purchase_pro_price = parseFloat(purchase_pro_price);
    var purchase_pro_qty = parseFloat(purchase_pro_qty);
    var purchase_pro_weight = parseFloat(purchase_pro_weight);
    // var purchase_gst = parseFloat(purchase_gst);

    var purchase_pro_tot_weight = purchase_pro_qty * purchase_pro_weight;
    $(this).closest('tr').find('.purchase_pro_tot_weight').val(purchase_pro_tot_weight.toFixed(2));

    var purchase_pro_basic_amt = purchase_pro_price * purchase_pro_qty;
    $(this).closest('tr').find('.purchase_pro_basic_amt').val(purchase_pro_basic_amt.toFixed(2));

    var purchase_pro_gst_amt = (purchase_pro_basic_amt * gst_per) / 100;
    $(this).closest('tr').find('.purchase_pro_gst_amt').val(purchase_pro_gst_amt.toFixed(2));

    var purchase_pro_amt = purchase_pro_basic_amt + purchase_pro_gst_amt;
    $(this).closest('tr').find('.purchase_pro_amt').val(purchase_pro_amt.toFixed(2));

    var purchase_amount = 0;
    $(".purchase_pro_basic_amt").each(function() {
      var purchase_pro_basic_amt = $(this).val();
      if(!isNaN(purchase_pro_basic_amt) && purchase_pro_basic_amt.length != 0) {
          purchase_amount += parseFloat(purchase_pro_basic_amt);
      }
    });
    $('#purchase_amount').val(purchase_amount.toFixed(2));


    var purchase_gst = 0;
    $(".purchase_pro_gst_amt").each(function() {
      var purchase_pro_gst_amt = $(this).val();
      if(!isNaN(purchase_pro_gst_amt) && purchase_pro_gst_amt.length != 0) {
          purchase_gst += parseFloat(purchase_pro_gst_amt);
      }
    });
    $('#purchase_gst').val(purchase_gst.toFixed(2));

    purchase_total_amount = purchase_amount + purchase_gst;
    $('#purchase_total_amount').val(purchase_total_amount.toFixed(2));

    // alert(purchase_pro_gst_amt);
  });

  $(document).on('change','.product_id', function () {
    var pro_attri_id = $(this).find("option:selected").attr('pro_attri_id');
    $(this).closest('tr').find('.pro_attri_id').val(pro_attri_id);
    // alert(pro_attri_id);
    // var gst_per = $(this).closest('tr').find('.product_id').find("option:selected").attr('tax_rate');
  });

  // $('#purchase_shipping_amt').on('change', function () {
  //   var purchase_shipping_amt = $(this).val();
  //   var purchase_amount = $('#purchase_amount').val();
  //   if(purchase_shipping_amt == ''){ purchase_shipping_amt = 0; }
  //   if(purchase_amount == ''){ purchase_amount = 0; }
  //   var purchase_shipping_amt = parseFloat(purchase_shipping_amt);
  //   var purchase_amount = parseFloat(purchase_amount);
  //   $('#purchase_total_amount').val(purchase_shipping_amt + purchase_amount);
  // });


  </script>
</body>
</html>
