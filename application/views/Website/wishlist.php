<?php include('header.php'); ?>

<!-- Featured Products -->
<section class="product-item" style="background-color:#80808012;">
  <div class="container-fluid">
    <h3 class="w-100 text-center mb-5">Wishlist</h3>
    <div class="row product-list">
      <?php foreach ($product_list as $product_list1) {
        // $product_name = urlencode($product_list1->product_name);
        $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_list1->manufacturer_id, 'manufacturer');
      ?>
      <div class="col-md-2 col-6 col-6 block_pro">
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
                    $wishlist_id = $product_list1->wishlist_id;
                    $prod_attr_list = $this->Website_Model->prod_attr_list($product_id);
                    foreach ($prod_attr_list as $prod_attr_list1) { ?>
                      <option wishlist_id = "<?php echo $wishlist_id; ?>" product_id="<?php echo $product_id; ?>" pro_attri_id="<?php echo $prod_attr_list1->pro_attri_id; ?>" product_name="<?php echo $product_list1->product_name; ?>" product_mrp="<?php echo $prod_attr_list1->pro_attri_mrp; ?>" product_price="<?php echo $prod_attr_list1->pro_attri_price; ?>" product_dis_per="<?php echo $prod_attr_list1->pro_attri_dis_per; ?>" product_dis_amt="<?php echo $prod_attr_list1->pro_attri_dis_amt; ?>" product_weight="<?php echo $prod_attr_list1->pro_attri_weight; ?>" product_unit="<?php echo $prod_attr_list1->unit_name; ?>" product_gst_per="<?php echo $product_list1->tax_rate; ?>"><?php echo $prod_attr_list1->pro_attri_weight; ?> <?php echo $prod_attr_list1->unit_name; ?>  - Rs. <?php echo $prod_attr_list1->pro_attri_price; ?></option>
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
                  <a class="btn btn-secondary btn-sm remove_from_wishlist bg-red  col-3" title="Remove From Wishlist"><del><i class="fa fa-times"></i></del></a>
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
