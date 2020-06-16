<!DOCTYPE html>
<html>
<?php $page = "company_information"; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>VENDOR INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Vendor Information</h3>
              </div>
              <form action="" method="post" enctype="multipart/form-data" role="form">
                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <label>Vendor Name </label>
                    <input type="text" class="form-control form-control-sm" name="vendor_name" id="vendor_name" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_name']; } ?>" required>
                  </div>
                  <div class="form-group  col-md-12">
                    <label>Vendor Address</label>
                    <textarea name="vendor_address" id="vendor_address" class="form-control form-control-sm" rows="3" cols="90" required><?php if(isset($vendor_info)){ echo $vendor_info['vendor_address']; } ?></textarea>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                    <label>State</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_state" id="vendor_state" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_state']; } ?>" required>
                  </div>
                  <div class="form-group col-md-6 select_sm" id="district_div" >
                    <label>District</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_district" id="vendor_district" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_district']; } ?>" >
                  </div>
                  <div class="form-group col-md-6 select_sm" id="tahasil_div">
                    <label>Tahsil</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_tahsil" id="vendor_tahsil" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_tahsil']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text"  class="form-control form-control-sm" name="vendor_city" id="vendor_city" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_city']; } ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Pincode</label>
                    <input type="number" class="form-control form-control-sm" name="vendor_pincode" id="vendor_pincode" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_pincode']; } ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>State code</label>
                    <input type="number"  class="form-control form-control-sm" name="vendor_statecode" id="vendor_statecode" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_statecode']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-sm" name="vendor_email" id="vendor_email" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_email']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile No.</label>
                    <input type="number" class="form-control form-control-sm" name="vendor_mobile" id="vendor_mobile" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_mobile']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>GST No.</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_gst" id="vendor_gst" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_gst']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>PAN No.</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_pan" id="vendor_pan" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_pan']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Account No.</label>
                    <input type="number" class="form-control form-control-sm" name="vendor_bank_accno" id="vendor_bank_accno" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_bank_accno']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>IFSC No.</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_ifsc" id="vendor_ifsc" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_ifsc']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Vendor Code</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_code" id="vendor_code" value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_code']; } ?>" >
                  </div>
                  <div class="form-group col-md-6">
                    <label>Payment Terms</label>
                    <input type="text" class="form-control form-control-sm" name="vendor_pay_terms" id="vendor_pay_terms"  value="<?php if(isset($vendor_info)){ echo $vendor_info['vendor_pay_terms']; } ?>" >
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="vendor_status" id="vendor_status" value="1" <?php if(isset($vendor_info) && $vendor_info['vendor_status'] == 1){ echo 'checked'; } elseif (!isset($vendor_info)){ echo 'checked'; } ?>>
                      <label for="vendor_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>Master/membership_scheme_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

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
