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
  <form class="" action="<?php echo base_url(); ?>Cart/checkout_pay_calculation" method="post">

  <div class="row">
    <div class="col-md-9">
      <div class="billing mb-3">
        <div class="col-md-12">
          <h4>Delivery Address</h4>
          <hr class="grey-hr">
        </div>
        <div class="col-md-12">
          <h5>Select Delivery Address</h5>
          <select class="form-control select2 form-control-sm" id="address_id" data-placeholder="Select Delivery Address" required>
            <?php if(isset($delivery_address_list)){ foreach ($delivery_address_list as $list) { ?>
            <option <?php if($list->is_default == 1){ echo 'selected'; } ?> value="<?php echo $list->address_id; ?>" address="<?php echo $list->address; ?>" country_id="<?php echo $list->country_id; ?>" state_id="<?php echo $list->state_id; ?>" city_id="<?php echo $list->city_id; ?>" pincode="<?php echo $list->pincode; ?>" ><?php echo $list->address_title; ?></option>
            <?php } } ?>
          </select>
        </div>
        <div class="col-md-12">
          <hr class="grey-hr">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">First Name*</label>
              <input class="form-control form-control-sm" name="customer_fname" type="text" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_fname']; } ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Last Name*</label>
              <input class="form-control form-control-sm" name="customer_lname" type="text" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_lname']; } ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="checkout-fn">Address*</label>
              <textarea name="customer_address" id="customer_address" class="form-control" rows="3" required><?php echo $eco_cust_info['customer_address']; ?></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Country*</label>
              <select class="form-control select2 form-control-sm" name="country_id" id="country_id" data-placeholder="Select Country" required>
                <option value="">Select Country</option>
                <?php if(isset($country_list)){ foreach ($country_list as $list) { ?>
                <option value="<?php echo $list->country_id; ?>" <?php if(isset($eco_cust_info) && $eco_cust_info['country_id'] == $list->country_id){ echo 'selected'; } ?>><?php echo $list->country_name; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">State*</label>
              <select class="form-control select2 form-control-sm" name="state_id" id="state_id" data-placeholder="Select State" required>
                <option value="">Select State</option>
                <?php if(isset($state_list)){ foreach ($state_list as $list) { ?>
                <option value="<?php echo $list->state_id; ?>" <?php if(isset($eco_cust_info) && $eco_cust_info['state_id'] == $list->state_id){ echo 'selected'; } ?>><?php echo $list->state_name; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">City*</label>
              <select class="form-control select2 form-control-sm" name="city_id" id="city_id" data-placeholder="Select City" required>
                <option value="">Select City</option>
                <?php if(isset($city_list)){ foreach ($city_list as $list) { ?>
                <option value="<?php echo $list->city_id; ?>" <?php if(isset($eco_cust_info) && $eco_cust_info['city_id'] == $list->city_id){ echo 'selected'; } ?>><?php echo $list->city_name; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Pin/Zip No.*</label>
              <input class="form-control form-control-sm" id="customer_pin" name="customer_pin" type="number" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_pin']; } ?>" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Mobile Number*</label>
              <input class="form-control form-control-sm" name="customer_mobile" type="number" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_mobile']; } ?>" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Email</label>
              <input class="form-control form-control-sm" name="customer_email" type="email" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_email']; } ?>">
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="checkout-fn">Email</label>
              <input class="form-control form-control-sm" name="customer_email" type="email" value="<?php if(isset($eco_cust_info)){ echo $eco_cust_info['customer_email']; } ?>">
            </div>
          </div>
        </div> -->
      </div>
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

<div class="col-md-12 mb-3"><hr></div>
<div class="col-md-12 mb-3">
  <h4 class="text-left">Timeslot</h4>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="checkout-fn">Select Date</label>
    <!-- <div class="input-group date" id="min_date1" data-target-input="nearest"> -->
      <input type="text" name="order_timeslot_date" id="min_date1" data-target="#min_date1" data-toggle="datetimepicker" class="form-control form-control-sm">
      <!-- <div class="input-group-append" data-target="#min_date1" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="far fa-calender"></i></div>
      </div> -->
    <!-- </div> -->
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label for="checkout-fn">Select Timeslot</label>
    <select class="form-control select2 form-control-sm" name="order_timeslot_time" id="order_timeslot" data-placeholder="Select Timeslot" required>
      <option value="">Select Timeslot</option>
      <?php if(isset($timeslot_list)){ foreach ($timeslot_list as $list) {
        if(time() < strtotime($list->timeslot_start_time)){
      ?>
      <option value="<?php echo $list->timeslot_start_time.' To '.$list->timeslot_end_time; ?>" ><?php echo $list->timeslot_start_time.' To '.$list->timeslot_end_time; ?></option>
    <?php } } } ?>
    </select>
  </div>
</div>
<div class="col-md-12 mb-3"><hr></div>


    <div class="col-md-4">
      <div class="card py-3">
        <div class="row">
          <div class="col-12">
            <p>Apply Coupon </p>
            <p>Enter Coupon Code : </p>
          </div>
          <div class="col-8">
            <input type="text" id="txt_coupon_code" name="txt_coupon_code" class="form-control form-control-sm text-center cart_product_qty"  value="" >
          </div>
          <div class="col-4">
            <button id="btn_apply_coupon" type="button" class="btn btn-sm btn-success">Apply</button>
          </div>
          <div class="col-12">
            <p id="coupne_succ_text" class="text-success"></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card py-3">
        <div class="row">
          <div class="col-12">
            <p>Redeem Wallet Points</p>
          </div>
          <div class="col-12">
            <p class="text-success">Point Balance : <?php echo $wallet_bal_point; ?></p>
            <?php if ($wallet_bal_point >= 999) { ?>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="chk_redeem_point" id="chk_redeem_point" value="1">
                <label for="chk_redeem_point" class="custom-control-label">Redeem Points</label>
              </div>
            <?php } else{ ?>
              <p class="text-danger">Minimum 999 points required to redeem.</p>
            <?php } ?>
          </div>
          <div class="col-12">
            <p id="used_points" class="text-success"></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card py-3">
        <div class="row">
          <div class="col-8">
            <p>Total:</p>
            <p>Coupon Amount:</p>
            <p>Points Used:</p>
          </div>
          <div class="col-4 text-right">
            <p id="total_amount">&#8377;0</p>
            <p id="coupon_amt">&#8377;0</p>
            <p id="point_amount">&#8377;0</p>
          </div>
          <div class="col-12">
            <hr class="grey-hr">
          </div>
          <div class="col-8">
            <p>Payment:</p>
          </div>
          <div class="col-4 text-right">
            <p id="final_payment">&#8377;0</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-outline-success">Make Payment</button>
    </div>
  </div>
</form>
  </div>

</section>

<input type="hidden" name="coupon_amt" id="coupon_amt2" value="0">

<?php //if($this->session->flashdata('coupon_code')){ echo $this->session->flashdata('coupon_code'); } ?>


<?php include('footer.php'); ?>

<!-- If session is Set -->

<script type="text/javascript">
$(document).ready(function(){
  var address_id =  $('#address_id').find("option:selected").val();
  var address =  $('#address_id').find("option:selected").attr('address');
  var country_id =  $('#address_id').find("option:selected").attr('country_id');
  var state_id =  $('#address_id').find("option:selected").attr('state_id');
  var city_id =  $('#address_id').find("option:selected").attr('city_id');
  var pincode =  $('#address_id').find("option:selected").attr('pincode');

  $('#customer_address').val(address);
  $('#country_id').val(country_id);
  $('#state_id').val(state_id);
  $('#city_id').val(city_id);
  $('#customer_pin').val(pincode);
});

$("#address_id").on("change", function(){
  var address_id =  $('#address_id').find("option:selected").val();
  if(address_id != ''){
    var address =  $('#address_id').find("option:selected").attr('address');
    var country_id =  $('#address_id').find("option:selected").attr('country_id');
    var state_id =  $('#address_id').find("option:selected").attr('state_id');
    var city_id =  $('#address_id').find("option:selected").attr('city_id');
    var pincode =  $('#address_id').find("option:selected").attr('pincode');

    $('#customer_address').val(address);
    $('#country_id').val(country_id);
    $('#state_id').val(state_id);
    $('#city_id').val(city_id);
    $('#customer_pin').val(pincode);
  } else{
    location.replace("Checkout");
  }
  // alert(address);
});
// Check Pincode...
var customer_pin1 = $('#customer_pin').val();
$('#customer_pin').on('change',function(){
  var customer_pin = $(this).val();
  $.ajax({
    url:'<?php echo base_url(); ?>User/check_duplication',
    type: 'POST',
    data: {"column_name":"tahsil_pincode_no",
           "column_val":customer_pin,
           "table_name":"tahsil_pincode"},
    context: this,
    success: function(result){
      if(result == 0){
        $('#customer_pin').val(customer_pin1);
        toastr.error(customer_pin+' is Invalid.');
        $('#customer_pin').focus();
      }
    }
  });
});

  $(document).ready(function(){
    $.ajax({
      url:'<?php echo base_url(); ?>Cart/load_cart',
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('#cart_subtotal').html('&#8377;'+data['cart_total']);
        $('#shipping_amt').html('&#8377;'+data['shipping_amt']);
        $('#gst_amount').html('&#8377;'+data['gst_amount'].toFixed(2));

        var subtotal = parseFloat(data['cart_total']);
        var shipping_amt = parseFloat(data['shipping_amt']);
        var cart_final_amount = parseFloat(data['cart_final_amount']);
        var final_amount = subtotal + shipping_amt;

        $('#final_amount').html('&#8377;'+cart_final_amount);
        $('#total_amount').html('&#8377;'+cart_final_amount);
        var cart_final_amount = parseFloat(data['cart_final_amount']);

        <?php if($this->session->userdata('coupon_amt')){ ?>
          var coupon_amt = <?php echo $this->session->userdata('coupon_amt'); ?>;
          if(coupon_amt > 0){
            cart_final_amount = cart_final_amount - coupon_amt;
          }
        <?php } ?>
        <?php if($this->session->userdata('wallet_point_used')){ ?>
          var wallet_point_used = <?php echo $this->session->userdata('wallet_point_used'); ?>;
          if(wallet_point_used > 0){
            cart_final_amount = cart_final_amount - wallet_point_used;
          }
        <?php } ?>

        $('#final_payment').html('&#8377;'+cart_final_amount);
      }
    });
  });

  $('#btn_apply_coupon').on('click', function(){
    var coupon_code = $('#txt_coupon_code').val();
    if($("#chk_redeem_point").prop('checked') == true){
      var chk_redeem_point = 1
      var wallet_bal_point = <?php echo $wallet_bal_point; ?>
    } else{
      var chk_redeem_point = 0
    }

    $.ajax({
      url:'<?php echo base_url(); ?>Cart/apply_coupon',
      type: 'POST',
      data: {
             "coupon_code":coupon_code,
             "chk_redeem_point":chk_redeem_point,
             "wallet_bal_point":wallet_bal_point,
            },
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        if(data['is_coupon_appl'] == 1){
          $('#txt_coupon_code').attr('readonly',true);
          $('#btn_apply_coupon').attr('disabled',true);
          toastr.success(data['msg']);
          var coupon_amt = data['coupon_amt'];
          $('#coupne_succ_text').html('Coupon Applied Successfully. Coupon Amount &#8377;'+coupon_amt);
          var final_amount = data['final_amount'];

          $('#coupon_amt').html('&#8377;'+coupon_amt);
          $('#coupon_amt2').val(coupon_amt);
          $('#point_amount').html('&#8377;'+data['wallet_point_used']);
          $('#final_payment').html('&#8377;'+data['coupon_cart_final_amount']);
          $('#used_points').html(data['wallet_point_used']+' Points Used from Wallet');
        } else{
          toastr.error(data['msg']);
        }
      }
    });
  });

  $('#chk_redeem_point').change(function() {
    if(this.checked) {
      var coupon_amt = $('#coupon_amt2').val();
      var wallet_bal_point = <?php echo $wallet_bal_point; ?>;
      var chk_redeem_point = 1;
    } else{
      var coupon_amt = $('#coupon_amt2').val();
      var wallet_bal_point = <?php echo $wallet_bal_point; ?>;
      var chk_redeem_point = 0;
    }

    $.ajax({
      url:'<?php echo base_url(); ?>Cart/redeem_point',
      type: 'POST',
      data: {
             "coupon_amt":coupon_amt,
             "wallet_bal_point":wallet_bal_point,
             "chk_redeem_point":chk_redeem_point,
            },
      context: this,
      success: function(result){
        var data = JSON.parse(result);
        $('#point_amount').html('&#8377;'+data['wallet_point_used']);
        $('#final_payment').html('&#8377;'+data['coupon_cart_final_amount']);
        if(chk_redeem_point = 1){
          $('#used_points').html(data['wallet_point_used']+' Points Used from Wallet');
        } else{
          $('#used_points').html('');
        }
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    <?php if($this->session->userdata('coupon_code')){ ?>
      var coupon_code = "<?php echo $this->session->userdata('coupon_code'); ?>";
      $('#txt_coupon_code').val(coupon_code);
    <?php } ?>
    <?php if($this->session->userdata('coupon_amt')){ ?>
      var coupon_amt = <?php echo $this->session->userdata('coupon_amt'); ?>;
      if(coupon_amt > 0){
        $('#coupon_amt2').val(coupon_amt);
        $('#coupon_amt').html('&#8377;'+coupon_amt);
        $('#coupne_succ_text').html('Coupon Applied Successfully. Coupon Amount &#8377;'+coupon_amt);
      }
    <?php } ?>
    <?php if($this->session->userdata('wallet_point_used')){ ?>
      var wallet_point_used = <?php echo $this->session->userdata('wallet_point_used'); ?>;
      if(wallet_point_used > 0){
        $('#point_amount').html('&#8377;'+wallet_point_used);
        $("#chk_redeem_point").prop('checked',true);
        $('#used_points').html(wallet_point_used+' Points Used from Wallet');
      }
    <?php } ?>

  });


</script>

<!-- DataTables -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
$('#timepicker1').datetimepicker({
  format: 'LT'
})
</script> -->
