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
            <h1>Customer</h1>
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
                <h3 class="card-title">Add Customer </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12 select_sm">
                        <label>KBC Membership Options</label>
                        <select class="form-control select2" name="mem_sch_id" id="mem_sch_id" data-placeholder="KBC Membership Options" <?php if(isset($update)){ echo 'disabled'; } ?> required>
                          <option value="">KBC Membership Options</option>
                          <?php foreach ($customer_member_list as $list) { ?>
                            <option value="<?php echo $list->mem_sch_id; ?>" <?php if(isset($customer_info) && $customer_info['mem_sch_id'] == $list->mem_sch_id){ echo 'selected'; } if(isset($mem_sch_id) && $mem_sch_id == $list->mem_sch_id){ echo 'selected'; } ?>><?php echo $list->mem_sch_name.' - '.$list->mem_sch_valid.'Days'; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>First Name*</label>
                        <input type="text" class="form-control form-control-sm" name="customer_fname" id="customer_fname" value="<?php if(isset($customer_info)){ echo $customer_info['customer_fname']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Last Name*</label>
                        <input type="text" class="form-control form-control-sm" name="customer_lname" id="customer_lname" value="<?php if(isset($customer_info)){ echo $customer_info['customer_lname']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date Of Birth*</label>
                        <input type="text" class="form-control form-control-sm" name="customer_dob" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($customer_info)){ echo $customer_info['customer_dob']; } else{ echo date('d-m-Y'); } ?>">
                      </div>
                      <div class="form-group col-md-3 mb-0">
                        <label for="">Gender : </label>
                        <div class="form-check">
                          <input class="form-check-input" value="Male" type="radio" name="customer_gender" <?php if(isset($customer_info) && $customer_info['customer_gender'] == 'Male'){ echo 'checked'; } elseif (!isset($customer_info)){ echo 'checked'; } ?>>
                          Male
                        </div>
                      </div>
                      <div class="form-group col-md-3 mb-0">
                        <div class="form-check" style="margin-top:22px;">
                          <input class="form-check-input" value="Female" type="radio" name="customer_gender" <?php if(isset($customer_info) && $customer_info['customer_gender'] == 'Female'){ echo 'checked'; } ?>>
                          Female
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Mobile*</label>
                        <input type="number" min="5000000000" max="9999999999" class="form-control form-control-sm" name="customer_mobile" id="customer_mobile" value="<?php if(isset($customer_info)){ echo $customer_info['customer_mobile']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm" name="customer_email" id="customer_email" value="<?php if(isset($customer_info)){ echo $customer_info['customer_email']; } ?>" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Address*</label>
                        <input type="text" class="form-control form-control-sm" name="customer_address" id="customer_address" value="<?php if(isset($customer_info)){ echo $customer_info['customer_address']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Country*</label>
                        <select class="form-control select2 form-control-sm" name="country_id" id="country_id" data-placeholder="Select Country" required>
                          <option value="">Select Country</option>
                          <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                          <option value="<?php echo $list->country_id; ?>" <?php if(isset($customer_info) && $customer_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>State*</label>
                        <select class="form-control select2 form-control-sm" name="state_id" id="state_id" data-placeholder="Select State" required>
                          <option value="">Select State</option>
                          <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                          <option value="<?php echo $list->state_id; ?>" <?php if(isset($customer_info) && $customer_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>City*</label>
                        <select class="form-control select2 form-control-sm" name="city_id" id="city_id" data-placeholder="Select City" required>
                          <option value="">Select City</option>
                          <?php if(isset($city_list)){ foreach ($city_list as $list) { ?>
                          <option value="<?php echo $list->city_id; ?>" <?php if(isset($customer_info) && $customer_info['city_id'] == $list->city_id){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Pin Code*</label>
                        <input type="number" min="100000" max="999999" class="form-control form-control-sm" name="customer_pin" id="customer_pin" value="<?php if(isset($customer_info)){ echo $customer_info['customer_pin']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Loyalty Number</label>
                        <input type="number" class="form-control form-control-sm" name="customer_loyalty_no" id="customer_loyalty_no" value="<?php if(isset($customer_info)){ echo $customer_info['customer_loyalty_no']; } ?>" >
                      </div>
                      <div class="form-group col-md-6">
                        <label>Credit Limit (Amount)</label>
                        <input type="number" class="form-control form-control-sm" name="customer_credit_lim" id="customer_credit_lim" value="<?php if(isset($customer_info)){ echo $customer_info['customer_credit_lim']; } ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Password*</label>
                        <input type="password" class="form-control form-control-sm" name="customer_password" id="customer_password" value="<?php if(isset($customer_info)){ echo $customer_info['customer_password']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Confirm Password*</label>
                        <input type="password" class="form-control form-control-sm" id="customer_con_password" value="<?php if(isset($customer_info)){ echo $customer_info['customer_password']; } ?>" required>
                      </div>
                      <div class="form-group col-md-6 select_sm" >
                        <label>Payment Type*</label>
                        <select class="form-control select2" name="payment_type_id" id="payment_type_id" data-placeholder="Select Payment Type" <?php if(isset($update)){ echo 'disabled'; } ?> required>
                          <option value="">Select Payment Type</option>
                          <?php if(isset($payment_type_list)){ foreach ($payment_type_list as $list) { ?>
                          <option value="<?php echo $list->payment_type_id; ?>" <?php //if(isset($customer_info) && $customer_info['payment_type_id'] == $list->payment_type_id){ echo 'selected'; } ?>><?php echo $list->payment_type_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Payment Reference Number*</label>
                        <input type="text" class="form-control form-control-sm" name="peyment_ref_no" id="peyment_ref_no" value="<?php //if(isset($customer_info)){ echo $customer_info['peyment_ref_no']; } ?>" <?php if(isset($update)){ echo 'disabled'; }?>>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Ration Card Type</label>
                        <select class="form-control select2" name="customer_ration_type" id="customer_ration_type" data-placeholder="Select Card Type">
                          <option value="">Select Card Type</option>
                          <option value="Yellow" <?php if(isset($customer_info) && $customer_info['customer_ration_type'] == 'Yellow'){ echo 'selected'; } ?>>Yellow</option>
                          <option value="Orange" <?php if(isset($customer_info) && $customer_info['customer_ration_type'] == 'Orange'){ echo 'selected'; } ?>>Orange</option>
                          <option value="White" <?php if(isset($customer_info) && $customer_info['customer_ration_type'] == 'White'){ echo 'selected'; } ?>>White</option>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Family Members Information</label>
                        <textarea class="form-control form-control-sm" name="customer_family_info" id="customer_family_info" rows="3"><?php if(isset($customer_info)){ echo $customer_info['customer_family_info']; } ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="customer_status" id="customer_status" value="1" <?php if(isset($customer_info) && $customer_info['customer_status'] == 1){ echo 'checked'; } elseif (!isset($customer_info)){ echo 'checked'; } ?>>
                      <label for="customer_status" class="custom-control-label">Active</label>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
// Check Mobile Duplication..
  var customer_mobile1 = $('#customer_mobile').val();
  $('#customer_mobile').on('change',function(){
    var customer_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_mobile",
             "column_val":customer_mobile,
             "table_name":"customer"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_mobile').val(customer_mobile1);
          toastr.error(customer_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var customer_email1 = $('#customer_email').val();
  $('#customer_email').on('change',function(){
    var customer_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_email",
             "column_val":customer_email,
             "table_name":"customer"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_email').val(customer_email1);
          toastr.error(customer_email+' Email Id Exist.');
        }
      }
    });
  });

  // Check Pincode..
    var customer_pin1 = $('#customer_pin').val();
    $('#customer_pin').on('change',function(){
      var customer_pin = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/check_duplication',
        type: 'POST',
        data: {"column_name":"tahsil_pincode_no",
               "column_val":customer_pin,
               "table_name":"tahsil_pincode"},
        context: this,
        success: function(result){
          if(result == 0){
            $('#customer_pin').val(customer_pin1);
            toastr.error(customer_pin+' is Invalid.');
            $('#customer_pin').focus();
          }
        }
      });
    });

// Check Email Duplication..
  var customer_loyalty_no1 = $('#customer_loyalty_no').val();
  $('#customer_loyalty_no').on('change',function(){
    var customer_loyalty_no = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>Master/check_customer_loyalty_no',
      type: 'POST',
      data: {"customer_loyalty_no":customer_loyalty_no},
      context: this,
      success: function(result){
        if(result == 'num_used'){
          $('#customer_loyalty_no').val(customer_loyalty_no1);
          toastr.error('This Loyalty Card Number is Used.');
          $('#customer_loyalty_no').focus();
        }
        if(result == 'num_not_avlbl'){
          $('#num_not_avlbl').val(customer_loyalty_no1);
          toastr.error('Invalid Loyalty Card Number');
          $('#customer_loyalty_no').focus();
        }
      }
    });
  });
</script>
</body>
</html>
