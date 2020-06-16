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
            <h4>Product</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
            <a href="<?php echo base_url(); ?>Product/product" class="btn btn-sm btn-primary">Add Product</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card-body p-0">
              <table id="example1" class="table table-bordered tbl_list">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Product Name</th>
                  <th>Added/ Modified Date</th>
                  <th>Status</th>
                  <th class="wt_100">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($product_list as $list) {
                    $i++; ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->product_name ?></td>
                    <td><?php echo $list->product_date ?></td>
                    <td><?php if($list->product_status == 1){
                      echo "<span class='text-success'>Active</span>";
                    } else{
                      echo "<span class='text-danger'>Inactive</span>";
                    } ?></td>
                    <td class="wt_150">
                      <a href="<?php echo base_url(); ?>Product/edit_product/<?php echo $list->product_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Product/delete_product/<?php echo $list->product_id; ?>" onclick="return confirm('Delete this Product');" class="ml-3 text-danger"> <i class="fa fa-trash"></i> </a>
                      <br> <a href="<?php echo base_url(); ?>Product/product_images/<?php echo $list->product_id; ?>" class="btn btn-sm btn-warning mt-1 w-100" href="#">Product Images</a>
                      <!-- <br> <a href="<?php echo base_url(); ?>Product/product_attribute/<?php echo $list->product_id; ?>" class="btn btn-sm btn-info mt-1 w-100" href="#">Product Attri</a> -->
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
