<?php include('header.php'); ?>
<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h3>Edit Address Details</h3>
          <hr class="hr-web">
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                  <label for="first_name" class="col-sm-2 col-form-label">Address*</label>
                  <div class="col-sm-10 p-1">
                    <textarea name="customer_address" id="customer_address" class="form-control" rows="3" cols="95" required><?php echo $eco_cust_info['customer_address']; ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Country*</label>
                  <div class="col-sm-4 p-1">
                    <select class="form-control select2 form-control-sm" name="country_id" id="country_id" data-placeholder="Select Country" required>
                      <option value="">Select Country</option>
                      <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                      <option value="<?php echo $list->country_id; ?>" <?php if(isset($eco_cust_info) && $eco_cust_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                      <?php } } ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="customer_city" id="customer_city" value="<?php echo $eco_cust_info['customer_city']; ?>" required> -->
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">State*</label>
                  <div class="col-sm-4 p-1">
                    <select class="form-control select2 form-control-sm" name="state_id" id="state_id" data-placeholder="Select State" required>
                      <option value="">Select State</option>
                      <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id; ?>" <?php if(isset($eco_cust_info) && $eco_cust_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                      <?php } } ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="customer_city" id="customer_city" value="<?php echo $eco_cust_info['customer_city']; ?>" required> -->
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">City*</label>
                  <div class="col-sm-4 p-1">
                    <select class="form-control select2 form-control-sm" name="city_id" id="city_id" data-placeholder="Select City" required>
                      <option value="">Select City</option>
                      <?php if(isset($city_list)){ foreach ($city_list as $list) { ?>
                      <option value="<?php echo $list->city_id; ?>" <?php if(isset($eco_cust_info) && $eco_cust_info['city_id'] == $list->city_id){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                      <?php } } ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="customer_city" id="customer_city" value="<?php echo $eco_cust_info['customer_city']; ?>" required> -->
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Pincode*</label>
                  <div class="col-sm-4 p-1">
                    <input type="text" class="form-control" name="customer_pin" id="customer_pin" value="<?php echo $eco_cust_info['customer_pin']; ?>" required>
                  </div>
                </div>
                <div class="row text-center ">
                  <div class="col-8 offset-md-2 mt-3">
                    <button type="submit" class="btn btn-outline-success mr-3">Save Changes</button>
                    <a href="" class="btn btn-outline-secondary">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
  <script type="text/javascript">
    // Check Pincode...
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
  </script>
