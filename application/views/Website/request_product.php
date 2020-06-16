<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Request A Product</h1>
      </div>
    </div>
  </div>
</section>

<section class="cookbook-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <img class="cookbook-img" src="<?php echo base_url(); ?>assets/images/req_product.jpg" alt="" width="100%">
      </div>
    </div>
  </div>
</section>


<section class="cookbook-page">
  <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
          <form class="" action="" method="post" autocomplete="off">


      <div class="card p-5">
        <div class="input-group mb-3">
            <label class="w-100" >Product Name</label>
            <input type="text" class="form-control" name="req_product_name" placeholder="Product Name" required>
          </div>
    <div class="input-group mb-3">
        <label class="w-100">Name Of Person</label>
        <input type="text" class="form-control" name="req_product_person" placeholder="Name Of Person" required>
      </div>
      <div class="input-group mb-3">
          <label class="w-100">Email</label>
          <input type="email" class="form-control" name="req_product_email" placeholder="Email" >
        </div>
      <div class="input-group mb-3">
          <label class="w-100" >Mobile No.</label>
          <input type="number" class="form-control" name="req_product_mobile" placeholder="Mobile No." required>
        </div>
        <div class="input-group mb-3">
            <label class="w-100" >Message </label>
          <textarea name="req_product_msg" rows="3" class="form-control" cols="80"></textarea>
          </div>
            <button type="submit" class="btn btn-success my-5">Success</button>
      </div>
      </form>
  </div>

    </div>
  </div>
</section>



  <?php include('footer.php'); ?>
