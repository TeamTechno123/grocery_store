<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Checkout</h1>
      </div>
    </div>
  </div>
</section>


<section class="checkout-middle">
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="billing mb-3">
        <div class="col-md-12">
          <h4>Cart Details</h4>
          <hr class="grey-hr">
          <div class="m-autoscroll" id="myCartPage">

          </div>
        </div>
      </div>
      <hr>
    </div>

    <div class="col-md-3">
      <div class="order_summary">
        <h4 class="text-left">Order Summary</h4>
        <hr class="grey-hr">
        <div class="card py-3">
          <div class="row">
            <div class="col-8">
              <p>Cart Subtotal:</p>
              <p>Shipping:</p>
              <p>GST(Inclusive):</p>
            </div>
            <div class="col-4 text-right">
              <p id="cart_subtotal">&#8377;0</p>
              <p id="shipping_amt">&#8377;0</p>
              <p id="gst_amount">&#8377;0</p>
            </div>
            <div class="col-12">
              <hr class="grey-hr">
            </div>
            <div class="col-8">
              <p>Total:</p>
            </div>
            <div class="col-4 text-right">
              <p id="final_amount">&#8377;0</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 text-center">
      <a href="<?php echo base_url(); ?>Checkout" type="button" class="btn btn-outline-success">Checkout</a>
    </div>
  </div>
</section>

<!-- <input type="hidden" name="payment_amount" id="payment_amount"> -->
<!-- <?php if($this->session->userdata('final_amount')){ echo $this->session->userdata('final_amount'); } ?> -->


<?php include('footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url:'<?php echo base_url(); ?>Cart/load_cart',
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('#myCartPage').html(data['cart']);
        $('#cart_subtotal').html('&#8377;'+data['cart_total']);
        $('#shipping_amt').html('&#8377;'+data['shipping_amt']);
        $('#gst_amount').html('&#8377;'+data['gst_amount'].toFixed(2));

        var subtotal = parseFloat(data['cart_total']);
        var shipping_amt = parseFloat(data['shipping_amt']);
        var cart_final_amount = parseFloat(data['cart_final_amount']);
        var final_amount = subtotal + shipping_amt;

        $('#final_amount').html('&#8377;'+cart_final_amount);
        $('#total_amount').html('&#8377;'+cart_final_amount);
        $('#final_payment').html('&#8377;'+cart_final_amount);

      }
    });
  });

  $(document).on('click', '#myCartPage .rem_cart_row', function(){
    var rowid = $(this).closest('tr').find('.rowid').val();
    if(confirm('Do you want to remove this?')){
      $(this).closest('tr').remove();
      $.ajax({
        url:'<?php echo base_url(); ?>Cart/delete_cart_item',
        type: 'POST',
        data: {
               "rowid":rowid,
              },
        context: this,
        success: function(result){
          var data = JSON.parse(result);
          $('#myCartPage').html(data['cart']);
          $('#cart_subtotal').html('&#8377;'+data['cart_total']);
          $('#shipping_amt').html('&#8377;'+data['shipping_amt']);
          $('#gst_amount').html('&#8377;'+data['gst_amount'].toFixed(2));
          $('.my-cart-badge').html(data['row_count']);

          var subtotal = parseFloat(data['cart_total']);
          var shipping_amt = parseFloat(data['shipping_amt']);
          var cart_final_amount = parseFloat(data['cart_final_amount']);
          var final_amount = subtotal + shipping_amt;

          $('#final_amount').html('&#8377;'+cart_final_amount);
          $('#total_amount').html('&#8377;'+cart_final_amount);
        }
      });
    } else{
      return false;
    }
  });

  // Quantity Add...
  $(document).on('click', '#myCartPage .btn_qty_plus', function(){
    var old_qty =  $(this).closest('tr').find('.cart_product_qty').val();
    if(old_qty == ''){ old_qty = 0; }
    var old_qty = parseInt(old_qty);
    var product_qty = old_qty + 1;
    var rowid = $(this).closest('tr').find('.rowid').val();
    $.ajax({
      url:'<?php echo base_url(); ?>Cart/update_qty',
      type: 'POST',
      data: {
             "rowid":rowid,
             "product_qty":product_qty,
            },
      context: this,
      success: function(result){

        var data = JSON.parse(result);
        $('#myCartPage').html(data['cart']);
        $('#cart_subtotal').html('&#8377;'+data['cart_total']);
        $('#shipping_amt').html('&#8377;'+data['shipping_amt']);
        $('#gst_amount').html('&#8377;'+data['gst_amount'].toFixed(2));

        var subtotal = parseFloat(data['cart_total']);
        var shipping_amt = parseFloat(data['shipping_amt']);
        var cart_final_amount = parseFloat(data['cart_final_amount']);
        var final_amount = subtotal + shipping_amt;

        $('#final_amount').html('&#8377;'+cart_final_amount);
        $('#total_amount').html('&#8377;'+cart_final_amount);
      }
    });
  });

  // Quantity Minus...
  $(document).on('click', '#myCartPage .btn_qty_minus', function(){
    var old_qty =  $(this).closest('tr').find('.cart_product_qty').val();
    if(old_qty == ''){ old_qty = 0; }
    var old_qty = parseInt(old_qty);
    if(old_qty > 1){
      var product_qty = old_qty - 1;
    } else{
        var product_qty = 1;
    }
    var rowid = $(this).closest('tr').find('.rowid').val();
    $.ajax({
      url:'<?php echo base_url(); ?>Cart/update_qty',
      type: 'POST',
      data: {
             "rowid":rowid,
             "product_qty":product_qty,
            },
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('#myCartPage').html(data['cart']);
        $('#cart_subtotal').html('&#8377;'+data['cart_total']);
        $('#shipping_amt').html('&#8377;'+data['shipping_amt']);
        $('#gst_amount').html('&#8377;'+data['gst_amount'].toFixed(2));

        var subtotal = parseFloat(data['cart_total']);
        var shipping_amt = parseFloat(data['shipping_amt']);
        var cart_final_amount = parseFloat(data['cart_final_amount']);
        var final_amount = subtotal + shipping_amt;

        $('#final_amount').html('&#8377;'+cart_final_amount);
        $('#total_amount').html('&#8377;'+cart_final_amount);
      }
    });
  });

  // Manual Qty...
  $(document).on('change', '#myCartPage .cart_product_qty', function(){
    var product_qty =  $(this).closest('tr').find('.cart_product_qty').val();
    var rowid = $(this).closest('tr').find('.rowid').val();
    $.ajax({
      url:'<?php echo base_url(); ?>Cart/update_qty',
      type: 'POST',
      data: {
             "rowid":rowid,
             "product_qty":product_qty,
            },
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('#myCartPage').html(data['cart']);
        $('#cart_subtotal').html('&#8377;'+data['cart_total']);
        $('#shipping_amt').html('&#8377;'+data['shipping_amt']);
        $('#gst_amount').html('&#8377;'+data['gst_amount'].toFixed(2));

        var subtotal = parseFloat(data['cart_total']);
        var shipping_amt = parseFloat(data['shipping_amt']);
        var cart_final_amount = parseFloat(data['cart_final_amount']);
        var final_amount = subtotal + shipping_amt;

        $('#final_amount').html('&#8377;'+cart_final_amount);
        $('#total_amount').html('&#8377;'+cart_final_amount);
      }
    });
  });

  $('#btn_apply_coupon').on('click', function(){
    var coupon_code = $('#txt_coupon_code').val();
    alert(coupon_code);
    $.ajax({
      url:'<?php echo base_url(); ?>Cart/apply_coupon',
      type: 'POST',
      data: {
             "coupon_code":coupon_code,
            },
      context: this,
      success: function(result){
        var data = JSON.parse(result);

        $('#pay_amount').val(data['final_amount']);
        if(data['is_coupon_appl'] == 1){
          // $('#txt_coupon_code').attr('disabled',true);
          // $('#btn_apply_coupon').attr('disabled',true);
          $('#coupne_succ_text').html('Coupon Applied Successfully. Coupon Amount &#8377;'+data['coupon_amt']);
          toastr.success(data['msg']);
        } else{
          toastr.error(data['msg']);
        }
      }
    });
  });
</script>
