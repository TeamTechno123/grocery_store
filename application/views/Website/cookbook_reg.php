<?php include('header.php'); ?>

<section class="default-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-heading">Register for Cookbook Contest</h1>
      </div>
    </div>
  </div>
</section>

<section class="cookbook-page2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card py-3 px-2">
          <h5 class="text-center mf-16">Cookbook Contest Registration Form</h5>
          <form class="" action="" method="post" autocomplete="off">
            <div class="row">
              <div class="form-group col-md-6 offset-md-3">
                <label>Full Name*</label>
                <input type="text" class="form-control form-control-sm" name="cookbook_reg_name" id="cookbook_reg_name" required>
              </div>
              <div class="form-group col-md-6 offset-md-3">
                <label>Address*</label>
                <input type="text" class="form-control form-control-sm" name="cookbook_reg_addr" id="cookbook_reg_addr" required>
              </div>
              <div class="form-group col-md-6 offset-md-3">
                <label>Mobile No.*</label>
                <input type="number" class="form-control form-control-sm" name="cookbook_reg_mobile" id="cookbook_reg_mobile" required>
              </div>
              <div class="form-group col-md-6 offset-md-3">
                <label>Email</label>
                <input type="email" class="form-control form-control-sm" name="cookbook_reg_email" id="cookbook_reg_email">
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
<script type="text/javascript">
// Check Mobile Duplication..
  var cookbook_reg_mobile1 = $('#cookbook_reg_mobile').val();
  $('#cookbook_reg_mobile').on('change',function(){
    var cookbook_reg_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"cookbook_reg_mobile",
             "column_val":cookbook_reg_mobile,
             "table_name":"cookbook_reg"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#cookbook_reg_mobile').val(cookbook_reg_mobile1);
          toastr.error('Already Registered.');
        }
      }
    });
  });

// Check Email Duplication..
  var cookbook_reg_email1 = $('#cookbook_reg_email').val();
  $('#cookbook_reg_email').on('change',function(){
    var cookbook_reg_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"cookbook_reg_email",
             "column_val":cookbook_reg_email,
             "table_name":"cookbook_reg"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#cookbook_reg_email').val(cookbook_reg_email1);
          toastr.error('Already Registered.');
        }
      }
    });
  });
</script>
