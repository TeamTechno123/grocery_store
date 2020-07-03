<?php include('header.php'); ?>

<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h3>My Orders</h3>
          <hr class="hr-web">
          <div class="row m-autoscroll">
            <?php if($order_list){ ?>
              <table class="table table-bordered m-0 " id="tbl_modal_cart">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th style="width:120px !important;">Status</th>
                    <th style="width:50px !important;">View</th>
                    <th style="width:120px !important;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($order_list as $order_list1) {
                    $i++;
                    $order_status = $order_list1->order_status;
                    $status_info = $this->User_Model->get_info_arr_fields('order_status_name','order_status_id', $order_status, 'order_status');
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $order_list1->order_date; ?></td>
                      <td><?php echo $order_list1->order_total_amount; ?></td>
                      <td>
                        <?php if($order_list1->payment_status == 2){
                          echo '<span class="text-danger text-bold">Canceled</span>';
                        } else{ ?>
                          <a href="<?php echo base_url(); ?>Order-Tracking/<?php echo $order_list1->order_id; ?>"> <button type="button" class="btn m-f12 btn-sm btn-outline-primary"><?php echo $status_info[0]['order_status_name']; ?></button> </a>
                        <?php } ?>
                      </td>
                      <td> <a href="<?php echo base_url(); ?>Order-Details/<?php echo $order_list1->order_id; ?>"> <button type="button" class="btn m-f12 btn-sm btn-outline-success">View</button> </a> </td>
                      <td>
                        <?php if($order_list1->order_status == 6 && $order_list1->payment_status == 1){ ?>
                          <a target="_blank" href="<?php echo base_url(); ?>Order-Print/<?php echo $order_list1->order_id; ?>"> <button type="button" class="btn m-f12 btn-sm btn-outline-success"><i class="fa fa-print"></i></button> </a>
                        <?php } elseif ($order_list1->payment_status == 2) {
                          echo '<span class="text-danger">Canceled</span>';
                        } elseif ($order_list1->order_status < 6 && $order_list1->payment_status != 2) { ?>
                          <a href="<?php echo base_url(); ?>Website/cancel_order/<?php echo $order_list1->order_id; ?>" onclick="return confirm('Cancel This Order');"> <button type="button" class="btn m-f12 btn-sm btn-outline-danger">Cancel Order</button> </a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } else{ ?>
              <p>You haven't placed any order yet.</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php include('footer.php'); ?>
  <script type="text/javascript">
    <?php if($this->session->flashdata('cancel_success')){ ?>
      $(document).ready(function(){
        toastr.success('Order Canceled successfully');
      });
    <?php } ?>
  </script>
