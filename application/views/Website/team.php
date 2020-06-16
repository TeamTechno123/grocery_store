<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Our Team</h1>
      </div>
    </div>
  </div>
</section>

<section class="product-section">
  <div class="container">
    <div class="row mb-5">
      <?php foreach ($team_list as $list1) { ?>
        <div class="col-md-3">
          <div class="card">
            <img class="small-img" height="232px" src="<?php echo base_url(); ?>assets/images/master/<?php echo $list1->team_img; ?>" alt="" width="100%" >
            <p class="text-center pt-2 mb-0 f-16"><?php echo $list1->team_emp_name; ?></p>
            <p class="text-center mt-0 f-12">(<?php echo $list1->team_desig; ?>)</p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>


  <?php include('footer.php'); ?>
