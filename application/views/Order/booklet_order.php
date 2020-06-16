<!DOCTYPE html>
<html>
<?php
$page = "make_information_list";
?>
<style>
  td{
    padding:2px 10px !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 mt-1">
            <h4>Booklet Order Information</h4>
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
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> Booklet Order Information</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Customer Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th class="wt_50">View</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($booklet_order_list as $list) {
                    $i++;
                    $customer_id = $list->customer_id;
                    $customer_info = $this->User_Model->get_info_arr_fields('customer_fname,customer_lname','customer_id', $customer_id, 'customer')
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $customer_info[0]['customer_fname'].' '.$customer_info[0]['customer_lname']; ?></td>
                      <td><?php echo $list->order_upl_date; ?></td>
                      <td>
                        <?php if($list->order_upl_status == 0){
                          echo '<span class="text-danger">Inactive</span>';
                        } elseif ($list->order_upl_status == 1) {
                          echo '<span class="text-primary">Active</span>';
                        } elseif ($list->order_upl_status == 2) {
                          echo '<span class="text-success">Submited</span>';
                        } ?>
                      </td>
                      <td class="text-center">
                        <a href="#" class="btn_img_modal" img_name="<?php echo $list->order_upl_img; ?>" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-eye text-success"></i> </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
  <?php if($this->session->flashdata('update_success')){ ?>
    $(document).ready(function(){
      toastr.info('Updated successfully');
    });
  <?php } ?>

  $('.btn_img_modal').on('click', function(){
    var img_name = $(this).attr('img_name');
    $('.modal-body').html('<img width="100%" src="<?php echo base_url(); ?>assets/images/orders/'+img_name+'">');
  });
  </script>
</body>
</html>
