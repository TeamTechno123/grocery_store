<?php include('header.php'); ?>
<section class="top-membership bg-kb my-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
          <h4 class="text-center Merriweather text-white">KBC MEMBERSHIP</h4>
      </div>
    </div>
  </div>
</section>

<section class="pricing">
  <div class="container">
    <div class="row">
      <?php foreach ($membership_scheme_list as $mem_sch_list) { ?>
        <div class="col-md-4 mb-5">
          <div class="card  " >
              <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
              <div class="card-body text-center">
                <h5 class="card-title text-center w-100 f-roboto "> <span class="bg-danger kb-color memname  f-roboto"><?php echo $mem_sch_list->mem_sch_name; ?></span> </h5>
                <p class="card-text"><strong class="f-roboto"><?php echo $mem_sch_list->mem_sch_valid; ?> Days</strong> Membership </p>
                <?php
                  $today = date('d-m-Y');
                  $mem_sch_valid = $mem_sch_list->mem_sch_valid;
                  $cust_mem_end_date = date('d-m-Y', strtotime("+".$mem_sch_valid." days"));
                ?>
                <p class="card-text">From <strong class="f-roboto"><?php echo $today; ?></strong> To <strong class="f-roboto"><?php echo $cust_mem_end_date; ?></strong></p>
                <!-- <p class="card-text"><?php echo $mem_sch_list->mem_sch_point; ?> points </p> -->
                <?php if(isset($eco_cust_id)){ ?>
                  <a href="<?php echo base_url(); ?>KB-Membership-Details/<?php echo $mem_sch_list->mem_sch_id; ?>" class="btn btn-primary btn-success blinking2 "> <span class="Merriweather ">Join only in </span><span class="f-18 ml-1" >&#8377;</span> <?php echo $mem_sch_list->mem_sch_amt; ?>  </a>
                  <!-- <a href="<?php echo base_url(); ?>Website/add_user_membership/<?php echo $mem_sch_list->mem_sch_id; ?>" class="btn btn-primary btn-success blinking2 "> <span class="Merriweather ">Join only in </span><span class="f-18 ml-1" >&#8377;</span> <?php echo $mem_sch_list->mem_sch_amt; ?>  </a> -->
                <?php } else{ ?>
                  <a href="<?php echo base_url(); ?>Login" class="btn btn-primary btn-success select_shceme"><span class="Merriweather">Join only in </span><span class="f-18 ml-1" >&#8377;</span> <?php echo $mem_sch_list->mem_sch_amt; ?>  </a>
                <?php } ?>
              </div>
            </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php include('footer.php'); ?>
