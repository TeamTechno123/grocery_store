// Show Price of Attribute on Page Load..
  $(document).ready(function(){
    $('.product_item .select_product_attr').each(function(){
      var product_price =  $(this).find("option:selected").attr('product_price');
      var product_mrp =  $(this).find("option:selected").attr('product_mrp');
      var product_attr =  $(this).find("option:selected").attr('product_attr');
      var product_dis_per = $(this).find("option:selected").attr('product_dis_per');
      var product_price_det = 'Rs. '+product_price+'';
      var product_mrp_det = 'Rs. '+product_mrp+'';

      $(this).closest('.card-body').find('.prod_pri').text(product_price_det);
      $(this).closest('.card-body').find('.prod_mrp').html('<span class="line-throw">'+product_mrp_det+'</span>&nbsp;&nbsp;&nbsp;&nbsp;');
      if(product_dis_per > 0){
        if(product_dis_per < 10){ product_dis_per = '0'+product_dis_per; }
        $(this).closest('.card').find('.discount').css('display','block');
        $(this).closest('.card').find('.product_discount_per').text(product_dis_per);
      } else{
        $(this).closest('.card').find('.discount').css('display','none');
      }
    });
  });

  // Show Price on Select Attribute..
  $('.product_item .select_product_attr').on('change',function(){
    var product_price =  $(this).find("option:selected").attr('product_price');
    var product_mrp =  $(this).find("option:selected").attr('product_mrp');
    var product_attr =  $(this).find("option:selected").attr('product_attr');
    var product_dis_per = $(this).find("option:selected").attr('product_dis_per');
    var product_price_det = 'Rs. '+product_price+'';
    var product_mrp_det = 'Rs. '+product_mrp+'';

    $(this).closest('.card-body').find('.prod_pri').text(product_price_det);
    $(this).closest('.card-body').find('.prod_mrp').html('<span class="line-throw">'+product_mrp_det+'</span>&nbsp;&nbsp;&nbsp;&nbsp;');
    if(product_dis_per > 0){
      $(this).closest('.card').find('.discount').css('display','block');
      $(this).closest('.card').find('.product_discount_per').text(product_dis_per);
    } else{
      $(this).closest('.card').find('.discount').css('display','none');
    }
  });

  // // Quantity Add...
  // $('.btn_qty_plus').on('click',function(){
  //   var old_qty =  $(this).closest('.card-body').find('.product_qty').val();
  //   if(old_qty == ''){ old_qty = 0; }
  //   var old_qty = parseInt(old_qty);
  //   var product_qty = old_qty + 1;
  //   $(this).closest('.card-body').find('.product_qty').val(product_qty);
  // });
  //
  // // Quantity Minus...
  // $('.btn_qty_minus').on('click',function(){
  //   var old_qty =  $(this).closest('.card-body').find('.product_qty').val();
  //   if(old_qty == ''){ old_qty = 0; }
  //   var old_qty = parseInt(old_qty);
  //   if(old_qty > 1){
  //     var product_qty = old_qty - 1;
  //   } else{
  //       var product_qty = 1;
  //   }
  //   $(this).closest('.card-body').find('.product_qty').val(product_qty);
  // });

  // Show Cart on Page Load.

  // Add To Cart...
  $('.product_item .add_to_cart').on('click',function(){
    var product_id = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_id");
    var pro_attri_id = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("pro_attri_id");
    var product_name = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_name");
    var product_mrp = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_mrp");
    var product_price = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_price");
    var product_dis_per = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_dis_per");
    var product_dis_amt = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_dis_amt");
    var product_weight = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_weight");
    var product_unit = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_unit");
    var product_qty = $(this).closest('.card-body').find('.product_qty').val();
    var min_ord_limit = $(this).closest('.card-body').find('.min_ord_limit').val();
    var max_ord_limit = $(this).closest('.card-body').find('.max_ord_limit').val();

    var product_gst_per = $(this).closest('.card-body').find('.select_product_attr').find("option:selected").attr("product_gst_per");

    var product_qty = parseInt(product_qty);

    if(max_ord_limit > 0 && product_qty > max_ord_limit){
      toastr.error('Invalid Product Quantity');
    }
    else if (min_ord_limit > 0 && product_qty < min_ord_limit){
      toastr.error('Invalid Product Quantity');
    } else{
      // var base_url = window.location.origin;
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
          // alert(data);
          $('#myCart .modal-body').html(data['cart']);
          $('.my-cart-badge').html(data['row_count']);
          toastr.success('Product Added To Cart');
        }
      });
    }
  });
