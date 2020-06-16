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
      <div class="col-md-3">
        <div class="card p-30">
          <a href="<?php echo base_url(); ?>Website/profile"><h4>My Account </h4></a>
          <ul>
          <li> <h5> Personal Details   </h5>
            <ul class="profile-list" style="list-style: none; padding-left:5px;">
              <a href="<?php echo base_url(); ?>Website/edit_profile"><li>Edit Profile</li></a>
              <a href="<?php echo base_url(); ?>Website/edit_profile"><li>Delivery Address</li></a>

              </ul>
            </li>
          <a href="<?php echo base_url(); ?>Website/order"><li> <h5>My Order </h5></li></a>
          <a href="<?php echo base_url(); ?>Website/order">  <li><h5>My Gift Card</h5></li></a>
          </ul>
        </div>
      </div>
      <div class="col-md-9" id="customer_service">
          <div class="card p-3">
            <h2>Customer Service</h2>
            <hr class="hr-web">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <p> <i class="fas fa-truck mr-3"></i> Change Delivery Slot</p>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <p> <i class="fas fa-recycle mr-3"></i> Return & Exchange</p>
                  </div>
                  </div>

            <div class="col-md-6">
              <div class="card">
                <p> <i class="far fa-window-close mr-3"></i> Change Delivery Slot</p>
              </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <p>Change Delivery Slot</p>
                </div>
                </div>
            </div>

            <div class="card p-4 bg-grey">
                <div class="row">

                <div class="col-md-6">
                  <h4>Regarding Payments</h4>
                  <div class="card">
                    <p> <i class="fas fa-rupee-sign mr-3"></i> Pay for an Order</p>
                  </div>

                </div>
                </div>
            </div>

          </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
