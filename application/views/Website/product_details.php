<?php include ('header.php'); ?>


<section class="gorcery-list">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-3 d-none d-sm-block">
        <?php include('sidebar_category.php'); ?>
      </div>

      <div class="col-md-9">
        <div class="card right-card">
          <div class="row">
            <div class="col-md-5">
              <div class="full-img">
                <img id="myimage" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_info['product_img']; ?>" alt="" width="100%">
              </div>
              <div class="small-img mt-3 mb-3">
                <div class="row">
                  <div class="col-3">
                    <a class="small-img-click">  <img img_name="<?php echo $product_info['product_img']; ?>" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_info['product_img']; ?>" alt="" width="100%"></a>
                  </div>
                  <?php foreach ($product_images as $product_images1) { ?>
                    <div class="col-3">
                      <a class="small-img-click">  <img img_name="<?php echo $product_images1->product_images_name; ?>" src="<?php echo base_url(); ?>assets/images/product/<?php echo $product_images1->product_images_name; ?>" alt="" width="100%"></a>
                    </div>
                  <?php  } ?>
                </div>
              </div>
            </div>
            <?php $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_name','manufacturer_id', $product_info['manufacturer_id'], 'manufacturer'); ?>
            <div class="col-md-7 pl-5 product-details">
              <div class="myresult">
                <div id="myresult" class="img-zoom-result"></div>
              </div>
              <p class="mb-0 pl-1 text-left text-success text-bold" style="font-size: 14px;"><?php if($manufacturer_info){ echo $manufacturer_info[0]['manufacturer_name']; } ?></p>
              <h4 class="text-danger"><?php echo $product_info['product_name']; ?> - <span class="product_weight"></span></h4>
              <p class="card-text ">
                <span class="f-12 "> MRP:Rs <span class="line-throw product_mrp"></span></span>
                <span class="f-14 text-bold ml-2">Price: Rs <span class="product_price"></span></span>
                <small class="badge badge-warning p-2 ml-2"><span class="product_discount"></span></small>
              </p>
              <div class="add-div mt-3 mb-3 row">
                <input type="hidden" id="min_ord_limit" value="<?php echo $product_info['min_ord_limit']; ?>">
                <input type="hidden" id="max_ord_limit" value="<?php echo $product_info['max_ord_limit']; ?>">
                <!-- <button type="button" class="btn btn-outline-secondary btn-sm text-center  "><i class="fa fa-minus"></i></button> -->
                <button type="button" id="btn_Q_minus" class="btn btn-sm btn-outline-secondary mb-3 col-3 col-md-1 "><i class="fa fa-minus"></i></button>
                <input type="number" id="product_qty" class="quantity form-control mb-3 mx-2 text-center col-4 col-md-2 pro_det_qrt" name="quantity" value="1">
                <button type="button" id="btn_Q_plus" class="btn btn-sm btn-outline-secondary mb-3 col-3 col-md-1 "><i class="fa fa-plus"></i></button>
                <button type="button" id="btn_add_to_cart" class="btn btn-sm btn-success mb-3 col-12 col-md-4 ml-2">Add To Cart</button>
                <button type="button" id="add_to_wishlist" class="btn btn-sm btn-success mb-3 col-12 col-md-2 ml-1 bg-red" title="Add To Wishlist"><i class="fa fa-heart"></i></button>
              </div>
              <?php
              $product_id = $product_info['product_id'];
              $prod_attr_list = $this->Website_Model->prod_attr_list($product_id);
              $pro_attr_cnt = 0;
              foreach ($prod_attr_list as $prod_attr_list1) {
                $pro_attr_cnt++;
              ?>
              <div class="card mb-1 p-2 product-attr <?php if ($pro_attr_cnt == 1) { echo 'attr-selected'; } ?>">
                <input type="hidden" product_id="<?php echo $product_id; ?>" pro_attri_id="<?php echo $prod_attr_list1->pro_attri_id; ?>" product_name="<?php echo $product_info['product_name']; ?>" product_mrp="<?php echo $prod_attr_list1->pro_attri_mrp; ?>" product_price="<?php echo $prod_attr_list1->pro_attri_price; ?>" product_dis_per="<?php echo $prod_attr_list1->pro_attri_dis_per; ?>" product_dis_amt="<?php echo $prod_attr_list1->pro_attri_dis_amt; ?>" product_weight="<?php echo $prod_attr_list1->pro_attri_weight; ?>" product_unit="<?php echo $prod_attr_list1->unit_name; ?>" product_gst_per="<?php echo $product_info['tax_rate']; ?>">

                <a class="select-attr">
                <div class="row">
                  <div class="col-md-2">
                    <p class="m-0"><?php echo $prod_attr_list1->pro_attri_weight; ?> <?php echo $prod_attr_list1->unit_name; ?></p>
                  </div>
                  <div class="col-md-8 text-center">
                    <p class="card-text ">
                      <?php if( $prod_attr_list1->pro_attri_mrp != $prod_attr_list1->pro_attri_dis_per){ ?>
                        <span class="f-12 "> MRP:Rs <span class="line-throw mr-3"><?php echo $prod_attr_list1->pro_attri_mrp; ?></span>  </span>
                      <?php } ?>
                      <span class="f-14 text-bold">Price: Rs <?php echo $prod_attr_list1->pro_attri_price; ?></span>
                      <?php if( $prod_attr_list1->pro_attri_dis_per > 0){ ?>
                        <small class="badge badge-secondary p-1 ml-3"><?php echo $prod_attr_list1->pro_attri_dis_per; ?>% Discount</small>
                      <?php } ?>
                    </p>
                  </div>
                  <div class="col-md-2 text-center">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                </div>
                </a>
              </div>
              <?php } ?>
              <!-- <div class="card mb-1 p-1">
                <h4> Product Category</h4>
              </div> -->
            </div>
          </div>
      </div>
     </div>
    </div>


  </div>
</section>

<section class="product_details">
    <div class="container">
      <div class="row">
      <div class="card w-100">
        <div class="col-md-12">
          <h4><?php echo $product_info['product_name']; ?></h4>
          <hr class="grey-hr">
          <h5>About the Product</h5>
          <p class="text-justify"><?php echo $product_info['product_details']; ?></p>
          <hr class="grey-hr">

        </div>
      </div>
    </div>
  </div>
</section>

<?php include ('footer.php'); ?>
<script type="text/javascript">var base_url = "<?php echo base_url(); ?>";</script>
<script src="<?php echo base_url(); ?>assets/js/add_to_cart.js"></script>

<script type="text/javascript">
  $('#btn_Q_minus').on('click', function(){
    var product_qty = $('#product_qty').val();
    if(product_qty > 1){
      var new_pro_qtr = product_qty - 1;
      $('#product_qty').val(new_pro_qtr);
    }
  });
  $('#btn_Q_plus').on('click', function(){
    var product_qty = $('#product_qty').val();
    var product_qty = parseInt(product_qty);
    var new_pro_qtr = product_qty + 1;
    $('#product_qty').val(new_pro_qtr);
  });

  $('#product_qty').on('change', function(){
    var product_qty = $('#product_qty').val();
    if(product_qty == ''){
      $('#product_qty').val(1);
    } else if (product_qty<=0) {
      var product_qty = parseInt(product_qty);
      $('#product_qty').val(1);
    }
  });



  $(document).on('click','.small-img-click', function(){
    $('.img-zoom-lens').remove();
    var img_name = $(this).find('img').attr('img_name');
    $('#myimage').attr('src','<?php echo base_url(); ?>assets/images/product/'+img_name+'');
    imageZoom("myimage", "myresult");
    // alert(img_name);
    // $('.full-img').html('<img id="myimage" src="<?php echo base_url(); ?>assets/images/product/'+img_name+'" alt="" width="100%">')
  });

  $(document).on('mouseenter','.full-img',function(){
    $('.myresult').css('display','block');
  });
  $('.full-img').mouseleave(function(){
    $('.myresult').css('display','none');
  });


function imageZoom(imgID, resultID) {
  // $('#myresult').removeClass('d-none');
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  // result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
// Initiate zoom effect:
imageZoom("myimage", "myresult");
</script>


<script type="text/javascript">
  // $('.small-img-click').on('click', function(){
  //   $('.full-img').html('<img src="<?php echo base_url(); ?>assets/images/product/masala.jpg" alt="" width="100%">')
  // });

  $('.select-attr').on('click', function(){
    $('.product-attr').removeClass('attr-selected');
    $(this).closest('.product-attr').addClass('attr-selected');
    var product_price =  $(this).closest('.product-attr').find("input").attr('product_price');
    var product_mrp =  $(this).closest('.product-attr').find("input").attr('product_mrp');
    var product_attr =  $(this).closest('.product-attr').find("input").attr('product_attr');
    var product_dis_per = $(this).closest('.product-attr').find("input").attr('product_dis_per');
    var product_weight = $(this).closest('.product-attr').find("input").attr("product_weight");
    var product_unit = $(this).closest('.product-attr').find("input").attr("product_unit");
    var product_price_det = 'Rs. '+product_price+'';
    var product_mrp_det = 'Rs. '+product_mrp+'';
    $('.product_weight').text(product_weight+' '+product_unit);
    $('.product_mrp').text(product_mrp);
    $('.product_price').text(product_price);
    $('.product_discount').text(product_dis_per+'% Discount');
    // alert(product_unit);
  });

  $('#btn_add_to_cart').on('click', function(){

    var product_id = $('.attr-selected').find("input").attr("product_id");
    var pro_attri_id = $('.attr-selected').find("input").attr("pro_attri_id");
    var product_name = $('.attr-selected').find("input").attr("product_name");
    var product_mrp = $('.attr-selected').find("input").attr("product_mrp");
    var product_price = $('.attr-selected').find("input").attr("product_price");
    var product_dis_per = $('.attr-selected').find("input").attr("product_dis_per");
    var product_dis_amt = $('.attr-selected').find("input").attr("product_dis_amt");
    var product_weight = $('.attr-selected').find("input").attr("product_weight");
    var product_unit = $('.attr-selected').find("input").attr("product_unit");

    var product_qty = $('#product_qty').val();
    var product_qty = parseInt(product_qty);
    var min_ord_limit = $('#min_ord_limit').val();
    var max_ord_limit = $('#max_ord_limit').val();

    var product_gst_per = $('.attr-selected').find("input").attr("product_gst_per");

    if(product_qty > max_ord_limit){
      toastr.error('Invalid Product Quantity');
    }
    else if (product_qty < min_ord_limit){
      toastr.error('Invalid Product Quantity');
    } else{
      $.ajax({
        url:base_url+'Cart/add_to_cart',
        type: 'POST',
        data: {
               "product_id":product_id,
               "pro_attri_id":pro_attri_id,
               "product_name":product_name,
               "product_mrp":product_mrp,
               "product_price":product_price,
               "product_dis_per":product_dis_per,
               "product_dis_amt":product_dis_amt,
               "product_weight":product_weight,
               "product_unit":product_unit,
               "product_qty":product_qty,
               "product_gst_per":product_gst_per,
              },
        context: this,
        success: function(result){
          var data = JSON.parse(result);
          $('#myCart .modal-body').html(data['cart']);
          $('.my-cart-badge').html(data['row_count']);
          toastr.success('Product Added To Cart');
        }
      });
    }
    // alert(product_price);
  });

  // Add To Wishlist...
  $('#add_to_wishlist').on('click',function(){
    var product_id = $('.attr-selected').find("input").attr("product_id");
    $.ajax({
      url:base_url+'Cart/add_to_wishlist',
      type: 'POST',
      data: {
             "product_id":product_id,
            },
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        if(data['code'] == 2){
          toastr.success(data['msg']);
        } else{
          toastr.error(data['msg']);
        }
      }
    });
  });





  $(document).ready(function(){
    $('.myresult').css('display','none');
    var product_price =  $('.attr-selected').find("input").attr('product_price');
    var product_mrp =  $('.attr-selected').find("input").attr('product_mrp');
    var product_attr =  $('.attr-selected').find("input").attr('product_attr');
    var product_dis_per = $('.attr-selected').find("input").attr('product_dis_per');
    var product_weight = $('.attr-selected').find("input").attr("product_weight");
    var product_unit = $('.attr-selected').find("input").attr("product_unit");
    var product_price_det = 'Rs. '+product_price+'';
    var product_mrp_det = 'Rs. '+product_mrp+'';
    $('.product_weight').text(product_weight+' '+product_unit);
    $('.product_mrp').text(product_mrp);
    $('.product_price').text(product_price);
    $('.product_discount').text(product_dis_per+'% Discount');
  });
</script>
