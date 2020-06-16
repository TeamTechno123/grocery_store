<?php include('header.php'); ?>

  <section class="default-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-heading">Success</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="checkout-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card p-3">
            <p>Payment Successful</p>
            <p><?php echo $pay_msg; ?></p>
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo base_url(); ?>" class="btn btn-success" >Done</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include('footer.php'); ?>
