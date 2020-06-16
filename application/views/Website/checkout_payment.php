<?php include('header.php'); ?>
  <?php
    $final_payment_amt = $this->session->userdata('final_payment_amt');
    if ($final_payment_amt == 0) {
      $final_payment_amt = 1;
    }
    $productinfo = 'Kirana Bhara';
    $surl = base_url().'Payment/success';
    $key_id = RAZOR_KEY_ID;
    $key_Secret = RAZOR_KEY_SECRET;
    $currency = 'INR';
    $total = ($final_payment_amt*100);
    $customer_name = $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname'];
    $customer_email = $eco_cust_info['customer_email'];
    $customer_mobile = $eco_cust_info['customer_mobile'];
    $org_name = 'Kirana Bhara Order';

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

  <section class="default-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-heading">Make Payment</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="checkout-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card p-3">
            <p>Customer Name : <?php echo $customer_name; ?></p>
            <p>Customer Mobile : <?php echo $customer_mobile; ?></p>
            <p>Customer Email : <?php echo $customer_email; ?></p>
            <p>Customer Address : </p>
            <p>Payment Amount : <?php echo $final_payment_amt; ?></p>
            <div class="row">
              <div class="col-md-6 text-center">
                <button class="btn btn-success" type="button" id="secondaryButton" onclick="$('.razorpay-payment-button').click()" >Make Payment</button>
              </div>
              <div class="col-md-6 text-center">
                <!-- go to cart page -->
                <a href="<?php echo base_url(); ?>Cart" class="btn btn-primary" >Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <form class="d-none" action="<?php echo base_url(); ?>Payment/checkout_payment_success" method="POST">
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
