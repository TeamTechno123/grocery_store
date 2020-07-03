<!DOCTYPE html>
<?php $eco_role_id = $this->session->userdata('eco_role_id'); ?>
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
            <h4>Stock Information</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
          <?php //if($eco_role_id == 1 || $eco_role_id == 2 || $eco_role_id == 3 || $eco_role_id == 4){ ?>
            <!-- <a href="<?php echo base_url(); ?>Transaction/sale" class="btn btn-sm btn-primary">Add Stock</a> -->
          <?php //} ?>
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
                  <th>Item Name</th>
                  <th class="wt_125">Total Purchase</th>
                  <th class="wt_125">Total Sale</th>
                  <th class="wt_125">Balance Stock</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($product_list as $list) {
                    $i++;
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->product_name.' - '.$list->pro_attri_weight.''.$list->unit_name; ?></td>
                    <td><?php echo $list->tot_purchase.' - '.$list->tot_purchase_qty; ?></td>
                    <td><?php echo $list->tot_sale.' - '.$list->total_sale_qty; ?></td>
                    <td><?php echo $list->bal_stock.' - '.$list->bal_qty_stock; ?></td>
                    </tr>
                  <?php } ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

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
