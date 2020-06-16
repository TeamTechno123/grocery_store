<?php include('header.php'); ?>

<!-- <section class="default-page">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading  ">Profile</h1>

      </div>
      <div class="col-md-12">
          <p class="text-center text-white f-18">Have A Question For Us?</p>
      </div>
    </div>
  </div>
</section> -->

<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h3>Profile Details <a href="<?php echo base_url(); ?>Website/edit_profile"><small class="f-14">(Edit) </small></a></h3>
          <hr class="hr-web">
          <div class="row">
            <div class="col-md-9">
              <h4><?php echo $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname']; ?></h4>
              <p><i class="far fa-envelope mr-3"></i> <?php echo $eco_cust_info['customer_email']; ?></p>
              <p><i class="fas fa-mobile-alt mr-3"></i> <?php echo $eco_cust_info['customer_mobile']; ?></p>
              <p><i class="fas fa-map-marker-alt mr-3"></i><?php echo $eco_cust_info['customer_address'].', '.$eco_cust_info['customer_city'].', '.$eco_cust_info['customer_pin']; ?> </p>
            </div>
            <div class="col-md-3 m-center">
              <?php if($eco_cust_info['customer_img']){ ?>
                <img class="profile-img" src="<?php echo base_url(); ?>assets/images/customer/<?php echo $eco_cust_info['customer_img']; ?>" alt="" width="100%">
              <?php } else{ ?>
                <img class="profile-img" src="<?php echo base_url(); ?>assets/images/customer/profile.png" alt="" width="100%">
              <?php } ?>

            </div>
          </div>
          <div class="card p-4">
            <div class="bg-grey-head">
              <h4 class="pl-2">My Wallet</h4>
            </div>
            <div class="p-2">
              <p> <b>Balance: Rs 0.00</b> </p>
            </div>
          </div>
          <div class="card p-4 m-nopadding">
            <div class="bg-grey-head">
              <h4 class="pl-2">My Orders</h4>
            </div>
            <div class="bg-grey-body px-1">
              <?php if($order_list){ ?>
                <table class="table table-bordered m-0" id="tbl_modal_cart">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Status</th>
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
                        <td><?php echo $status_info[0]['order_status_name']; ?></td>
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
