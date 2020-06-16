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
                <h3 class="card-title">Product Images</h3>
              </div>
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="card-body row">

                  <div class="form-group col-md-6 offset-md-3">
                    <label>Product Name : </label>
                    <input type="text" class="form-control form-control-sm" name="product_name"  value="<?php if(isset($product_info)){ echo $product_info['product_name']; } ?>" placeholder="" readonly>
                  </div>
                  <div class="form-group col-md-6 offset-md-3 text-right">
                    <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                  </div>
                  <div class="form-group col-md-6 offset-md-3">
                    <table id="myTable" class="table table-bordered tbl_list">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th class="wt_50"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($product_images_list){ foreach ($product_images_list as $list) { ?>
                          <tr>
                            <td class="">
                              <img width="30%" src="<?php echo base_url(); ?>assets/images/product/<?php echo $list->product_images_name; ?>" alt="">
                            </td>
                            <td class="wt_50"><a class="rem_img" product_images_id="<?php echo $list->product_images_id; ?>" product_images_name="<?php echo $list->product_images_name; ?>" ><i class="fa fa-trash text-danger"></i></a></td>
                          </tr>
                        <?php }  } else{ ?>
                          <tr>
                            <td class="">
                              <input type="file" class="form-control form-control-sm" name="product_images_name[]" id="" value="" placeholder="" required>
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-12 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/supplier_list" class="btn btn-default ml-4">Cancel</a>
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
      '<td class="">'+
        '<input type="file" class="form-control form-control-sm" name="product_images_name[]" id="" value="" placeholder="" required>'+
      '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });

  $('#myTable').on('click', '.rem_img', function () {
    var product_images_id = $(this).attr('product_images_id');
    var product_images_name = $(this).attr('product_images_name');
    // alert(product_images_id);
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
