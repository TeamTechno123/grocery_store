<?php include ('header.php'); ?>

<section class="gorcery-list">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
          <!-- <div class="card p-30">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">Search</button>
                </div>
              </div>
          </div>
          <br><br> -->
          <?php include('sidebar_category.php'); ?>
          <br>
          <!-- <div class="card p-30">
            <h4> Product Category</h4>
          </div> -->
      </div>

      <div class="col-md-9">
        <div class="card right-card pt-4">
          <div class="row ml-3">
            <div class="col-md-12">
                <h1 class="heading pb-2 pt-0" >
                  <?php
                    if(isset($category_details)){ echo $category_details['category_name']; }
                    if(isset($brand_details)){
                      echo $brand_details['manufacturer_name'];
                    }
                  ?>
                </h1>
            </div>
          </div>
          <hr class="mt-0">
          <div class="row">
            <?php if($brand_list){  ?>
            <div class="col-md-12 text-center">
              <h4 class="text-bold pb-3">Shop By Brand</h4>
            </div>
            <?php $brand_cnt = 0; foreach ($brand_list as $brand_list1) {
              $brand_cnt++;
              $brand_name = str_replace(' ', '-', $brand_list1->manufacturer_name);
              $brand_name =  preg_replace('/[^A-Za-z0-9\-]/', '-', $brand_name);
            ?>
              <div class="brand_box col-md-3 col-4 mb-5 <?php if($brand_cnt > 7){ echo 'd-none'; } ?>">
                <a href="<?php echo base_url(); ?>Brand/<?php echo $brand_list1->manufacturer_id; ?>/<?php echo $category_id; ?>/<?php echo $brand_name; ?>">
                  <img class="small-img brand-page-img "  src="<?php echo base_url(); ?>assets/images/manufacturer/<?php echo $brand_list1->manufacturer_img;  ?>" alt="" width="100%" >
                </a>
              </div>
            <?php } if($brand_cnt > 7){ ?>
              <div class="col-md-3 col-4 mb-5">
                <a class="show_all_brand" >
                  <img class="small-img brand-page-img " src="<?php echo base_url(); ?>assets/images/product/view.png" alt="" width="100%" >
                </a>
              </div>
            <?php } } else{ ?>
              <p class="w-100 text-center"> Brands not available for this category</p>
            <?php } ?>
          </div>
          <hr class="mt-0">
          <div class="row">
            <?php if($sub_category_list){  ?>
            <div class="col-md-12 text-center">
              <h4 class="text-bold pb-3">Shop By Sub-Category</h4>
            </div>
            <?php $sub_cat_cnt = 0; foreach ($sub_category_list as $sub_category_list1) {
              $sub_cat_cnt++;
              $sub_category_name = str_replace(' ', '-', $sub_category_list1->category_name);
              $sub_category_name =  preg_replace('/[^A-Za-z0-9\-]/', '-', $sub_category_name);
            ?>
              <div class="sub_cat_box col-md-3 col-4 mb-5 <?php if($sub_cat_cnt > 7){ echo 'd-none'; } ?>">
                <div class="card">
                  <a href="<?php echo base_url(); ?>Category/<?php echo $sub_category_list1->category_id; ?>/<?php echo $sub_category_name; ?>">
                    <img class="small-img brand-page-img " height="180px" src="<?php echo base_url(); ?>assets/images/category/<?php echo $sub_category_list1->category_img;  ?>" alt="" width="100%" >
                  </a>
                  <p class="text-center text-bold my-2"><?php echo $sub_category_list1->category_name; ?></p>
                </div>
              </div>
            <?php } if($sub_cat_cnt > 7){ ?>
              <div class="col-md-3 col-4 mb-5">
                <a  class="show_all_sub_cat" >
                  <img class="small-img brand-page-img" height="180px" src="<?php echo base_url(); ?>assets/images/product/view.png" alt="" width="100%" >
                </a>
              </div>
            <?php } } else{ ?>
              <p class="w-100 text-center"><b>Sub-Category Not Available</b></p>
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

<script type="text/javascript">
$('.show_all_brand').on('click', function(){
  $('.brand_box').removeClass('d-none');
  $('.show_all_brand').addClass('d-none');
});
$('.show_all_sub_cat').on('click', function(){
  $('.sub_cat_box').removeClass('d-none');
  $('.show_all_sub_cat').addClass('d-none');
});
// Show Price of Attribute on Page Load..
  // $(document).ready(function(){
  //   $('.select_product_attr').each(function(){
  //     var product_price =  $(this).find("option:selected").attr('product_price');
  //     var product_mrp =  $(this).find("option:selected").attr('product_mrp');
  //     var product_attr =  $(this).find("option:selected").attr('product_attr');
  //     var product_dis_per = $(this).find("option:selected").attr('product_dis_per');
  //     var product_price_det = 'Rs. '+product_price+'';
  //     var product_mrp_det = 'Rs. '+product_mrp+'';
  //
  //     $(this).closest('.card-body').find('.prod_pri').text(product_price_det);
  //     $(this).closest('.card-body').find('.prod_mrp').html('<span class="line-throw">'+product_mrp_det+'</span>&nbsp;&nbsp;&nbsp;&nbsp;');
  //     if(product_dis_per > 0){
  //       $(this).closest('.card').find('.discount').css('display','block');
  //       $(this).closest('.card').find('.product_discount_per').text(product_dis_per);
  //     } else{
  //       $(this).closest('.card').find('.discount').css('display','none');
  //     }
  //   });
  // });
  //
  // // Show Price on Select Attribute..
  // $('.select_product_attr').on('change',function(){
  //   var product_price =  $(this).find("option:selected").attr('product_price');
  //   var product_mrp =  $(this).find("option:selected").attr('product_mrp');
  //   var product_attr =  $(this).find("option:selected").attr('product_attr');
  //   var product_dis_per = $(this).find("option:selected").attr('product_dis_per');
  //   var product_price_det = 'Rs. '+product_price+'';
  //   var product_mrp_det = 'Rs. '+product_mrp+'';
  //
  //   $(this).closest('.card-body').find('.prod_pri').text(product_price_det);
  //   $(this).closest('.card-body').find('.prod_mrp').html('<span class="line-throw">'+product_mrp_det+'</span>&nbsp;&nbsp;&nbsp;&nbsp;');
  //   if(product_dis_per > 0){
  //     $(this).closest('.card').find('.discount').css('display','block');
  //     $(this).closest('.card').find('.product_discount_per').text(product_dis_per);
  //   } else{
  //     $(this).closest('.card').find('.discount').css('display','none');
  //   }
  // });
  //
  // // Add To Cart...
  // $('.add_to_cart').on('click',function(){
  //   var product_id = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_id");
  //   var pro_attri_id = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("pro_attri_id");
  //   var product_name = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_name");
  //   var product_mrp = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_mrp");
  //   var product_price = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_price");
  //   var product_dis_per = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_dis_per");
  //   var product_dis_amt = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_dis_amt");
  //   var product_weight = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_weight");
  //   var product_unit = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_unit");
  //   var product_qty = $(this).closest('.card-body').find('.product_qty').val();
  //   var min_ord_limit = $(this).closest('.card-body').find('.min_ord_limit').val();
  //   var max_ord_limit = $(this).closest('.card-body').find('.max_ord_limit').val();
  //
  //   if(product_qty > max_ord_limit){
  //     alert('product_qty');
  //   }
  //   else if (product_qty < min_ord_limit){
  //     alert('product_qty');
  //   } else{
  //     $.ajax({
  //       url:'<?php echo base_url(); ?>Cart/add_to_cart',
  //       type: 'POST',
  //       data: {
  //              "product_id":product_id,
  //              "pro_attri_id":pro_attri_id,
  //              "product_name":product_name,
  //              "product_mrp":product_mrp,
  //              "product_price":product_price,
  //              "product_dis_per":product_dis_per,
  //              "product_dis_amt":product_dis_amt,
  //              "product_weight":product_weight,
  //              "product_unit":product_unit,
  //              "product_qty":product_qty,
  //             },
  //       context: this,
  //       success: function(result){
  //         var data = JSON.parse(result);
  //         $('#myCart .modal-body').html(data['cart']);
  //         $('.my-cart-badge').html(data['row_count']);
  //         toastr.success('Product Added To Cart');
  //       }
  //     });
  //   }
  // });
</script>
