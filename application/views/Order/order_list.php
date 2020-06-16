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
            <h4>Order Information</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
          <?php //if($eco_role_id == 1 || $eco_role_id == 2 || $eco_role_id == 3 || $eco_role_id == 4){ ?>
            <a href="<?php echo base_url(); ?>Order/order" class="btn btn-sm btn-primary">Add Order</a>
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
                  <th class="wt_100">Date</th>
                  <th>Customer Name</th>
                  <th class="wt_75">Amount</th>
                  <th class="wt_75">Status</th>
                  <th class="wt_75">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($order_list as $list) {
                    $i++;
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->order_date; ?></td>
                    <td><?php echo $list->customer_fname.' '.$list->customer_lname; ?></td>
                    <td><?php echo $list->order_total_amount; ?></td>
                    <td>
                      <button  type="button" class="btn btn-sm btn-outline-info w-100 change_status" status="<?php echo $list->order_status; ?>" id="order_<?php echo $list->order_id; ?>" order_id="<?php echo $list->order_id; ?>" order_assign_to="<?php echo $list->order_assign_to; ?>" data-toggle="modal" data-target="#exampleModal">
                        <?php echo $list->order_status_name; ?>
                      </button>
                    </td>
                    <td class="text-center">
                      <a class="ml-2 text-success" href="<?php echo base_url(); ?>Order/order_details/<?php echo $list->order_id; ?>"> <i class="fa fa-eye"></i> </a>
                      <?php //if($eco_role_id == 1 || $eco_role_id == 2){ ?>
                      <a class="ml-2 text-primary" href="<?php echo base_url(); ?>Order/edit_order/<?php echo $list->order_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Order/delete_order/<?php echo $list->order_id; ?>" onclick="return confirm('Delete this Order Information');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                      <?php //} ?>
                    </td>
                  <?php } ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Change Status -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body select_sm">
              <input type="hidden" name="order_id" id="order_id">
              <label>Status </label>
              <select class="form-control form-control-sm" name="order_status" id="order_status" data-placeholder="Select Status">
                <?php if(isset($order_status_list)){ foreach ($order_status_list as $list) { ?>
                  <option value="<?php echo $list->order_status_id; ?>" ><?php echo $list->order_status_name; ?></option>
                <?php } } ?>
              </select>
              <label>Assign To </label>
              <select class="form-control form-control-sm" name="order_assign_to" id="order_assign_to" data-placeholder="Select Delivery Boy">
                <option value="">Select Delivery Boy</option>
                <?php if(isset($delivery_boy_list)){ foreach ($delivery_boy_list as $list) { ?>
                  <option value="<?php echo $list->user_id; ?>" ><?php echo $list->user_name; ?></option>
                <?php } } ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="save_status" class="btn btn-primary" data-dismiss="modal">Save changes</button>
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
  <script type="text/javascript">
    // change_status
    $('.change_status').on('click', function(){
      var status = $(this).attr('status');
      var order_id = $(this).attr('order_id');
      var order_assign_to = $(this).attr('order_assign_to');
      $('#order_id').val(order_id);
      $('#order_status').val(status);
      $('#order_assign_to').val(order_assign_to);
    });

    $('#save_status').on('click', function(){
      var order_status = $('#order_status').val();
      var order_assign_to = $('#order_assign_to').val();
      var order_id = $('#order_id').val();
      $.ajax({
        method:"post",
        data:{"order_status":order_status,
              "order_assign_to":order_assign_to,
              "order_id":order_id,},
        url:'update_order_status',
        success:function(result){
          $('#order_'+order_id+'').text(result);
        }
      });
    });
  </script>
</body>
</html>
