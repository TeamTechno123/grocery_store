<?php include('header.php'); ?>

<!-- <section class="default-page">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading  ">Profile</h1>

      </div>
      <div class="col-md-12">
          <p class="text-center text-white f-18">Have A Question For Us?</p>
      </div>
    </div>
  </div>
</section> -->

<section class="profile-container">

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
          <div class="card p-3">
            <h2>My Wallet</h2>
            <hr class="hr-web">
            <div class="row">
              <div class="col-md-9">
                <p>The bigbasket Wallet is a pre-paid credit account that is associated with your bigbasket account. This prepaid account allows you to pay a lump sum amount once to bigbasket and then shop multiple times without having to pay each time.</p>
                </div>
            </div>

            <div class="card p-4 bg-grey">
                <div class="row">

                <div class="col-md-12">
                  <h4>Fund the wallet</h4>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Amount to fund  Rs.</span>
                      </div>
                      <input type="number" class="form-control" placeholder="Add Fund" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group py-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                          <input type="radio" aria-label="Radio button for following text input">
                          </div>
                        </div>
                        <label class="py-1 px-3" for="">Credit Card / Debit Card / Net Banking </label>
                      </div>
                  <button class="btn menu-btn btn-kb btn-primary" type="submit">Add Fund</button>
                </div>
                </div>
            </div>

          </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
