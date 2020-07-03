<?php include('header.php'); ?>
<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
        <div class="card p-3">
          <h3>Edit Profile Details</h3>
          <hr class="hr-web">
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="customer_fname" id="customer_fname" value="<?php echo $eco_cust_info['customer_fname']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="customer_lname" id="customer_lname" value="<?php echo $eco_cust_info['customer_lname']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="customer_email" id="customer_email" value="<?php echo $eco_cust_info['customer_email']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="customer_mobile" id="customer_mobile" value="<?php echo $eco_cust_info['customer_mobile']; ?>" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Date of Birth</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="customer_dob" value="<?php echo $eco_cust_info['customer_dob']; ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="customer_img" id="customer_img">
                    <input type="hidden" name="old_img" value="<?php echo $eco_cust_info['customer_img']; ?>">
                  </div>
                </div>
                <div class="row text-center ">
                  <div class="col-md-8 col-12 offset-md-2 mt-3 m-mt3">
                    <button type="submit" class="btn btn-outline-success mr-3 m-mt3">Save Changes</button>
                    <a href="<?php echo base_url(); ?>Profile" class="btn btn-outline-secondary m-mt3">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <?php include('footer.php'); ?>
