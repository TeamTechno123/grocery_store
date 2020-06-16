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
            <h1>Product Attributes</h1>
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
                <h3 class="card-title">Add Product Attributes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" class="form-control form-control-sm" name="attribute_name" id="attribute_name" value="<?php if(isset($attribute_name)){ echo $attribute_name; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12 text-right">
                        <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                      </div>
                      <div class="form-group col-md-12">
                        <table id="myTable" class="table table-bordered tbl_list">
                          <thead>
                          <tr>
                            <th>Attribute value</th>
                            <th class="wt_50"></th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php if(isset($attribute_val_list)){ $i=0; foreach ($attribute_val_list as $list) { ?>
                              <input type="hidden" name="input[<?php echo $i; ?>][attribute_val_id]" value="<?php echo  $list->attribute_val_id; ?>">
                              <tr>
                                <td>
                                  <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][attribute_val_name]" value="<?php echo $list->attribute_val_name; ?>" placeholder="" required>
                                </td>
                                <td class="wt_50"><?php if($i>0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                              </tr>
                            <?php $i++; } } else{ ?>
                              <tr>
                                <td>
                                  <input type="text" class="form-control form-control-sm" name="input[0][attribute_val_name]" value="" placeholder="" required>
                                </td>
                                <td class="wt_50"></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <!-- <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="supplier_status" id="supplier_status" value="1" checked>
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
          '<input type="text" class="form-control form-control-sm" name="input['+i+'][attribute_val_name]" value="" placeholder="" required>'+
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
