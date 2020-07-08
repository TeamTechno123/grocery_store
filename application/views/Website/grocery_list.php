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
                  <div class="card p-1" style="width: 100%;">
                    <span  class="discount" ><span class="product_discount_per"></span>% Off</span>
                    <a class="text-center text-dark" href="<?php echo base_url(); ?>Product-Details/<?php echo $product_list1->product_id; ?>/<?php echo $product_list1->product_name; ?>">
                      <img class="card-img-top mt-2" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_list1->product_img; ?>" alt="Card image cap">
                      <p class="mb-0 pl-1 text-left text-success text-bold" style="font-size: 11px;"><?php if($manufacturer_info){ echo $manufacturer_info[0]['manufacturer_name']; } ?></p>
                      <h5 class="w-100 card-title text-center product_name mt-2"><?php echo $product_list1->product_name; ?></h5>
                    </a>
                    <div class="card-body py-2">
                      <div class="form-group w-100 mb-1">
                        <div class="text-center mb-2">
                          <p class="card-text f-14 product_det"><span class="prod_mrp"></span> <span class="prod_pri text-bold"></span></p>
                        </div>
                        <div class="row">
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
                      </div>
                      <input type="hidden" class="min_ord_limit" value="<?php echo $product_list1->min_ord_limit; ?>">
                      <input type="hidden" class="max_ord_limit" value="<?php echo $product_list1->max_ord_limit; ?>">
                      <div class="text-center mt-2">
                        <div class="row">
                          <a class="btn btn-secondary btn-sm add_to_cart bg-red col-9">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                          <a class="btn btn-secondary btn-sm add_to_wishlist bg-red  col-3" title="Add To Wishlist"><i class="fa fa-heart"></i></a>
                        </div>
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
