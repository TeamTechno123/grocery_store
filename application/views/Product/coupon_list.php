<!DOCTYPE html>
<html>
<style>
  td{ padding:2px 10px !important; }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-1">
            <h4>Coupon</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
            <a href="<?php echo base_url(); ?>Product/coupon" class="btn btn-sm btn-primary">Add Coupon</a>
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
            <!-- <div class="card"> -->
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table id="example1" class="table table-bordered tbl_list">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Coupon Code</th>
                  <th>Expire Date</th>
                  <th class="wt_75">Status</th>
                  <th class="wt_75">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($coupon_list as $list) {
                    $i++; ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->coupon_code ?></td>
                    <td><?php echo $list->coupon_exp_date ?></td>
                    <td><?php if($list->coupon_status == 1){ echo 'Active'; } else{ echo 'Inactive'; } ?></td>
                    <td class="text-center">
                      <a href="<?php echo base_url(); ?>Product/edit_coupon/<?php echo $list->coupon_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Product/delete_coupon/<?php echo $list->coupon_id; ?>" onclick="return confirm('Delete this User');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                    </td>
                  <?php } ?>
                  </tr>
                </tbody>
              </table>
            <!-- </div> -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
</body>
</html>
