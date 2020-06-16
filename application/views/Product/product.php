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
            <h1>Product</h1>
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
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="col-md-10 offset-md-1 ">
                    <div class="row">
                      <!-- <div class="form-group col-md-6 select_sm ">
                        <label>Product Type</label>
                        <select class="form-control select2 form-control-sm" name="product_type" id="product_type" data-placeholder="Select Tags">
                          <option value="">Choose Product Type</option>
                          <option <?php if(isset($product_info) && $product_info['product_type'] == 'Simple'){ echo 'selected'; } ?>>Simple</option>
                          <option <?php if(isset($product_info) && $product_info['product_type'] == 'Variable'){ echo 'selected'; } ?>>Variable</option>
                          <option <?php if(isset($product_info) && $product_info['product_type'] == 'External'){ echo 'selected'; } ?>>External</option>
                        </select>
                      </div> -->
                      <div class="form-group col-md-4 select_sm">
                        <label>Manufacturer</label>
                        <select class="form-control select2 form-control-sm" name="manufacturer_id" id="manufacturer_id" data-placeholder="Select Manufacturer">
                          <option value="">Select Manufacturer</option>
                          <?php if(isset($manufacturer_list)){ foreach ($manufacturer_list as $list) { ?>
                          <option value="<?php echo $list->manufacturer_id; ?>" <?php if(isset($product_info) && $product_info['manufacturer_id'] == $list->manufacturer_id){ echo 'selected'; } ?>><?php echo $list->manufacturer_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4 select_sm">
                        <label>Main Category</label>
                        <select class="form-control select2 form-control-sm" name="main_category_id" id="main_category_id" data-placeholder="Main Category">
                          <option value="">Main Category</option>
                          <?php if(isset($main_category_list)){ foreach ($main_category_list as $list) { ?>
                          <option value="<?php echo $list->category_id; ?>" <?php if(isset($product_info) && $product_info['main_category_id'] == $list->category_id){ echo 'selected'; } ?>><?php echo $list->category_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4 select_sm">
                        <label>Sub Category</label>
                        <select class="form-control select2 form-control-sm" name="category_id" id="category_id" data-placeholder="Sub Category">
                          <option value="">Sub Category</option>
                          <?php if(isset($category_list)){ foreach ($category_list as $list) { ?>
                          <option value="<?php echo $list->category_id; ?>" <?php if(isset($product_info) && $product_info['category_id'] == $list->category_id){ echo 'selected'; } ?>><?php echo $list->category_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Is Feature</label>
                        <select class="form-control form-control-sm" name="is_feature" id="is_feature" data-placeholder="Is Feature">
                          <option value="0" <?php if(isset($product_info) && $product_info['is_feature'] == '0'){ echo 'selected'; } ?>>No</option>
                          <option value="1" <?php if(isset($product_info) && $product_info['is_feature'] == '1'){ echo 'selected'; } ?>>Yes</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Status</label>
                        <select class="form-control form-control-sm" name="product_status" id="product_status" data-placeholder="Status">
                          <option value="1" <?php if(isset($product_info) && $product_info['product_status'] == '1'){ echo 'selected'; } ?>>Active</option>
                          <option value="0" <?php if(isset($product_info) && $product_info['product_status'] == '0'){ echo 'selected'; } ?>>Inactive</option>
                        </select>
                      </div>

                      <!-- <div class="form-group col-md-4">
                        <label>Product MRP</label>
                        <input type="number" min="1" step="0.01" class="form-control form-control-sm" name="product_mrp" id="product_mrp" value="<?php if(isset($product_info)){ echo $product_info['product_mrp']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Product Price</label>
                        <input type="number" min="1" step="0.01" class="form-control form-control-sm" name="product_price" id="product_price" value="<?php if(isset($product_info)){ echo $product_info['product_price']; } ?>" placeholder="" required>
                      </div> -->

                      <div class="form-group col-md-4 select_sm ">
                        <label>Tax Slab</label>
                        <select class="form-control select2 form-control-sm" name="tax_rate" id="tax_rate" data-placeholder="Tax Slab">
                          <option value="">Select Tax Slab</option>
                          <?php if(isset($tax_list)){ foreach ($tax_list as $list) { ?>
                          <option value="<?php echo $list->tax_rate; ?>" <?php if(isset($product_info) && $product_info['tax_rate'] == $list->tax_rate){ echo 'selected'; } ?>><?php echo $list->tax_title; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label>Min Order Limit</label>
                        <input type="number" class="form-control form-control-sm" name="min_ord_limit" id="min_ord_limit" value="<?php if(isset($product_info)){ echo $product_info['min_ord_limit']; } ?>" placeholder="" >
                      </div>
                      <div class="form-group col-md-4">
                        <label>Max Order Limit</label>
                        <input type="number" class="form-control form-control-sm" name="max_ord_limit" id="max_ord_limit" value="<?php if(isset($product_info)){ echo $product_info['max_ord_limit']; } ?>" placeholder="" >
                      </div>
                      <div class="form-group col-md-4">
                        <label>Reward Point</label>
                        <input type="number" min="0" class="form-control form-control-sm" name="product_reward" id="product_reward" value="<?php if(isset($product_info)){ echo $product_info['product_reward']; } ?>" placeholder="" >
                      </div>

                      <!-- <div class="form-group col-md-4">
                        <label>Product Weight</label>
                        <input type="number" min="0.01" step="0.01" class="form-control form-control-sm" name="product_weight" id="product_weight" value="<?php if(isset($product_info)){ echo $product_info['product_weight']; } ?>" placeholder="" >
                      </div> -->
                      <div class="form-group col-md-4 select_sm">
                        <label>Unit</label>
                        <select class="form-control select2 form-control-sm" name="product_unit" id="product_unit" data-placeholder="Select Unit" required>
                          <option value="">Select Unit</option>
                          <?php if(isset($unit_list)){ foreach ($unit_list as $list) { ?>
                          <option value="<?php echo $list->unit_name; ?>" <?php if(isset($product_info) && $product_info['product_unit'] == $list->unit_name){ echo 'selected'; } ?>><?php echo $list->unit_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label>Image</label>
                        <input type="file" name="product_img" id="product_img" class="form-control form-control-sm" id="exampleInputFile">
                      </div>
                      <?php if(isset($product_info['product_img'])){ ?>
                      <div class="form-group col-md-4">
                        <img width="80%" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_info['product_img']; ?>" alt="">
                        <input type="hidden" name="old_img" value="<?php echo $product_info['product_img']; ?>">
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                <div class="col-md-12">
                  <hr>
                </div>

              <!-- <div class="col-md-5 offset-md-1 px-4">
                <div class="row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Flash Sale</label>
                    <select class="form-control select2 form-control-sm" name="flash_sale" id="flash_sale" data-placeholder="Flash Sale">
                      <option <?php if(isset($product_info) && $product_info['flash_sale'] == 'No'){ echo 'selected'; } ?>>No</option>
                      <option <?php if(isset($product_info) && $product_info['flash_sale'] == 'Yes'){ echo 'selected'; } ?>>Yes</option>
                    </select>
                  </div>

                  <div class="form-group col-md-12 div_flash_sale">
                    <label>Flash Sale Price</label>
                    <input type="number" class="form-control form-control-sm" name="flash_sale_price" id="flash_sale_price" value="<?php if(isset($product_info) && $product_info['flash_sale_price'] != 0){ echo $product_info['flash_sale_price']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-6 div_flash_sale">
                    <label>Flash Sale Start Date*</label>
                    <input type="text" class="form-control form-control-sm" name="flash_sale_start_date" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($product_info)){ echo $product_info['flash_sale_start_date']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-6 div_flash_sale">
                      <label>time</label>
                    <input type="text" class="form-control form-control-sm" name="flash_sale_start_time" id="timepicker1" data-target="#timepicker1" data-toggle="datetimepicker" value="<?php if(isset($product_info)){ echo $product_info['flash_sale_start_time']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-6 div_flash_sale">
                    <label>Flash Sale End Date*</label>
                    <input type="text" class="form-control form-control-sm" name="flash_sale_end_date" id="date2" data-target="#date2" data-toggle="datetimepicker" value="<?php if(isset($product_info)){ echo $product_info['flash_sale_end_date']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-6 div_flash_sale">
                    <label>time</label>
                    <input type="text" class="form-control form-control-sm" name="flash_sale_end_time" id="timepicker2" data-target="#timepicker2" data-toggle="datetimepicker" value="<?php if(isset($product_info)){ echo $product_info['flash_sale_end_time']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-6 select_sm div_flash_sale">
                    <label>Status</label>
                    <select class="form-control select2 form-control-sm" name="flash_sale_status" id="flash_sale_status" data-placeholder="Status">
                      <option value="1" <?php if(isset($product_info) && $product_info['flash_sale_status'] == '1'){ echo 'selected'; } ?>>Active</option>
                      <option value="0" <?php if(isset($product_info) && $product_info['flash_sale_status'] == '0'){ echo 'selected'; } ?>>Inactive</option>
                    </select>
                  </div>

                </div>
              </div>

              <div class="col-md-5 px-4">
                <div class="row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Special</label>
                    <select class="form-control select2 select_sm" name="pro_special" id="pro_special" data-placeholder="Special">
                      <option <?php if(isset($product_info) && $product_info['pro_special'] == 'No'){ echo 'selected'; } ?>>No</option>
                      <option <?php if(isset($product_info) && $product_info['pro_special'] == 'Yes'){ echo 'selected'; } ?>>Yes</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12 div_pro_special">
                    <label>Special Price*</label>
                    <input type="number" class="form-control form-control-sm" name="pro_special_price" id="pro_special_price" value="<?php if(isset($product_info) && $product_info['pro_special_price'] != 0 ){ echo $product_info['pro_special_price']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-12 div_pro_special">
                    <label>Expiry Date*</label>
                    <input type="text" class="form-control form-control-sm" name="pro_special_exp_date" id="date3" data-target="#date3" data-toggle="datetimepicker" value="<?php if(isset($product_info)){ echo $product_info['pro_special_exp_date']; } ?>" placeholder="" >
                  </div>
                  <div class="form-group col-md-6 div_pro_special">
                    <label>Status</label>
                    <select class="form-control form-control-sm" name="pro_special_status" id="pro_special_status" data-placeholder="Status">
                      <option value="1" <?php if(isset($product_info) && $product_info['pro_special_status'] == '1'){ echo 'selected'; } ?>>Active</option>
                      <option value="0" <?php if(isset($product_info) && $product_info['pro_special_status'] == '0'){ echo 'selected'; } ?>>Inactive</option>
                    </select>
                  </div>
                </div>
              </div> -->

              <!-- <div class="col-md-12">
                <hr>
              </div> -->
              <div class="col-md-8 offset-md-2">
                <div class="form-group col-md-12">
                  <label>Product Name</label>
                  <input type="text" class="form-control form-control-sm" name="product_name" id="product_name" value="<?php if(isset($product_info)){ echo $product_info['product_name']; } ?>" placeholder="" required>
                </div>
                <div class="col-md-12">
                  <label>Description</label>
                  <textarea class="textarea" name="product_details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php if(isset($product_info)){ echo $product_info['product_details']; } ?> </textarea>
                </div>
              </div>
              <div class="col-md-12">
                <hr>
              </div>
              <!-- <div class="col-md-8 offset-md-2">
                <div class="custom-control custom-checkbox ml-2">
                  <input class="custom-control-input" type="checkbox" name="use_attribute" id="use_attribute" value="1" <?php if(isset($product_info)&& $product_info['use_attribute']=='1') { echo 'checked'; } ?>>
                  <label for="use_attribute" class="custom-control-label">Use Attribute</label>
                </div>
              </div> -->

              <div class="col-md-4 mt-3 offset-md-2">
                <label style="font-size:16px !important;" >Add Attribute</label>
              </div>
              <div class="col-md-4 mt-3 text-right">
                <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">Add Row</button>
              </div>
              <div class="col-md-10 offset-md-1">
                <div class="" style="overflow-x:auto;">
                  <table id="myTable" class="table table-bordered tbl_list">
                    <thead>
                    <tr>
                      <th>Weight</th>
                      <th>Unit</th>
                      <th>MRP</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th class="wt_50"></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($product_attribute_list)){ $i = 0; foreach ($product_attribute_list as $list) { ?>
                        <input type="hidden" name="input[<?php echo $i; ?>][pro_attri_id]" value="<?php echo $list->pro_attri_id; ?>">
                        <tr>
                          <td>
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_weight]" value="<?php echo $list->pro_attri_weight; ?>" required>
                          </td>
                          <td>
                            <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_unit]" data-placeholder="Select Unit" required>
                              <option value="">Select Unit</option>
                              <?php if(isset($unit_list)){ foreach ($unit_list as $list2) { ?>
                              <option value="<?php echo $list2->unit_id; ?>" <?php if($list2->unit_id == $list->pro_attri_unit ){ echo 'selected'; } ?>><?php echo $list2->unit_name; ?></option>
                              <?php } } ?>
                            </select>
                          </td>
                          <td>
                            <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_mrp]" value="<?php echo $list->pro_attri_mrp; ?>" required>
                          </td>
                          <td>
                            <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_price]" value="<?php echo $list->pro_attri_price; ?>" required>
                          </td>
                          <td class="wt_150">
                            <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_status]" required>
                              <option value="1" <?php if($list->pro_attri_status == 1 ){ echo 'selected'; } ?>>Active</option>
                              <option value="0" <?php if($list->pro_attri_status == 0 ){ echo 'selected'; } ?>>Inactive</option>
                            </select>
                          </td>
                          <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                        </tr>
                      <?php $i++;  } } else{ ?>
                        <tr>
                          <td>
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm" name="input[0][pro_attri_weight]" required>
                          </td>
                          <td>
                            <select class="form-control form-control-sm" name="input[0][pro_attri_unit]" data-placeholder="Select Unit" required>
                              <option value="">Select Unit</option>
                              <?php if(isset($unit_list)){ foreach ($unit_list as $list) { ?>
                              <option value="<?php echo $list->unit_id; ?>" ><?php echo $list->unit_name; ?></option>
                              <?php } } ?>
                            </select>
                          </td>
                          <td>
                            <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm" name="input[0][pro_attri_mrp]" required>
                          </td>
                          <td>
                            <input type="number" min="0.01" step="0.01"  class="form-control form-control-sm" name="input[0][pro_attri_price]" required>
                          </td>
                          <td class="wt_150">
                            <select class="form-control form-control-sm" name="input[0][pro_attri_status]" required>
                              <option value="1" >Active</option>
                              <option value="0" >Inactive</option>
                            </select>
                          </td>
                          <td class="wt_50"></td>
                        </tr>
                      <?php } ?>

                      <!-- <?php if(isset($product_attribute_list)){ $i = 0; foreach ($product_attribute_list as $list) { ?>
                        <input type="hidden" name="input[<?php echo $i; ?>][pro_attri_id]" value="<?php echo $list->pro_attri_id; ?>">
                        <tr>
                          <td>
                            <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_name]" value="<?php echo $list->pro_attri_name; ?>" placeholder="" required>
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_price]" value="<?php echo $list->pro_attri_price; ?>" placeholder="" required>
                          </td>
                          <td class="wt_150">
                            <select class="form-control form-control-sm" name="input[<?php echo $i; ?>][pro_attri_status]" required>
                              <option value="">Select Status</option>
                              <option value="1" <?php if($list->pro_attri_status == 1){ echo 'selected'; } ?>>Active</option>
                              <option value="0" <?php if($list->pro_attri_status == 0){ echo 'selected'; } ?>>Inactive</option>
                            </select>
                          </td>
                          <td class="wt_50"><?php if($i > 0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                        </tr>
                      <?php $i++;  } } else{ ?>
                        <tr>
                          <td>
                            <input type="text" class="form-control form-control-sm" name="input[0][pro_attri_name]" placeholder="" required>
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" name="input[0][pro_attri_price]" placeholder="" required>
                          </td>
                          <td class="wt_150">
                            <select class="form-control form-control-sm" name="input[0][pro_attri_status]" required>
                              <option value="">Select Status</option>
                              <option value="1" >Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </td>
                          <td class="wt_50"></td>
                        </tr>
                      <?php } ?> -->
                    </tbody>
                  </table>
                </div>
              </div>


            </div>
                <div class="card-footer row m-0">
                  <div class="col-md-6">
                    <!-- <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="product_status" id="product_status" value="1" checked>
                      <label for="supplier_status" class="custom-control-label">Active</label>
                    </div> -->
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

    $(document).ready(function(){
      var flash_sale =  $('#flash_sale').find("option:selected").val();
      if(flash_sale == 'Yes'){
        $('.div_flash_sale').css('display','block');
        flash_sale_required();
      } else{
        $('.div_flash_sale').css('display','none');
        flash_sale_not_required();
      }
      var pro_special =  $('#pro_special').find("option:selected").val();
      if(pro_special == 'Yes'){
        $('.div_pro_special').css('display','block');
        pro_special_required()
      } else{
        $('.div_pro_special').css('display','none');
        pro_special_not_required()
      }
    });

    $('#flash_sale').change(function(){
      var flash_sale = $(this).val();
      if(flash_sale == 'Yes'){
        $('.div_flash_sale').css('display','block');
        flash_sale_required();
      } else{
        $('.div_flash_sale').css('display','none');
        flash_sale_not_required();
      }
    });

    $('#pro_special').change(function(){
      var pro_special = $(this).val();
      if(pro_special == 'Yes'){
        $('.div_pro_special').css('display','block');
        pro_special_required()
      } else{
        $('.div_pro_special').css('display','none');
        pro_special_not_required()
      }
    });

    function flash_sale_required(){
      $('#flash_sale_price, #date1, #timepicker1, #date2, #timepicker2').attr('required', true);
    }
    function flash_sale_not_required(){
      $('#flash_sale_price, #date1, #timepicker1, #date2, #timepicker2').attr('required', false);
    }

    function pro_special_required(){
      $('#pro_special_price, #date3').attr('required', true);
    }
    function pro_special_not_required(){
      $('#pro_special_price, #date3').attr('required', false);
    }
  </script>

  <script type="text/javascript">
    // Add Row...
    <?php if(isset($update)){ ?>
    var i = <?php echo $i-1; ?>
    <?php } else { ?>
    var i = 0;
    <?php } ?>

    $('#add_row').click(function(){
      i++;
      var row = ''+
      '<tr>'+
        '<td>'+
          '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm" name="input['+i+'][pro_attri_weight]" required>'+
        '</td>'+
        '<td>'+
          '<select class="form-control form-control-sm" name="input['+i+'][pro_attri_unit]" data-placeholder="Select Unit" required>'+
            '<option value="">Select Unit</option>'+
            '<?php if(isset($unit_list)){ foreach ($unit_list as $list) { ?>'+
            '<option value="<?php echo $list->unit_id; ?>" ><?php echo $list->unit_name; ?></option>'+
            '<?php } } ?>'+
          '</select>'+
        '</td>'+
        '<td>'+
          '<input type="number" min="0.01" step="0.01"  class="form-control form-control-sm" name="input['+i+'][pro_attri_mrp]" placeholder="" required>'+
        '</td>'+
        '<td>'+
          '<input type="number" min="0.01" step="0.01"  class="form-control form-control-sm" name="input['+i+'][pro_attri_price]" placeholder="" required>'+
        '</td>'+
        '<td class="wt_150">'+
          '<select class="form-control form-control-sm" name="input['+i+'][pro_attri_status]" required>'+
            '<option value="1" >Active</option>'+
            '<option value="0">Inactive</option>'+
          '</select>'+
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
