<?php include ('header.php'); ?>

<section class="gorcery-list">
  <div class="container">
    <div class="row">

      <div class="col-md-12">

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown button
            </button>
            <div class="dropdown-menu dropdown-megamenu" aria-labelledby="dropdownMenuButton">
            <div class="mega-menu">
              <div class="row">
              <div class="col-md-4">
                <ul class="dropdown-main-category">
                  <li class ="expander">home </li>
                  <li class="expander2">about</li>
                  <li>contact</li>
                  <li>policy</li>
                  <li>product</li>
                </ul>
              </div>

              <div class="col-md-8" id="TableData">
                <div class="row">
                  <div class="col-6  bg-grey">
                    <ul  >
                      <li>home </li>
                      <li>about</li>
                      <li>contact</li>
                      <li>policy</li>
                      <li>product</li>
                    </ul>
                  </div>

                  <div class="col-6">
                    <ul>
                      <li>home </li>
                      <li>about</li>
                      <li>contact</li>
                      <li>policy</li>
                      <li>product</li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-8" id="TableData2">
                <div class="row">
                  <div class="col-6  bg-grey">
                    <ul  >
                      <li>home2 </li>
                      <li>about</li>
                      <li>contact</li>
                      <li>policy</li>
                      <li>product</li>
                    </ul>
                  </div>

                  <div class="col-6">
                    <ul>
                      <li>home2 </li>
                      <li>about</li>
                      <li>contact</li>
                      <li>policy</li>
                      <li>product</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mega-menu">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">frouts And Vegitable</a>
            <ul class="dropdown-menu mega-menu-div ">
              <div class="row">
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Oil Ang Ghee</a>
            <ul class="dropdown-menu mega-menu-div">
              <div class="row">
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Bakery</a>
            <ul class="dropdown-menu mega-menu-div">
              <div class="row">
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
                <div class="col-4">
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Mango</a></li>
                  <li><a class="dropdown-item" href="#">Banana</a></li>
                </div>
              </div>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</div>







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

      </div>

      <div class="col-md-9">
        <div class="card right-card pt-4">
          <div class="row ml-3 d-none d-sm-block">
            <!-- <nav aria-label="breadcrumb ">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grocery </li>
              </ol>
            </nav> -->
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
            <div class="col-md-6 pb-3">
              <!-- Showing all <?php echo $product_cnt; ?> results -->
            </div>
            <!-- <div class="col-md-6 text-right pr-5">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div> -->
          </div>

          <div class="row">
            <div class="col-md-6 ">
              <h4>Brand Store</h4>
            </div>
            <div class="col-md-3 offset-md-3 text-right mb-4">
                  <select class="form-control form-control-sm">
                    <option>Popularity</option>
                    <option>Price : Low to High</option>
                    <option>Price : High to Low</option>
                    <option>% more </option>
                    <option>heighest Rating</option>
                  </select>
            </div>


            <?php if($brand_list){ foreach ($brand_list as $brand_list1) {
              $brand_name = urlencode($brand_list1->manufacturer_name);
            ?>
              <div class="col-md-3 col-4 mb-5">
                <a href="<?php echo base_url(); ?>Brand/<?php echo $brand_list1->manufacturer_id; ?>/<?php echo $brand_name; ?>">
                  <img class="small-img brand-page-img"  src="<?php echo base_url(); ?>assets/images/manufacturer/<?php echo $brand_list1->manufacturer_img;  ?>" alt="" width="100%" >
                </a>
              </div>
            <?php } } ?>
        </div>
     </div>
    </div>
  </div>
</section>

<?php include ('footer.php'); ?>
<script type="text/javascript">var base_url = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/add_to_cart.js"></script>

<script type="text/javascript">
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


  $(function() {
$('.expander').hover(function() {
    $('#TableData').show();
    $('#TableData2').hide();
});
});
  $(function() {
$('.expander2').hover(function() {
    $('#TableData2').show();
    $('#TableData').hide();
});
});
</script>
