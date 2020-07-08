<?php include('header.php'); ?>

<!-- Category -->
<div class="product-category py-5" style="background-color:#80808012;">
  <div class="container-fluid">
    <!-- <h3 class="w-100 text-center mb-5">Main Category</h3> -->
    <div class="owl-carousel owl-theme">
        <?php foreach ($main_category_list as $mcat_list1) { ?>
      <?php
        $category_name = str_replace(' ','-',$mcat_list1->category_name);
       $category_name = str_replace('/','-',$category_name);
      ?>
      <div class="item">
        <a href="<?php echo base_url(); ?>Brand-List/<?php echo $mcat_list1->category_id; ?>/<?php echo $category_name; ?>">
          <img class="small-img" height="230px" src="<?php echo base_url(); ?>assets/images/category/<?php echo $mcat_list1->category_img; ?>" alt="" width="100%">
          <div class="text-head w-100 p-3">
            <p class="text-center category_name m-0"><?php echo $mcat_list1->category_name; ?></p>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<!-- Home Banner 1 -->
<section class="">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="slider1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php $i=0; foreach ($slider_list as $slider_list1) {
              if($slider_list1->slider_possition == 1 ){ $i++;
            ?>
              <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
                <img class="middle-img border-img" src="<?php echo base_url(); ?>assets/images/slider/<?php echo $slider_list1->slider_img; ?>" alt="First slide">
              </div>
            <?php } } ?>
          </div>
          <a class="carousel-control-prev" href="#slider1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#slider1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Home Banner 2 -->
<section class="">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="slider2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php $i=0; foreach ($slider_list as $slider_list1) {
              if($slider_list1->slider_possition == 2 ){ $i++;
            ?>
              <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
                <img class="middle-img border-img" src="<?php echo base_url(); ?>assets/images/slider/<?php echo $slider_list1->slider_img; ?>" alt="First slide">
              </div>
            <?php } } ?>
          </div>
          <a class="carousel-control-prev" href="#slider2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#slider2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Products -->
<section class="product-item" style="background-color:#80808012;">
  <div class="container-fluid">
    <h3 class="w-100 text-center mb-5">Featured Products</h3>
    <div class="row product-list">
      <?php foreach ($featured_product_list as $product_list1) {
        // $product_name = urlencode($product_list1->product_name);
        $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_list1->manufacturer_id, 'manufacturer');
      ?>
      <div class="col-md-2 col-6 col-6 ">
          <div class="card product_item">
            <span  class="discount" ><span class="product_discount_per"></span>% Off</span>
            <a class="text-center text-dark" href="<?php echo base_url(); ?>Product-Details/<?php echo $product_list1->product_id; ?>/<?php echo $product_list1->product_name; ?>">
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_list1->product_img; ?>" alt="Card image cap">
          </a>
            <div class="card-body bg-light-blue py-1">
              <p class="card-text product-title text-center"><?php echo $product_list1->product_name; ?></p>
              <p class="card-text f-14 product_det text-center"><span class="prod_mrp"></span> <span class="prod_pri text-bold text-yellow1"></span></p>
              <!-- <p class="card-text"> <span class="text-yellow1 text-bold f-18">Rs. 35 </span>  <span class="line-throw">Rs.38</span> </p> -->


              <div class="row mb-1" id="">
                <div class="col-md-9 px-0">
                  <select class="form-control form-control-sm select_product_attr" data-placeholder="Select Main Category">
                    <?php
                    $product_id = $product_list1->product_id;
                    $prod_attr_list = $this->Website_Model->prod_attr_list($product_id);
                    foreach ($prod_attr_list as $prod_attr_list1) { ?>
                      <option  product_id="<?php echo $product_id; ?>" pro_attri_id="<?php echo $prod_attr_list1->pro_attri_id; ?>" product_name="<?php echo $product_list1->product_name; ?>" product_mrp="<?php echo $prod_attr_list1->pro_attri_mrp; ?>" product_price="<?php echo $prod_attr_list1->pro_attri_price; ?>" product_dis_per="<?php echo $prod_attr_list1->pro_attri_dis_per; ?>" product_dis_amt="<?php echo $prod_attr_list1->pro_attri_dis_amt; ?>" product_weight="<?php echo $prod_attr_list1->pro_attri_weight; ?>" product_unit="<?php echo $prod_attr_list1->unit_name; ?>" product_gst_per="<?php echo $product_list1->tax_rate; ?>"><?php echo $prod_attr_list1->pro_attri_weight; ?> <?php echo $prod_attr_list1->unit_name; ?>  - Rs. <?php echo $prod_attr_list1->pro_attri_price; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-3 m-mt3 pr-0">
                  <input type="number" min="1" step="1" class="px-0 form-control form-control-sm text-center product_qty"  value="1" >
                </div>
              </div>
              <div class="text-center mt-2">
                <div class="row">
                  <a class="btn btn-secondary btn-sm add_to_cart bg-red col-9">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                  <a class="btn btn-secondary btn-sm add_to_wishlist bg-red  col-3" title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<!-- Home Banner 3 -->
<section class="">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="slider3" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php $i=0; foreach ($slider_list as $slider_list1) {
              if($slider_list1->slider_possition == 3 ){ $i++;
            ?>
              <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
                <img class="middle-img border-img" src="<?php echo base_url(); ?>assets/images/slider/<?php echo $slider_list1->slider_img; ?>" alt="First slide">
              </div>
            <?php } } ?>
          </div>
          <a class="carousel-control-prev" href="#slider3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#slider3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
  <script type="text/javascript">var base_url = "<?php echo base_url(); ?>";</script>
  <script src="<?php echo base_url(); ?>assets/js/add_to_cart.js"></script>

  <script type="text/javascript">
  <?php if($this->session->flashdata('upload_success')){ ?>
    $(document).ready(function(){
      toastr.success('Order Uploaded successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('upload_error')){ ?>
    $(document).ready(function(){
      toastr.success('Order Not Uploaded');
    });
  <?php } ?>
  <?php if($this->session->flashdata('membership_sts') == 'exist'){ ?>
    $(document).ready(function(){
      toastr.error('You have active Membership');
    });
  <?php } ?>
  <?php if($this->session->flashdata('membership_sts') == 'success'){ ?>
    $(document).ready(function(){
      toastr.success('Membership Added Successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('cookbook_reg_success')){ ?>
    $(document).ready(function(){
      toastr.success('Registered For CookBook Contest Successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('request_product_success')){ ?>
    $(document).ready(function(){
      toastr.success('Product Request Submited Successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('reseller_reg_success')){ ?>
    $(document).ready(function(){
      toastr.success('Reseller Registration Submited Successfully');
    });
  <?php } ?>
  </script>
