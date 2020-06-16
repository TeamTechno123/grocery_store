<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Become Our Reseller</h1>
      </div>
    </div>
  </div>
</section>

<section class="cookbook-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <img class="cookbook-img" src="<?php echo base_url(); ?>assets/images/resseler.jpg" alt="" width="100%">
      </div>
    </div>
  </div>
</section>


<section class="cookbook-page2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card py-3 px-2">
          <h5 class="text-center mf-16">Reseller Registration Form</h5>
          <form class="" action="" method="post" autocomplete="off">
            <div class="row">
              <div class="form-group col-md-6 offset-md-3">
                <label>Full Name*</label>
                <input type="text" class="form-control form-control-sm" name="reseller_reg_name" id="reseller_reg_name" required>
              </div>
              <div class="form-group col-md-6 offset-md-3">
                <label>Address*</label>
                <input type="text" class="form-control form-control-sm" name="reseller_reg_addr" id="reseller_reg_addr" required>
              </div>
              <div class="col-md-6 offset-md-3">
                <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Gender : </label>
                  </div>
                  <div class="form-group col-md-2">
                    <input class="form-check-input" type="radio" value="Male" name="reseller_reg_gender" checked > Male
                  </div>
                  <div class="form-group col-md-2">
                    <input class="form-check-input" type="radio" value="Female" name="reseller_reg_gender" > Female
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6 offset-md-3">
                <label>Mobile No.*</label>
                <input type="number" class="form-control form-control-sm" name="reseller_reg_mob" id="reseller_reg_mob" required>
              </div>
              <div class="form-group col-md-6 offset-md-3">
                <label>Email</label>
                <input type="email" class="form-control form-control-sm" name="reseller_reg_email" id="reseller_reg_email">
              </div>
              <div class="form-group col-md-6 offset-md-3 text-center">
                <button type="submit" class="btn my-3 btn-outline-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>




  <?php include('footer.php'); ?>
