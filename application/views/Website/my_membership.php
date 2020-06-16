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
            <h2>My Membership</h2>
            <hr class="hr-web">
            <div class="row">
              <div class="col-md-9">
                <p class="m-mt3">The kiranabhra Wallet is a pre-paid credit account that is associated with your kiranabhra account. This prepaid account allows you to pay a lump sum amount once to kiranabhra and then shop multiple times without having to pay each time.</p>
                </div>
            </div>
            <div class="card p-4 bg-grey">
                <div class="row">
                <div class="col-md-12">
                  <h4>Membership Plan</h4>
                  <?php
                  if ($cust_mem_info) {
                    $mem_sch_id = $cust_mem_info['mem_sch_id'];
                    $mem_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
                  ?>
                    <h3 class="py-2">  <?php echo $mem_info[0]['mem_sch_name']; ?>   </h3>
                    <p> Plan Amount Rs. <?php echo $cust_mem_info['cust_mem_amt']; ?></p>
                    <p class="text-danger" >Your Plan Will Expire On <?php echo $cust_mem_info['cust_mem_end_date']; ?>  </p>
                  <?php } else{ ?>
                    <p>No any active membership plan.</p>
                  <?php } ?>

                </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
