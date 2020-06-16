<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Gallery</h1>
      </div>
    </div>
  </div>
</section>


<section class="product-section">
  <div class="container">
    <div class="row mb-5">
      <?php foreach ($gallery_list as $list1) { ?>
        <div class="col-md-3">
          <div class="card">
            <img class="small-img" height="232px" src="<?php echo base_url(); ?>assets/images/master/<?php echo $list1->gallery_img; ?>" alt="" width="100%" >
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>


  <?php include('footer.php'); ?>
