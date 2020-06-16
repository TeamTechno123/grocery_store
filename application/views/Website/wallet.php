<?php include('header.php'); ?>

<section class="profile-container">
  <div class="container">
    <div class="row">
      <div class="col-md-3 d-none d-sm-block">
        <?php include('profile_sidebar.php'); ?>
      </div>
      <div class="col-md-9">
          <div class="card p-3">
            <h2>My Wallet</h2>
            <hr class="hr-web">
            <div class="row">
              <div class="col-md-9">
                <p class="m-mt3">The kiranabhra Wallet is a pre-paid credit account that is associated with your kiranabhra account. This prepaid account allows you to pay a lump sum amount once to kiranabhra and then shop multiple times without having to pay each time.</p>
                </div>
            </div>

            <div class="card p-4 bg-grey">
                <div class="row">

                <div class="col-md-12">
                  <h4>Current Balance</h4>
                  <!-- <p> Wallet Balance in Rs: <?php echo $wallet_bal_amt; ?></p> -->
                  <p> Wallet Balance Points: <?php echo $wallet_bal_point; ?></p>
                  <button data-toggle="modal" data-target="#modal_add_wallet" class="btn menu-btn btn-kb btn-primary" type="button">Add Fund</button>
                  <hr class="">
                  <p class="mt-0 mb-1">Wallet Points:</p>
                  <ol class="Merriweather">
                    <li>Order 999 or above and get 5 Points</li>
                    <li>Referral 5 Points</li>
                    <li>Manual Points (Add Fund to Wallet)</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="card p-4 ">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="py-2">WALLET ACTIVITY</h4>
                </div>
              <div class="col-md-4 ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">From Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Date" id="date1" data-target="#date1" data-toggle="datetimepicker" aria-label="From Date" aria-describedby="basic-addon1">
                  </div>
              </div>
              <div class="col-md-4 ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend ">
                      <span class="input-group-text" id="basic-addon1">To Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Date" id="date2" data-target="#date2" data-toggle="datetimepicker" aria-label="To Date" aria-describedby="basic-addon1">
                  </div>
              </div>
              <div class="col-md-4">
                <button class="btn menu-btn btn-kb btn-primary" id="btn_show_activity" type="submit">Show Activity</button>
              </div>

              <div class="col-md-6 d-none" id="activity_add_tbl">
                <h5>Add Point : </h5>
                <table class="table table-bordered w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Point</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody id="activity_add_tbl_body">

                  </tbody>
                </table>
              </div>

              <div class="col-md-6 d-none" id="activity_use_tbl">
                <h5>Use Point : </h5>
                <table class="table table-bordered w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Point</th>
                      <th>Order Id</th>
                    </tr>
                  </thead>
                  <tbody id="activity_use_tbl_body">

                  </tbody>
                </table>
              </div>

              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal_add_wallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Fund to Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo base_url(); ?>Wallet-Payment" method="post">
        <div class="modal-body m-autoscroll row ">
          <div class="col-md-4 offset-md-2 text-right mt-4 mb-4">
            <label>Enter Amount : </label>
          </div>
          <div class="col-md-4  mt-4 mb-4">
            <input type="number" min="1" class="form-control form-control-sm" id="wallet_fund_amount" name="wallet_fund_amount" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php include('footer.php'); ?>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('save_success')){ ?>
      $(document).ready(function(){
        toastr.success('Wallet Fund Added Successfully');
      });
    <?php } ?>

    $("#btn_show_activity").on("click", function(){
      var from_date =  $('#date1').val();
      var to_date =  $('#date2').val();

      $.ajax({
        url:'<?php echo base_url(); ?>Website/wallet_activity_add_list',
        type: 'POST',
        data: {"from_date":from_date,
               "to_date":to_date,},
        context: this,
        success: function(result){
          // alert(result);
          $('#activity_add_tbl').removeClass('d-none');
          $('#activity_add_tbl_body').html(result);
        }
      });

      $.ajax({
        url:'<?php echo base_url(); ?>Website/wallet_activity_use_list',
        type: 'POST',
        data: {"from_date":from_date,
               "to_date":to_date,},
        context: this,
        success: function(result){
          // alert(result);
          $('#activity_use_tbl').removeClass('d-none');
          $('#activity_use_tbl_body').html(result);
        }
      });
    });

  </script>
