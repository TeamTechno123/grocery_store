<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Select Membership</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content pricing">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Offer </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form class="m-0 input_form" id="form_action" role="form" action="" method="post" enctype="multipart/form-data"> -->
              <?php   $cust_mem_end_date = date('d-m-Y', strtotime("+".$membership_details['mem_sch_valid']." days")); ?>
                <div class="card-body text-center">
                  <h5 class="card-title text-center w-100 mb-3"> <span class="bg-danger kb-color memname" id="memname"><?php echo $membership_details['mem_sch_name']; ?></span> </h5>
                  <p class="card-text"><strong> <span id="mem_sch_valid"><?php echo $membership_details['mem_sch_valid']; ?></span> Days</strong> Free Membership </p>
                  <!-- <p class="card-text d-none">From <strong id="mem_from"><?php echo date('d-m-Y'); ?></strong> To <strong id="mem_to"><?php echo $cust_mem_end_date; ?></strong></p> -->
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th>
                          <th class="wt_50">Status</th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php foreach ($membership_details_list as $details_list) { ?>
                          <tr>
                            <td><?php echo $details_list->mem_sch_det_feature; ?></td>
                            <td class="wt_50"><?php
                              if($details_list->mem_sch_det_status == 0){
                                echo "<span class='fa fa-times text-danger'></span>";
                              } elseif ($details_list->mem_sch_det_status == 1) {
                                echo "<span class='fa fa-check text-success'></span>";
                              } elseif ($details_list->mem_sch_det_status == 2) {
                                echo $details_list->mem_sch_det_val;
                              }
                            ?></td>
                          </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <!-- <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="offer_status" id="offer_status" value="1" <?php if(isset($offer_info) && $offer_info['offer_status'] == 1){ echo 'checked'; } elseif (!isset($offer_info)){ echo 'checked'; } ?>>
                      <label for="offer_status" class="custom-control-label">Active</label>
                    </div> -->
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="<?php echo base_url() ?>Master/membership_scheme_list" class="btn btn-default ml-4">Cancel</a>
                    <a href="<?php echo base_url(); ?>Master/customer/<?php echo $membership_details['mem_sch_id'] ?>" id="btn_add_cust" type="button" class="btn btn-success" >Add Customer</a>
                  </div>
                </div>
              <!-- </form> -->
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="membership_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Membership Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-autoscroll pricing">
          <div class="card" >
              <div class="card-body text-center">
                <h5 class="card-title text-center w-100 mb-3"> <span class="bg-danger kb-color memname" id="memname"></span> </h5>
                <p class="card-text"><strong> <span id="mem_sch_valid"></span> Days</strong> Free Membership </p>
                <p class="card-text d-none">From <strong id="mem_from"></strong> To <strong id="mem_to"></strong></p>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Feature</th>
                        <th class="wt_50">Status</th>
                      </tr>
                    </thead>
                    <tbody id="mem_det_body">
                      <!-- <tr>
                        <td>Sumit patil</td>
                        <td class="wt_50">50</td>
                      </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url(); ?>Master/customer/" id="btn_add_cust" type="button" class="btn btn-success" >Add Customer</a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
