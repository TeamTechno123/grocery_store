<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Product Attribute</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="card-body row">

                  <div class="form-group col-md-8 offset-md-2">
                    <label>Product Name : </label>
                    <input type="text" class="form-control form-control-sm" name="product_name"  value="<?php if(isset($product_info)){ echo $product_info['product_name']; } ?>" placeholder="" readonly>
                  </div>
                  <div class="form-group col-md-4 offset-md-2 select_sm">
                    <label>Attribute Name : </label>
                    <select class="form-control select2 form-control-sm" name="attribute_id" id="attribute_id" data-placeholder="Select Attribute Name">
                      <option value="">Select Attribute Name</option>
                      <?php if(isset($attribute_list)){ foreach ($attribute_list as $list) { ?>
                      <option value="<?php echo $list->attribute_id; ?>" <?php if(isset($product_attribute_info) && $product_attribute_info['attribute_id'] == $list->attribute_id){ echo 'selected'; } ?>><?php echo $list->attribute_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Attribute Value : </label>
                    <select class="form-control select2 form-control-sm" name="attribute_val_id" id="attribute_val_id" data-placeholder="Select Attribute Name">
                      <option value="">Select Attribute Value</option>
                      <?php if(isset($product_attribute_info)){ ?>
                        <?php if(isset($attribute_val_list)){ foreach ($attribute_val_list as $list) { ?>
                        <option value="<?php echo $list->attribute_val_id; ?>" <?php if(isset($product_attribute_info) && $product_attribute_info['attribute_val_id'] == $list->attribute_val_id){ echo 'selected'; } ?>><?php echo $list->attribute_val_name; ?></option>
                        <?php } } ?>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <label>Product Price : </label>
                    <div class="row">
                      <select class="form-control form-control-sm col-md-2 mx-1" name="attribute_price_type" id="attribute_price_type" name="">
                        <option value="1" <?php if(isset($product_attribute_info) && $product_attribute_info['attribute_price_type'] == '1' ){ echo 'selected'; } ?>>+</option>
                        <option value="2" <?php if(isset($product_attribute_info) && $product_attribute_info['attribute_price_type'] == '2' ){ echo 'selected'; } ?>>-</option>
                      </select>
                      <input type="number" class="form-control form-control-sm col-md-9 mx-1" name="attribute_price" id="attribute_price"  value="<?php if(isset($product_attribute_info)){ echo $product_attribute_info['attribute_price']; } ?>" placeholder="">
                    </div>
                  </div>
                  <div class="form-group col-md-4 select_sm">
                    <label>Status : </label>
                    <select class="form-control select2 form-control-sm" name="product_attribute_status" id="product_attribute_status" data-placeholder="Select Attribute Name">
                      <option value="1" <?php if(isset($product_attribute_info) && $product_attribute_info['product_attribute_status'] == '1' ){ echo 'selected'; } ?>>Active</option>
                      <option value="0" <?php if(isset($product_attribute_info) && $product_attribute_info['product_attribute_status'] == '0' ){ echo 'selected'; } ?>>Inactive</option>
                    </select>
                  </div>

                  <div class="col-md-12 text-center">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </form>
                  <div class="col-md-12">
                    <table id="" class="table table-bordered tbl_list mt-4">
                      <thead>
                      <tr>
                        <th class="wt_50">#</th>
                        <th>Attribute Name</th>
                        <th>Attribute Value</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th class="wt_100">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0;
                        foreach ($product_attribute_list as $list) {
                          $i++;
                          $attribute_det = $this->User_Model->get_info_arr_fields('attribute_name','attribute_id', $list->attribute_id, 'attribute');
                          $attribute_val_det = $this->User_Model->get_info_arr_fields('attribute_val_name','attribute_val_id', $list->attribute_val_id, 'attribute_val');
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $attribute_det[0]['attribute_name']; ?></td>
                          <td><?php echo $attribute_val_det[0]['attribute_val_name']; ?></td>
                          <td>
                            <?php if($list->attribute_price_type == 1){ echo '+'; } elseif ($list->attribute_price_type == 2) { echo '-'; } ?>
                            <?php echo $list->attribute_price ?>
                          </td>
                          <td><?php if($list->product_attribute_status == 1){
                            echo "<span class='text-success'>Active</span>";
                            } else{
                              echo "<span class='text-danger'>Inactive</span>";
                            } ?>
                          </td>
                          <td class="wt_150">
                            <a href="<?php echo base_url(); ?>Product/edit_product_attribute/<?php echo $product_info['product_id']; ?>/<?php echo $list->product_attribute_id; ?>"> <i class="fa fa-edit"></i> </a>
                            <a href="<?php echo base_url(); ?>Product/delete_product_attribute/<?php echo $product_info['product_id']; ?>/<?php echo $list->product_attribute_id; ?>" onclick="return confirm('Delete this Attribute');" class="ml-3 text-danger"> <i class="fa fa-trash"></i> </a>
                          </td>
                        <?php } ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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

$("#attribute_id").on("change", function(){
  var attribute_id =  $('#attribute_id').find("option:selected").val();
  $.ajax({
    url:'<?php echo base_url(); ?>Product/get_attribute_val_by_id',
    type: 'POST',
    data: {"attribute_id":attribute_id},
    context: this,
    success: function(result){
      $('#attribute_val_id').html(result);
    }
  });
});


  $('#myTable').on('click', '.rem_img', function () {
    var product_images_id = $(this).attr('product_images_id');
    var product_images_name = $(this).attr('product_images_name');
    $.ajax({
      url: '<?php echo base_url(); ?>Product/delete_product_images',
      method:'post',
      data:{ 'product_images_id':product_images_id,
             'product_images_name':product_images_name, },
      context: this,
      success:function(){
        $(this).closest('tr').remove();
      }
    });
  });
</script>
</body>
</html>
