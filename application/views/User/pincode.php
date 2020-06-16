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
            <h1>PINCODE INFORMATION</h1>
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
                <h3 class="card-title">Add Pincode </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Enter Tahsil Name</label>
                        <input type="text" class="form-control form-control-sm" name="tahsil_name" id="tahsil_name" value="<?php if(isset($tahsil_info)){ echo $tahsil_info['tahsil_name']; } ?>" placeholder="Enter Tahsil Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12 text-right">
                    <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                  </div>

                  <div class="form-group col-md-12">
                    <table id="myTable" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th width="45%">Enter Area / Village Name</th>
                        <th>Enter Pincode</th>
                        <th class="wt_50"></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($tahsil_pincode_list)){
                          $i=0;
                          foreach ($tahsil_pincode_list as $pincode_list) {
                        ?>
                          <input type="hidden" name="input[<?php echo $i; ?>][tahsil_pincode_id]" value="<?php echo $pincode_list->tahsil_pincode_id; ?>">
                          <tr>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][tahsil_pincode_area]" value="<?php echo $pincode_list->tahsil_pincode_area; ?>" placeholder="Enter Area / Village Name" required>
                            </td>
                            <td class="wt_100">
                              <input type="text" class="form-control form-control-sm" name="input[<?php echo $i; ?>][tahsil_pincode_no]" value="<?php echo $pincode_list->tahsil_pincode_no; ?>" placeholder="Enter Pincode" required>
                            </td>
                            <td class="wt_50"><?php if($i>0){ ?><a class="rem_row"><i class="fa fa-trash text-danger"></i></a><?php } ?></td>
                          </tr>
                        <?php $i++;  }  } else{ ?>
                          <tr>
                            <td class="wt_150">
                              <input type="text" class="form-control form-control-sm" name="input[0][tahsil_pincode_area]" placeholder="Enter Area / Village Name" required>
                            </td>
                            <td class="wt_100">
                              <input type="text" class="form-control form-control-sm" name="input[0][tahsil_pincode_no]" placeholder="Enter Pincode" required>
                            </td>
                            <td class="wt_50"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer row">
                  <!-- <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="mem_sch_status" id="mem_sch_status" value="1" <?php if(isset($mem_sch_info) && $mem_sch_info['mem_sch_status'] == 1){ echo 'checked'; } elseif (!isset($mem_sch_info)){ echo 'checked'; } ?>>
                      <label for="mem_sch_status" class="custom-control-label">Active</label>
                    </div>
                  </div> -->
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
      '<td class="wt_150">'+
        '<input type="text" class="form-control form-control-sm" name="input['+i+'][tahsil_pincode_area]" placeholder="Enter Area / Village Name" required>'+
      '</td>'+
      '<td class="wt_100">'+
        '<input type="text" class="form-control form-control-sm" name="input['+i+'][tahsil_pincode_no]" placeholder="Enter Pincode" required>'+
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
