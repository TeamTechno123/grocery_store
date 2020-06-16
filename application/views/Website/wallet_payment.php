<?php include('header.php'); ?>

<?php
  $wallet_fund_amount = $_POST['wallet_fund_amount'];
  if ($wallet_fund_amount == 0) {
    $wallet_fund_amount = 100;
  }
  $this->session->set_userdata('wallet_fund_amount',$wallet_fund_amount);

  $productinfo = 'Kirana Bhara Wallet';
  $key_id = RAZOR_KEY_ID;
  $key_Secret = RAZOR_KEY_SECRET;
  $currency = 'INR';
  $total = ($wallet_fund_amount*100);
  $customer_name = $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname'];
  $customer_email = $eco_cust_info['customer_email'];
  $customer_mobile = $eco_cust_info['customer_mobile'];
  $org_name = 'Kirana Bhara Wallet';

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

<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h2>Wallet Add Fund</h2>
          <hr class="hr-web">
          <div class="row">
            <div class="col-md-9">
              <p class="m-mt3">The kiranabhra Wallet is a pre-paid credit account that is associated with your kiranabhra account. This prepaid account allows you to pay a lump sum amount once to kiranabhra and then shop multiple times without having to pay each time.</p>
              </div>
          </div>

          <div class="card p-4 bg-grey">
            <div class="row">
              <div class="col-md-12 text-left">
                <h4>Make Payment</h4>
                <p>Amount : <?php echo $wallet_fund_amount; ?></p>
                <button class="btn btn-success" id="btn_add_fund" type="button" onclick="$('.razorpay-payment-button').click()" >Make Payment</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<form class="d-none" action="<?php echo base_url(); ?>Payment/wallet_payment_success" method="POST">
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

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('save_success')){ ?>
      $(document).ready(function(){
        toastr.success('Wallet Fund Added Successfully');
      });
    <?php } ?>
    // <?php if($this->session->flashdata('update_success')){ ?>
    //   $(document).ready(function(){
    //     toastr.success('Updated successfully');
    //   });
    // <?php } ?>
    // <?php if($this->session->flashdata('delete_success')){ ?>
    //   $(document).ready(function(){
    //     toastr.error('Deleted successfully');
    //   });
    // <?php } ?>
  </script>
