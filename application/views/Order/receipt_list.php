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
            <h4>Receipt Information</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
            <a href="<?php echo base_url(); ?>Order/receipt" class="btn btn-sm btn-primary">Add Receipt</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body p-0">
              <table id="example1" class="table table-bordered tbl_list">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th class="wt_100">Date</th>
                  <th>Customer Name</th>
                  <th class="wt_75">Amount</th>
                  <th class="wt_75">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($receipt_list as $list) {
                    $customer_id = $list->customer_id;
                    $customer_info = $this->User_Model->get_info_arr_fields('customer_fname,customer_lname','customer_id', $customer_id, 'customer');
                    $i++;
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->receipt_date; ?></td>
                    <td><?php echo $customer_info[0]['customer_fname'].' '.$customer_info[0]['customer_lname']; ?></td>
                    <td><?php echo $list->receipt_amt; ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>Order/edit_receipt/<?php echo $list->receipt_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Order/delete_receipt/<?php echo $list->receipt_id; ?>" onclick="return confirm('Delete this Receipt Information');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                    </td>
                  <?php } ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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
