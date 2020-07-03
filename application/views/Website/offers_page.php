<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Offers </h1>
      </div>
    </div>
  </div>
</section>

<section class="cookbook-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <img class="cookbook-img p-30" src="<?php echo base_url(); ?>assets/images/voucher1.jpg" alt="" width="100%">
      </div>
      <?php foreach ($offers_list as $offers_list1) { ?>
        <div class="col-md-6">
          <img class="cookbook-img1" src="<?php echo base_url(); ?>assets/images/master/<?php echo $offers_list1->offer_img; ?>" alt="" width="100%">
        </div>
      <?php } ?>
      <!-- <div class="col-md-6">
        <img class="cookbook-img1" src="<?php echo base_url(); ?>assets/images/AG.jpg" alt="" width="100%">
      </div>
      <div class="col-md-6">
        <img class="cookbook-img1" src="<?php echo base_url(); ?>assets/images/WF.jpg" alt="" width="100%">
      </div>
      <div class="col-md-6">
        <img class="cookbook-img1" src="<?php echo base_url(); ?>assets/images/R&E.jpg" alt="" width="100%">
      </div>
      <div class="col-md-6">
        <img class="cookbook-img1" src="<?php echo base_url(); ?>assets/images/OPV.jpg" alt="" width="100%">
      </div> -->

    </div>
  </div>
</section>

<section class="text-section">
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset-md-1">
         <p class="text-div">As a privilege, we provide coupon codes to our customers at regular intervals. Here are a few things to keep in mind while enjoying the benefits of coupon codes : </p>
         <ol>
           <li class="text-div">Coupon codes cannot be clubbed with any other on-going offers on the website/Mobile application</li>
           <li class="text-div">Coupon codes will be valid only till the date mentioned.</li>
           <li class="text-div">One coupon code can be used only once.</li>
           <li class="text-div">Coupon codes cannot be used by only one customer i.e., the same code will not be valid to your family or friends</li>
           <li class="text-div">Kiranabhara.com can change the terms and conditions related to any available coupon codes on the website without any prior intimation</li>
           <li class="text-div">Delivery rules will be applicable to every product purchased u sing coupon codes.</li>
         </ol>
      </div>
    </div>
  </div>
</section>



  <?php include('footer.php'); ?>
