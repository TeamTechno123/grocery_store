<?php include('header.php'); ?>
<section class="profile-container d-none d-sm-block">
  <div class="container">
    <div class="row ">
      <div class="col-md-12 ">
        <div class="card py-5 ">
          <!-- Desktop View -->
          <?php $i=0; foreach ($order_status_list as $order_status_list1) { $i++; } ?>
          <ol class="progtrckr" data-progtrckr-steps="<?php echo $i; ?>">
            <?php foreach ($order_status_list as $order_status_list2) { ?>
              <li class="<?php if($order_status_list2->order_status_id == $order_status){ echo 'progtrckr-done'; }else{ echo 'progtrckr-todo'; } ?>"><?php echo $order_status_list2->order_status_name; ?></li>
            <!-- <li class="progtrckr-todo">Order Received</li>
            <li class="progtrckr-done">Order-Processing</li>
            <li class="progtrckr-todo">Delivered</li> -->
            <?php } ?>
          </ol>
          <!-- Mobile View -->
          <!-- <ol class="progtrckr d-block d-sm-none" data-progtrckr-steps="3">
            <h5 class="f-18 text-center">Order</h5>
            <li class="progtrckr-done">Received</li>
            <li class="progtrckr-todo">Processing</li>
            <li class="progtrckr-todo">Delivered</li>
          </ol> -->
        </div>
      </div>
    </div>
  </div>
</section>



  <?php include('footer.php'); ?>
