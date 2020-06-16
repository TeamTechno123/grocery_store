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
          <div class="col-sm-12 mt-1 text-center">
            <h4>SALE BILL</h4>
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
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >

              <?php if(isset($update)){ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/update_sale" method="post">
                  <input type="hidden" name="sale_id" value="<?php echo $sale_id; ?>">
              <?php } else{ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/save_sale" method="post">
              <?php } ?>

                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="sale_bill_no" id="sale_bill_no" value="<?php if(isset($sale_bill_no)){ echo $sale_bill_no; } ?>" placeholder="Sale Bill No." readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="sale_date" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($sale_date)){ echo $sale_date; } ?>" placeholder="Sale Bill Date" required>
                  </div>
                  <div class="form-group col-md-8 offset-md-2 select_sm">
                    <select class="form-control select2  form-control-sm" name="sale_party" id="sale_party" style="width: 100%;" required>
                      <option selected="selected select_sm" value="" >Select Party Name</option>
                      <?php foreach ($party_list as $party_list1) { ?>
                        <option value="<?php echo $party_list1->party_id; ?>"
                          <?php if(isset($sale_party)){ if($party_list1->party_id == $sale_party){ echo "selected"; } }
                                elseif ($delivery_party) { if($party_list1->party_id == $delivery_party){ echo "selected"; } }
                          ?>>
                          <?php echo $party_list1->party_firm; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group col-md-2">
                  </div> -->

                  <div class="form-group col-md-4 offset-md-2 select_sm">
                    <select class="form-control select2  form-control-sm sale_challan_no" name="sale_challan_no" id="sale_challan_no" required>
                      <option selected="selected" value="">Select Delivery Challan No. for sale bill</option>
                      <?php if(isset($sale_challan_no) || isset($delivery_no)){ ?>
                        <option selected="selected" value="<?php echo $delivery_id; ?>"><?php echo $delivery_no; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <select class="form-control select2  form-control-sm" name="sale_employee" required>
                      <option selected="selected" value="">Select Employee</option>
                      <?php foreach ($user_list as $user_list1) { ?>
                        <option value="<?php echo $user_list1->user_id; ?>"
                          <?php if(isset($sale_employee)){ if($user_list1->user_id == $sale_employee){ echo "selected"; } }
                                elseif ($delivery_user) { if($user_list1->user_id == $delivery_user){ echo "selected"; } }
                          ?>>
                          <?php echo $user_list1->user_name; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              <div class=" w-100 text-right">
                <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">Add Row</button>
              </div>
              <div class="" style="overflow-x:auto;">
                <table id="myTable" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Item</th>
                        <th class="wt_150">Inword Qty</th>
                        <th>Unit</th>
                        <th class="wt_100">Unit Price</th>
                        <th class="wt_100">MRP</th>
                        <th class="wt_50"></th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <select class="form-control form-control-sm" name="stock_type_id" id="stock_type_id" data-placeholder="Select Type">
                              <option value="">Select Type</option>
                              <option >1</option>
                              <option >2</option>
                              <option >3</option>
                            </select>
                          </td>
                          <td class="wt_150">
                            <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>
                          </td>
                          <td>
                            <select class="form-control form-control-sm" name="stock_type_id" id="stock_type_id" data-placeholder="Select Type">
                              <option value="">Select Type</option>
                              <option >1</option>
                              <option >2</option>
                              <option >3</option>
                            </select>
                          </td>
                          <td class="wt_100">
                            <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>
                          </td>
                          <td class="wt_100">
                            <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>
                          </td>
                          <td class="wt_50"></td>
                        </tr>
                      </tbody>
                    </table>
              </div>
              <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6 ">
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Basic Amount</label>
                    <div class="">
                      <input type="text" name="total_base_amount" class="form-control" id="basic_amount" value="<?php if(isset($total_base_amount)){ echo $total_base_amount; } elseif (isset($delivery_basic)) { echo $delivery_basic; } ?>">
                    </div>
                  </div>
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">GST Amount</label>
                    <div class="">
                      <input type="text" name="total_gst" class="form-control" id="gst_val" value="<?php if(isset($total_gst)){ echo $total_gst; } elseif (isset($delivery_gst)) { echo $delivery_gst; } ?>">
                    </div>
                  </div>
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Total Amount</label>
                    <div class="">
                      <input type="text" name="sale_total" class="form-control" id="sale_total" value="<?php if(isset($sale_total)){ echo $sale_total; } elseif (isset($delivery_total)) { echo $delivery_total; } ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
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

<script type="text/javascript">
  // Add Row...
  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>
  <?php } else { ?>
  var i = 1;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
      '<td>'+
        '<select class="form-control form-control-sm" name="stock_type_id" id="stock_type_id" data-placeholder="Select Type">'+
          '<option value="">Select Type</option>'+
          '<option >1</option>'+
          '<option >2</option>'+
          '<option >3</option>'+
        '</select>'+
      '</td>'+
      '<td class="wt_150">'+
        '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
      '</td>'+
      '<td>'+
        '<select class="form-control form-control-sm" name="stock_type_id" id="stock_type_id" data-placeholder="Select Type">'+
          '<option value="">Select Type</option>'+
          '<option >1</option>'+
          '<option >2</option>'+
          '<option >3</option>'+
        '</select>'+
      '</td>'+
      '<td class="wt_100">'+
        '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
      '</td>'+
      '<td class="wt_100">'+
        '<input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="" placeholder="" required>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });

</script>
</body>
</html>
