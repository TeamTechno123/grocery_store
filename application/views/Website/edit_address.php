<?php include('header.php'); ?>
<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h3>Edit Address Details</h3>
          <hr class="hr-web">
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="first_name" class="col-sm-2 col-form-label">Address </label>
                  <div class="col-sm-10">
                    <textarea name="customer_address" id="customer_address" class="form-control" rows="3" cols="95" required><?php echo $eco_cust_info['customer_address']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="customer_city" id="customer_city" value="<?php echo $eco_cust_info['customer_city']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Pincode</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="customer_pin" id="customer_pin" value="<?php echo $eco_cust_info['customer_pin']; ?>" required>
                  </div>
                </div>
                <div class="row text-center ">
                  <div class="col-8 offset-md-2 mt-3">
                    <button type="submit" class="btn btn-outline-success mr-3">Save Changes</button>
                    <a href="" class="btn btn-outline-secondary">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <!-- <br> <hr> -->

            <!-- <h2>Address Details</h2>
            <hr class="hr-web">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label for="first_name" class="col-sm-2 col-form-label">Address </label>
                    <div class="col-sm-10">
                    <textarea name="name" class="form-control" rows="3" cols="95"></textarea>  </div>
                  </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">City  </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="city" id="city" placeholder="City">
                </div>
              </div>

              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">State </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="state" id="state" placeholder="State">
                  </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pincode  </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode">
                    </div>
                  </div>


                      <div class="row text-center ">
                        <div class="col-8 offset-md-2 mt-3">
                          <button type="button" class="btn btn-outline-success mr-3">Save Address</button>   <button type="button" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </div>
                  <br>
                  </div>
            </div> -->
          </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
