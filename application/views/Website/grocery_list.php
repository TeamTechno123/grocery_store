<?php include ('header.php'); ?>

<section class="gorcery-list">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
          <?php include('sidebar_category.php'); ?>

      </div>

      <div class="col-md-9">
        <div class="card right-card pt-4">
          <div class="row ml-3">
            <div class="col-md-12">
              <h1 class="heading pb-2 pt-0" >
                <?php
                  if(isset($category_details)){ echo $category_details['category_name']; }
                  if(isset($brand_details)){ echo $brand_details['manufacturer_name']; }
                  if(isset($search_keyword)){ echo 'Result for "'.$search_keyword.'"'; }
                ?>
              </h1>
            </div>
            <div class="col-md-6 pb-3">
              Showing all <?php echo $product_cnt; ?> results
            </div>
          </div>

          <div class="row" >
            <?php foreach ($product_list as $product_list1) {
              $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_list1->manufacturer_id, 'manufacturer');
              ?>
              <div class="col-md-3 col-sm-6 col-6 product_item">
                <div class="product-list">
                  <div class="card">
                    <a class="text-center text-dark" href="<?php echo base_url(); ?>Product-Details/<?php echo $product_list1->product_id; ?>/<?php echo $product_list1->product_name; ?>">
                    <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_list1->product_img; ?>" alt="Card image cap">
                  </a>
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
              </div>
            <?php } ?>
          </div>
        </div>
     </div>
    </div>
  </div>
</section>

<?php include ('footer.php'); ?>
<script type="text/javascript">var base_url = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/add_to_cart.js"></script>
