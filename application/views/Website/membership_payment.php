<?php include('header.php'); ?>

<?php
  $mem_sch_amt = $membership_info['mem_sch_amt'];
  if ($mem_sch_amt == 0) {
    $mem_sch_amt = 1;
  }

  $productinfo = 'Kirana Bhara Membership';
  $key_id = RAZOR_KEY_ID;
  $key_Secret = RAZOR_KEY_SECRET;
  $currency = 'INR';
  $total = ($mem_sch_amt*100);
  $customer_name = $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname'];
  $customer_email = $eco_cust_info['customer_email'];
  $customer_mobile = $eco_cust_info['customer_mobile'];
  $org_name = 'Kirana Bhara Membership';

  require('razorpay-php/Razorpay.php');
  use Razorpay\Api\Api;
  $api = new Api($key_id, $key_Secret);
  $orderData = [
      'receipt'         => 3456,
      'amount'          => $total,
      'currency'        => $currency,
      'payment_capture' => 1
  ];
  $razorpayOrder = $api->order->create($orderData);
  $razorpayOrderId = $razorpayOrder['id'];
?>

<section class="top-membership bg-kb my-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
          <h4 class="text-center Merriweather text-white">KBC MEMBERSHIP</h4>
      </div>
    </div>
  </div>
</section>

<section class="pricing">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card p-3 text-left">
          <h4>Membership Payment Details</h4>
          <hr>
          <p>Name : <?php echo $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname']; ?></p>
          <p>Mobile : <?php echo $eco_cust_info['customer_mobile']; ?></p>
          <p>Email : <?php echo $eco_cust_info['customer_email']; ?></p>
          <p>Details : <?php echo $membership_info['mem_sch_valid']; ?> Days</strong> Free Membership</p>
          <p>Amount : Rs. <?php echo $membership_info['mem_sch_amt']; ?></p>
          <hr>
          <div class="text-center">
            <button class="btn btn-success" id="btn_join_mem" type="button" onclick="$('.razorpay-payment-button').click()" >Make Payment</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<form class="d-none" action="<?php echo base_url(); ?>Payment/membership_payment_success/<?php echo $membership_info['mem_sch_id']; ?>" method="POST">
  <script
  src="https://checkout.razorpay.com/v1/checkout.js"
  data-key="<?php echo $key_id; ?>"
  data-amount="<?php echo $total; ?>"
  data-currency="<?php echo $currency; ?>"
  data-order_id="<?php echo $razorpayOrderId; ?>"
  data-buttontext="Make Payment"
  data-name="<?php echo $org_name; ?>"
  data-description="<?php echo $org_name; ?>"
  data-image=""
  data-prefill.name="<?php echo $customer_name; ?>"
  data-prefill.email="<?php echo $customer_email; ?>"
  data-prefill.contact="<?php echo $customer_mobile; ?>"
  data-theme.color="#F37254" >
  </script>
  <input type="hidden" custom="Hidden Element" name="hidden">
</form>


<?php include('footer.php'); ?>
