<!DOCTYPE html>
<?php
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
?>
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
            <h1>FRANCHISE INFORMATION</h1>
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
                <h3 class="card-title">Franchise Information</h3>
              </div>

              <form id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-12 select_sm drop-lg">
                    <select class="form-control select2" name="franchise_type_id" id="franchise_type_id" title="Select Type Of Franchise " data-placeholder="Select Type Of Franchise"  style="width: 100%;" required>
                      <option selected="selected" value="" >Select Type Of Franchise </option>
                      <option value="3" <?php if(isset($franchise_type_id) && $franchise_type_id == '3'){ echo 'selected'; } ?>>Reseller / Freelancer</option>
                      <!-- <option value="4" <?php if(isset($franchise_type_id) && $franchise_type_id == '4'){ echo 'selected'; } ?> >Vendor</option> -->
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <select class="form-control select2" name="country_id" id="country_id" title="Select Country " data-placeholder="Select Country"  style="width: 100%;" required>
                      <option selected="selected" value="" >Select Country </option>
                      <?php foreach ($country_list as $list) { ?>
                        <option value="<?php echo $list->country_id ?>" <?php if(isset($country_id) && $country_id == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <select class="form-control select2" name="state_id" id="state_id" title="Select State " data-placeholder="Select State" required>
                      <option selected="selected" value="" >Select State </option>
                      <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                        <option value="<?php echo $list->state_id ?>" <?php if(isset($state_id) && $state_id == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm" id="district_div" >
                    <select class="form-control select2" name="district_id" id="district_id" title="Select District" data-placeholder="Select District" required>
                      <option selected="selected" value="" >Select District </option>
                      <?php  if(isset($district_list)){ foreach ($district_list as $list) { ?>
                        <option value="<?php echo $list->district_id ?>" <?php if(isset($district_id) && $district_id == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6 select_sm" id="tahasil_div">
                    <select class="form-control select2" name="tahasil_id" id="tahasil_id" title="Select Tahsil " data-placeholder="Select Tahsil">
                      <option selected="selected" value="" >Select Tahsil </option>
                      <?php  if(isset($tahasil_list)){ foreach ($tahasil_list as $list) { ?>
                        <option value="<?php echo $list->tahasil_id ?>" <?php if(isset($tahasil_id) && $tahasil_id == $list->tahasil_id ){ echo 'selected'; } ?>><?php echo $list->tahasil_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control form-control-sm" name="franchise_name" id="franchise_name" value="<?php if(isset($franchise_name)){ echo $franchise_name; } ?>" title="Enter Name" placeholder="Enter Name" required>
                  </div>
                  <div class="form-group col-md-12">
                    <textarea class="form-control" name="franchise_address" rows="3" cols="90" placeholder="Address" required><?php if(isset($franchise_address)){ echo $franchise_address; } ?></textarea>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Gender : </label>
                  </div>
                  <div class="form-group col-md-2">
                    <input class="form-check-input" type="radio" value="Male" name="franchise_gender" <?php if(isset($franchise_gender) && $franchise_gender == 'Male'){ echo 'checked'; } else{ echo 'checked'; } ?>> Male
                  </div>
                  <div class="form-group col-md-2">
                    <input class="form-check-input" type="radio" value="Female" name="franchise_gender" <?php if(isset($franchise_gender) && $franchise_gender == 'Female'){ echo 'checked'; } ?>> Female
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_email" id="franchise_email" value="<?php if(isset($franchise_email)){ echo $franchise_email; } ?>" title="Enter Email Id" placeholder="Enter Email Id" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_mobile" id="franchise_mobile" value="<?php if(isset($franchise_mobile)){ echo $franchise_mobile; } ?>" title="Enter Mobile no." placeholder="Enter Mobile no." required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" name="franchise_password" id="franchise_password" value="<?php if(isset($franchise_password)){ echo $franchise_password; } ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" name="franchise_c_password" id="franchise_c_password" value="<?php if(isset($franchise_password)){ echo $franchise_password; } ?>" title="Confirm Password" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_pay_terms" id="franchise_pay_terms" value="<?php if(isset($franchise_pay_terms)){ echo $franchise_pay_terms; } ?>" title="Enter Payment Terms" placeholder="Enter Payment Terms" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_commission" id="franchise_commission" value="<?php if(isset($franchise_commission)){ echo $franchise_commission; } ?>" title="Commission" placeholder="Commission" required>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="">Bank Details : </label>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_bank" id="franchise_bank" value="<?php if(isset($franchise_bank)){ echo $franchise_bank; } ?>" title="Enter Bank Name" placeholder="Enter Bank Name" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_branch" id="franchise_branch" value="<?php if(isset($franchise_branch)){ echo $franchise_branch; } ?>" title="Enter Bank Branch" placeholder="Enter Bank Branch" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_ifsc" id="franchise_ifsc" value="<?php if(isset($franchise_ifsc)){ echo $franchise_ifsc; } ?>" title="Enter IFSC Code" placeholder="Enter IFSC Code" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" name="franchise_acc_no" id="franchise_acc_no" value="<?php if(isset($franchise_acc_no)){ echo $franchise_acc_no; } ?>" title="Enter Bank Acount Number" placeholder="Enter Bank Acount Number" required>
                  </div>
                  <div class="form-group col-md-6 pl-4">
                    <input type="checkbox" name="franchise_status" <?php if(isset($franchise_status) && $franchise_status == '0'){ echo 'checked'; } ?> value="0"> Disable This Franchise
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="../dashboard" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

  <script type="text/javascript">
  // Mobile Exist...
  var franchise_mobile1 = $('#franchise_mobile').val();
  $('#franchise_mobile').on('change',function(){
    var franchise_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_mobile",
             "column_val":franchise_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#franchise_mobile').val(franchise_mobile1);
          toastr.error(franchise_mobile+' Mobile No Exist.');
        }
      }
    });
  });

  // Email Exist...
  var franchise_email1 = $('#franchise_email').val();
  $('#franchise_email').on('change',function(){
    var franchise_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_email",
             "column_val":franchise_email,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#franchise_email').val(franchise_email1);
          toastr.error(franchise_email+' Email Exist.');
        }
      }
    });
  });
  </script>

  <script type="text/javascript">
    $("#country_id").on("change", function(){
      var country_id =  $('#country_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_state_by_country',
        type: 'POST',
        data: {"country_id":country_id},
        context: this,
        success: function(result){
          $('#state_id').html(result);
        }
      });
    });

    $("#state_id").on("change", function(){
      var state_id =  $('#state_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_district_by_state',
        type: 'POST',
        data: {"state_id":state_id},
        context: this,
        success: function(result){
          $('#district_id').html(result);
        }
      });
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_tahasil_by_district',
        type: 'POST',
        data: {"district_id":district_id},
        context: this,
        success: function(result){
          $('#tahasil_id').html(result);
        }
      });
    });

    $("#district_id").on("change", function(){
      var district_id =  $('#district_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/get_city_by_district',
        type: 'POST',
        data: {"district_id":district_id},
        context: this,
        success: function(result){
          $('#city_id').html(result);
        }
      });
    });
  </script>


</body>
</html>
