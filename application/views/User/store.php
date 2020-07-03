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
            <h1>Store Information</h1>
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
                <h3 class="card-title">Store Information</h3>
              </div>

              <form class="input_form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                <div class="form-group col-md-12">
                  <label> Store Name</label>
                  <input type="text" class="form-control form-control-sm" name="store_name" id="store_name" value="<?php if(isset($store_info)){ echo $store_info['store_name']; } ?>" title="Store Name" placeholder="Store Name" required>
                </div>
                <div class="form-group col-md-12">
                  <label> Store Address</label>
                  <textarea class="form-control" name="store_address" rows="3" cols="90" placeholder="Address" required><?php if(isset($store_info)){ echo $store_info['store_address']; } ?></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>City</label>
                  <input type="text" class="form-control form-control-sm" name="store_city" id="store_city" value="<?php if(isset($store_info)){ echo $store_info['store_city']; } ?>" title="Enter City Name" placeholder="Enter City Name" required>
                </div>
                <div class="form-group col-md-6 select_sm">
                  <label>Country</label>
                  <select class="form-control select2" name="country_id" id="country_id" title="Select Country " data-placeholder="Select Country"  style="width: 100%;" required>
                    <option selected="selected" value="" >Select Country </option>
                    <?php foreach ($country_list as $list) { ?>
                      <option value="<?php echo $list->country_id ?>" <?php if(isset($store_info) && $store_info['country_id'] == $list->country_id ){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="form-group col-md-6 select_sm">
                  <label>State</label>
                  <select class="form-control select2" name="state_id" id="state_id" title="Select State " data-placeholder="Select State" required>
                    <option selected="selected" value="" >Select State </option>
                    <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                      <option value="<?php echo $list->state_id ?>" <?php if(isset($store_info) && $store_info['state_id'] == $list->state_id ){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                    <?php } } ?>
                  </select>
                </div>
                <div class="form-group col-md-6 select_sm" id="district_div" >
                  <label>District</label>
                  <select class="form-control select2" name="district_id" id="district_id" title="Select District" data-placeholder="Select District" required>
                    <option selected="selected" value="" >Select District </option>
                    <?php  if(isset($district_list)){ foreach ($district_list as $list) { ?>
                      <option value="<?php echo $list->district_id ?>" <?php if(isset($store_info) && $store_info['district_id'] == $list->district_id ){ echo 'selected'; } ?>><?php echo $list->district_name; ?></option>
                    <?php } } ?>
                  </select>
                </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-sm" name="store_email" id="store_email" value="<?php if(isset($store_info)){ echo $store_info['store_email']; } ?>" title="Enter Email Id" placeholder="Enter Email Id" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Mobile</label>
                    <input type="number" class="form-control form-control-sm" name="store_mobile" id="store_mobile" value="<?php if(isset($store_info)){ echo $store_info['store_mobile']; } ?>" title="Enter Mobile no." placeholder="Enter Mobile no." required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-sm" name="store_password" id="store_password" value="<?php if(isset($store_info)){ echo $store_info['store_password']; } ?>" title="Enter Password" placeholder="Enter Password" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                  <?php } else{ ?>
                    <button id="btn_save" type="submit" class="btn btn-success px-4">Add</button>
                  <?php } ?>
                  <a href="" class="btn btn-default ml-4">Cancel</a>
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
  // Mobile Exist...
  var store_mobile1 = $('#store_mobile').val();
  $('#store_mobile').on('change',function(){
    var store_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"user_mobile",
             "column_val":store_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#store_mobile').val(store_mobile1);
          toastr.error(store_mobile+' Mobile No Exist.');
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
