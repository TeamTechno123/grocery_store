<?php include('header.php'); ?>
<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3 <?php if(isset($update)){ echo 'd-none'; } ?>">
          <!-- <h3>Edit Address Details</h3>
          <hr class="hr-web"> -->
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" enctype="multipart/form-data">
                <h5>Permanant Address Details</h5>
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













        <div class="row">
          <div class="col-md-12">
            <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?> card-default">
              <div class="card-header">
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Delivery Address</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Edit-Address" type="button" class="btn btn-sm btn-outline-info" >Add New</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
              <div class="card-body px-0 py-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                <?php if(isset($update)){ ?>
                  <form class="input_form m-0" id="form_action" role="form" action="<?php echo base_url(); ?>Website/update_delivery_address" method="post">
                    <input type="hidden" name="address_id" value="<?php echo $delivery_address_info['address_id']; ?>">
                <?php } else{ ?>
                  <form class="input_form m-0" id="form_action" role="form" action="<?php echo base_url(); ?>Website/add_delivery_address" method="post">
                <?php } ?>


                  <div class="row p-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="first_name" class="col-sm-2 col-form-label">Address Title*</label>
                          <div class="col-sm-10 p-1">
                            <input type="text" class="form-control" name="address_title" id="address_title" value="<?php if(isset($delivery_address_info)){ echo $delivery_address_info['address_title']; } ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="first_name" class="col-sm-2 col-form-label">Address*</label>
                          <div class="col-sm-10 p-1">
                            <textarea name="address" id="address" class="form-control" rows="3" cols="95" required><?php if(isset($delivery_address_info)){ echo $delivery_address_info['address']; } ?></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Country*</label>
                          <div class="col-sm-4 p-1">
                            <select class="form-control select2 form-control-sm" name="country_id" id="country_id2" data-placeholder="Select Country" required>
                              <option value="">Select Country</option>
                              <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                              <option value="<?php echo $list->country_id; ?>" <?php if(isset($delivery_address_info) && $delivery_address_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                          <label for="inputEmail3" class="col-sm-2 col-form-label">State*</label>
                          <div class="col-sm-4 p-1">
                            <select class="form-control select2 form-control-sm" name="state_id" id="state_id2" data-placeholder="Select State" required>
                              <option value="">Select State</option>
                              <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                              <option value="<?php echo $list->state_id; ?>" <?php if(isset($delivery_address_info) && $delivery_address_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">City*</label>
                          <div class="col-sm-4 p-1">
                            <select class="form-control select2 form-control-sm" name="city_id" id="city_id2" data-placeholder="Select City" required>
                              <option value="">Select City</option>
                              <?php if(isset($city_list)){ foreach ($city_list as $list) { ?>
                              <option value="<?php echo $list->city_id; ?>" <?php if(isset($delivery_address_info) && $delivery_address_info['city_id'] == $list->city_id){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Pincode*</label>
                          <div class="col-sm-4 p-1">
                            <input type="text" class="form-control" name="pincode" id="pincode" value="<?php if(isset($delivery_address_info)){ echo $delivery_address_info['pincode']; } ?>" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer clearfix" style="display: block;">
                    <div class="row">
                      <div class="col-md-6 text-left">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="is_default" id="is_default" value="1" <?php if(isset($delivery_address_info) && $delivery_address_info['is_default'] == 1){ echo 'checked'; } ?>>
                          <label for="is_default" class="custom-control-label">Default Address</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="<?php echo base_url(); ?>Master/timeslot" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                        <?php if(isset($update)){
                          echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                        } else{
                          echo '<button class="btn btn-sm btn-success float-right px-4">Save</button>';
                        } ?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">List All Delivery Address</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <!-- <th class="wt_75">tatus</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($delivery_address_list as $list) { $i++;
                      $country_info = $this->User_Model->get_info_arr_fields('country_name','country_id', $list->country_id, 'country');
                      $state_info = $this->User_Model->get_info_arr_fields('state_name','state_id', $list->state_id, 'state');
                      $city_info = $this->User_Model->get_info_arr_fields('district_name as city_name','district_id', $list->city_id, 'district');
                    ?>
                      <tr>
                        <td class="d-none"><?php echo $i; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url() ?>Edit-Delivery-Address/<?php echo $list->address_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                            <?php if($list->is_default == 0){ ?>
                            <a href="<?php echo base_url() ?>Website/delete_delivery_address/<?php echo $list->address_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Address');"><i class="fa fa-trash text-danger"></i></a>
                          <?php } else{
                            echo ' <span class="text-success">Default</span>';
                          } ?>

                          </div>
                        </td>
                        <td><?php echo $list->address; ?></td>
                        <td><?php if($country_info){ echo $country_info[0]['country_name']; } ?></td>
                        <td><?php if($state_info){ echo $state_info[0]['state_name']; } ?></td>
                        <td><?php if($city_info){ echo $city_info[0]['city_name']; } ?></td>
                        <td><?php echo $list->pincode; ?></td>
                        <!-- <td>
                          <?php if($list->timeslot_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
                            else{ echo '<span class="text-success">Active</span>'; } ?>
                        </td> -->
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>













      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('save_success')){ ?>
      $(document).ready(function(){
        toastr.success('Saved successfully');
      });
    <?php } ?>
    <?php if($this->session->flashdata('update_success')){ ?>
      $(document).ready(function(){
        toastr.info('Updated successfully');
      });
    <?php } ?>
    <?php if($this->session->flashdata('delete_success')){ ?>
      $(document).ready(function(){
        toastr.error('Deleted successfully');
      });
    <?php } ?>
  </script>
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

    var pincode1 = $('#pincode').val();
    $('#pincode').on('change',function(){
      var pincode = $(this).val();
      $.ajax({
        url:'<?php echo base_url(); ?>User/check_duplication',
        type: 'POST',
        data: {"column_name":"tahsil_pincode_no",
               "column_val":pincode,
               "table_name":"tahsil_pincode"},
        context: this,
        success: function(result){
          if(result == 0){
            $('#pincode').val(pincode1);
            toastr.error(pincode+' is Invalid.');
            $('#pincode').focus();
          }
        }
      });
    });


  </script>
