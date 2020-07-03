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
          <div class="col-sm-12 mt-1">
            <h4>Order Information</h4>
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
                  <th class="wt_100">Status</th>
                  <th class="wt_75">Payment</th>
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
                    <td class="wt_100">
                      <?php if($list->payment_status == 2){
                        echo '<span class="text-danger">Canceled</span>';
                      } else{ ?>
                        <a href="<?php echo base_url(); ?>Order/delivery_boy_order_status/<?php echo $list->order_id; ?>" class="btn btn-sm btn-outline-info w-100"><?php echo $list->order_status_name; ?></a>
                      <?php } ?>
                      <!-- <button  type="button" class="btn btn-sm btn-outline-info w-100 change_status" status="<?php echo $list->order_status; ?>" id="order_<?php echo $list->order_id; ?>" order_id="<?php echo $list->order_id; ?>" data-toggle="modal" data-target="#exampleModal">
                        <?php echo $list->order_status_name; ?>
                      </button> -->
                    </td>
                    <td class="text-center">
                      <?php if($list->payment_status == 1){
                        echo '<span class="text-success">Paid</span>';
                      } elseif ($list->payment_status == 2) {
                        echo '<span class="text-danger">Canceled</span>';
                      } else{ ?>
                        <a href="<?php echo base_url(); ?>Order/delivery_boy_payment_status/<?php echo $list->order_id; ?>" class="btn btn-sm btn-outline-info w-100">Unpaid</a>
                        <!-- <button  type="button" class="btn btn-sm btn-outline-info w-100 change_payment" status="<?php echo $list->payment_status; ?>" id="payment_<?php echo $list->order_id; ?>" order_id="<?php echo $list->order_id; ?>" data-toggle="modal" data-target="#paymentModal">
                          Unpaid
                        </button> -->
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <a class="ml-2 text-success" href="<?php echo base_url(); ?>Order/order_details/<?php echo $list->order_id; ?>"> <i class="fa fa-eye"></i> </a>
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
                <?php if(isset($order_status_list)){ foreach ($order_status_list as $list) {
                  if($list->order_status_id == 4 || $list->order_status_id == 5 ||$list->order_status_id == 6){
                ?>
                <option value="<?php echo $list->order_status_id; ?>" ><?php echo $list->order_status_name; ?></option>
              <?php } } } ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="save_status" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Payment -->
      <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body select_sm">
              <input type="hidden" name="order_id" id="pay_order_id">
              <label>Payment Status </label>
              <select class="form-control form-control-sm" name="payment_status" id="payment_status" data-placeholder="Select Status">
                <option value="0">Select Payment Status</option>
                <option value="1">Paid</option>
                <option value="2">Order Canceled</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="save_payment_status" class="btn btn-primary" data-dismiss="modal">Save changes</button>
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
      $('#order_id').val(order_id);
      $('#order_status').val(status);
    });

    $('#save_status').on('click', function(){
      var order_status = $('#order_status').val();
      var order_id = $('#order_id').val();
      $.ajax({
        method:"post",
        data:{"order_status":order_status,
              "order_id":order_id,},
        url:'update_order_status',
        success:function(result){
          $('#order_'+order_id+'').text(result);
        }
      });
    });


    // change_status
    $('.change_payment').on('click', function(){
      var status = $(this).attr('status');
      var order_id = $(this).attr('order_id');

      $('#pay_order_id').val(order_id);
      $('#payment_status').val(status);
    });

    $('#save_payment_status').on('click', function(){
      var payment_status = $('#payment_status').val();
      var order_id = $('#pay_order_id').val();
      $.ajax({
        method:"post",
        data:{"payment_status":payment_status,
              "order_id":order_id,},
        url:'update_order_payment_status',
        success:function(result){
          // alert('Payment Status Changed');
          toastr.info('Payment Status Changed');
          var base_url = "<?php echo base_url(); ?>";
          window.location.href = base_url+"Order/delivery_boy_order_list";
          //$('#payment_'+order_id+'').text(result);
        }
      });
    });
  </script>
</body>
</html>
