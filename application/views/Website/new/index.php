<div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/new/banner1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/new/banner2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/new/banner3.jpg" alt="Third slide">
          </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>
          </div>
</div>

<div class="product-category">
  <div class="container-fluid">
        <div class="owl-carousel owl-theme">
          <?php foreach ($featured_product_list as $product_list1) {
            // $product_name = urlencode($product_list1->product_name);
            $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_list1->manufacturer_id, 'manufacturer');
          ?>
         <div class="item">
           <div class="card">
               <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_list1->product_img; ?>" alt="Card image cap">
               <div class="card-body bg-light-blue">
                 <p class="card-text"> <span class="text-yellow1 text-bold f-18">Rs. 35 </span>  <span class="line-throw">Rs.38</span> </p>
                 <p class="card-text product-title"><?php echo $product_list1->product_name; ?></p>
                 <div class="row" id="attr">
                   <div class="col-md-9">
                     <select class="form-control form-control-sm select_product_attr" data-placeholder="Select Main Category">
                       <?php
                       $product_id = $product_list1->product_id;
                       $prod_attr_list = $this->Website_Model->prod_attr_list($product_id);
                       foreach ($prod_attr_list as $prod_attr_list1) { ?>
                         <option  product_id="<?php echo $product_id; ?>" pro_attri_id="<?php echo $prod_attr_list1->pro_attri_id; ?>" product_name="<?php echo $product_list1->product_name; ?>" product_mrp="<?php echo $prod_attr_list1->pro_attri_mrp; ?>" product_price="<?php echo $prod_attr_list1->pro_attri_price; ?>" product_dis_per="<?php echo $prod_attr_list1->pro_attri_dis_per; ?>" product_dis_amt="<?php echo $prod_attr_list1->pro_attri_dis_amt; ?>" product_weight="<?php echo $prod_attr_list1->pro_attri_weight; ?>" product_unit="<?php echo $prod_attr_list1->unit_name; ?>" product_gst_per="<?php echo $product_list1->tax_rate; ?>"><?php echo $prod_attr_list1->pro_attri_weight; ?> <?php echo $prod_attr_list1->unit_name; ?>  - Rs. <?php echo $prod_attr_list1->pro_attri_price; ?></option>
                       <?php } ?>
                     </select>
                   </div>
                   <div class="col-md-3 m-mt3">
                     <input type="number" min="1" step="1" class="px-0 form-control form-control-sm text-center product_qty"  value="1" >
                   </div>
                 </div>
                 <div class="text-center mt-2">
                   <a class="btn btn-secondary btn-sm add_to_cart w-100 bg-red">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                 </div>
               </div>
             </div>
        </div>
          <?php } ?>
    </div>
  </div>
</div>

<section class="offers">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5 class="">Offers on daily essentials</h5>
      </div>
      <div class="col-md-3 col-6">
        <div class="offer-div">

          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
            <span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>

        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
            <span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse2.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
    </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>


      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse2.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>

<div class="product-category">
  <div class="container-fluid">
        <div class="owl-carousel owl-theme">
            <?php foreach ($main_category_list as $mcat_list1) { ?>
          <?php
            $category_name = str_replace(' ','-',$mcat_list1->category_name);
           $category_name = str_replace('/','-',$category_name);
           // $category_name = urlencode($mcat_list1->category_name);
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


<section class="two-img">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/new/sideimg1.jpg" alt="" width="100%">
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/new/sideimg2.jpg" alt="" width="100%">
      </div>

      <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/new/sideimg3.jpg" alt="" width="100%">
      </div>

      <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/new/sideimg4.jpg" alt="" width="100%">
      </div>
    </div>
  </div>
</section>

<div class="product-category">
  <div class="container-fluid">
        <div class="owl-carousel owl-theme">
            <?php foreach ($main_category_list as $mcat_list1) { ?>
          <?php
            $category_name = str_replace(' ','-',$mcat_list1->category_name);
           $category_name = str_replace('/','-',$category_name);
           // $category_name = urlencode($mcat_list1->category_name);
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

<section class="offers">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h5 class="">Offers on daily essentials</h5>
      </div>
      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse2.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>


      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse2.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="offer-div">
          <span class="offer-batch">
            <img class="batch" src="<?php echo base_url(); ?>assets/images/new/batch.png" alt="">
<span class="offer_badge"> Up To <b>20%</b> OFF </span>
          </span>
        <div class="img">
          <img  src="<?php echo base_url(); ?>assets/images/new/pulse.png" alt="">
        </div>
        <div class="text">
          <p class="text-bold">Dals & Pulse</p>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>

<section class="two-img">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/new/sideimg1.jpg" alt="" width="100%">
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/new/sideimg2.jpg" alt="" width="100%">
      </div>
    </div>
  </div>
</section>


<div class="product-category">
  <div class="container-fluid">
        <div class="owl-carousel owl-theme">
          <?php foreach ($featured_product_list as $product_list1) {
            // $product_name = urlencode($product_list1->product_name);
            $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_list1->manufacturer_id, 'manufacturer');
          ?>
         <div class="item">
           <div class="card">
               <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_list1->product_img; ?>" alt="Card image cap">
               <div class="card-body bg-light-blue">
                 <p class="card-text"> <span class="text-yellow1 text-bold f-18">Rs. 35 </span>  <span class="line-throw">Rs.38</span> </p>
                 <p class="card-text product-title"><?php echo $product_list1->product_name; ?></p>
                 <div class="row" id="attr">
                   <div class="col-md-9">
                     <select class="form-control form-control-sm select_product_attr" data-placeholder="Select Main Category">
                       <?php
                       $product_id = $product_list1->product_id;
                       $prod_attr_list = $this->Website_Model->prod_attr_list($product_id);
                       foreach ($prod_attr_list as $prod_attr_list1) { ?>
                         <option  product_id="<?php echo $product_id; ?>" pro_attri_id="<?php echo $prod_attr_list1->pro_attri_id; ?>" product_name="<?php echo $product_list1->product_name; ?>" product_mrp="<?php echo $prod_attr_list1->pro_attri_mrp; ?>" product_price="<?php echo $prod_attr_list1->pro_attri_price; ?>" product_dis_per="<?php echo $prod_attr_list1->pro_attri_dis_per; ?>" product_dis_amt="<?php echo $prod_attr_list1->pro_attri_dis_amt; ?>" product_weight="<?php echo $prod_attr_list1->pro_attri_weight; ?>" product_unit="<?php echo $prod_attr_list1->unit_name; ?>" product_gst_per="<?php echo $product_list1->tax_rate; ?>"><?php echo $prod_attr_list1->pro_attri_weight; ?> <?php echo $prod_attr_list1->unit_name; ?>  - Rs. <?php echo $prod_attr_list1->pro_attri_price; ?></option>
                       <?php } ?>
                     </select>
                   </div>
                   <div class="col-md-3 m-mt3">
                     <input type="number" min="1" step="1" class="px-0 form-control form-control-sm text-center product_qty"  value="1" >
                   </div>
                 </div>
                 <div class="text-center mt-2">
                   <a class="btn btn-secondary btn-sm add_to_cart w-100 bg-red">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                 </div>
               </div>
             </div>
        </div>
          <?php } ?>
    </div>
  </div>
</div>


<!-- <section class="product-item">
  <div class="container-fluid">
    <div class="row">
      <?php foreach ($featured_product_list as $product_list1) {
        // $product_name = urlencode($product_list1->product_name);
        $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_list1->manufacturer_id, 'manufacturer');
      ?>
      <div class="col-md-2 col-6 col-6 ">
        <div class="card">
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_list1->product_img; ?>" alt="Card image cap">
            <div class="card-body bg-light-blue">
              <p class="card-text"> <span class="text-yellow1 text-bold f-18">Rs. 35 </span>  <span class="line-throw">Rs.38</span> </p>
              <p class="card-text product-title"><?php echo $product_list1->product_name; ?></p>
              <div class="row" id="attr">
                <div class="col-md-9">
                  <select class="form-control form-control-sm select_product_attr" data-placeholder="Select Main Category">
                    <?php
                    $product_id = $product_list1->product_id;
                    $prod_attr_list = $this->Website_Model->prod_attr_list($product_id);
                    foreach ($prod_attr_list as $prod_attr_list1) { ?>
                      <option  product_id="<?php echo $product_id; ?>" pro_attri_id="<?php echo $prod_attr_list1->pro_attri_id; ?>" product_name="<?php echo $product_list1->product_name; ?>" product_mrp="<?php echo $prod_attr_list1->pro_attri_mrp; ?>" product_price="<?php echo $prod_attr_list1->pro_attri_price; ?>" product_dis_per="<?php echo $prod_attr_list1->pro_attri_dis_per; ?>" product_dis_amt="<?php echo $prod_attr_list1->pro_attri_dis_amt; ?>" product_weight="<?php echo $prod_attr_list1->pro_attri_weight; ?>" product_unit="<?php echo $prod_attr_list1->unit_name; ?>" product_gst_per="<?php echo $product_list1->tax_rate; ?>"><?php echo $prod_attr_list1->pro_attri_weight; ?> <?php echo $prod_attr_list1->unit_name; ?>  - Rs. <?php echo $prod_attr_list1->pro_attri_price; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-3 m-mt3">
                  <input type="number" min="1" step="1" class="px-0 form-control form-control-sm text-center product_qty"  value="1" >
                </div>
              </div>
              <div class="text-center mt-2">
                <a class="btn btn-secondary btn-sm add_to_cart w-100 bg-red">Add To Cart <i class="fa fa-shopping-cart"></i></a>
              </div>
            </div>
          </div>
        </div>
          <?php } ?>
      </div>
    </div>
  </div>
</section> -->
