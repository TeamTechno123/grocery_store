<?php include('header.php'); ?>

<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h3>Order Details</h3>
          <hr class="hr-web">
          <div class="row m-autoscroll">
            <p>Order Date : <?php echo $order_info['order_date']; ?> <br>
              Total Amount : <?php echo $order_info['order_total_amount']; ?></p>

            <?php if($order_pro_list){ ?>
              <table class="table table-bordered m-0 " id="tbl_modal_cart">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=0;
                  foreach ($order_pro_list as $order_pro_list1) {
                    $i++;
                    // $order_status = $order_pro_list1->order_status;
                    // $status_info = $this->User_Model->get_info_arr_fields('order_status_name','order_status_id', $order_status, 'order_status');
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $order_pro_list1->order_pro_name.' - '.$order_pro_list1->order_pro_weight.' '.$order_pro_list1->order_pro_unit; ?></td>
                      <td>&#8377;<?php echo $order_pro_list1->order_pro_price; ?></td>
                      <td><?php echo $order_pro_list1->order_pro_qty; ?></td>
                      <td>&#8377;<?php echo $order_pro_list1->order_pro_amt; ?></td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4" class="text-right">Total : </td>
                    <td>&#8377;<?php echo $order_info['order_total_amount']; ?></td>
                  </tr>
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
