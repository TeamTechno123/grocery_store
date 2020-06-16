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
          <?php foreach ($membership_scheme_list as $mem_sch_list) { ?>
            <div class="col-md-4 mb-5">
              <div class="card" >
                  <div class="card-body text-center">
                    <h5 class="card-title text-center w-100 mb-3"> <span class="bg-danger kb-color memname"><?php echo $mem_sch_list->mem_sch_name; ?></span> </h5>
                    <p class="card-text"><strong><?php echo $mem_sch_list->mem_sch_valid; ?> Days</strong> Free Membership </p>
                    <?php
                      $today = date('d-m-Y');
                      $mem_sch_valid = $mem_sch_list->mem_sch_valid;
                      $cust_mem_end_date = date('d-m-Y', strtotime("+".$mem_sch_valid." days"));
                    ?>
                    <p class="card-text">From <strong><?php echo $today; ?></strong> To <strong><?php echo $cust_mem_end_date; ?></strong></p>
                    <!-- <p class="card-text"><?php echo $mem_sch_list->mem_sch_point; ?> points </p> -->
                    <a href="#" class="btn btn-primary Merriweather btn-success select_shceme" data-toggle="modal" data-target="#membership_details">Join only in <span class="f-18 ml-1" >&#8377;</span> <?php echo $mem_sch_list->mem_sch_amt; ?>  </a>
                    <input class="txt_scheme_info" type="hidden" mem_sch_id="<?php echo $mem_sch_list->mem_sch_id; ?>" mem_sch_name="<?php echo $mem_sch_list->mem_sch_name; ?>" mem_sch_valid="<?php echo $mem_sch_list->mem_sch_valid; ?>" mem_start_date="<?php echo $today; ?>" mem_end_date="<?php echo $cust_mem_end_date; ?>" >
                  </div>
                </div>
            </div>
          <?php } ?>
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

<script type="text/javascript">
  $('.select_shceme').on('click', function(){
    var selector1 = $(this).closest('.card').find('.txt_scheme_info');
    var mem_sch_id = selector1.attr('mem_sch_id');
    var mem_sch_name = selector1.attr('mem_sch_name');
    var mem_sch_valid = selector1.attr('mem_sch_valid');
    var mem_start_date = selector1.attr('mem_start_date');;
    var mem_end_date = selector1.attr('mem_end_date');

    $('#btn_add_cust').attr('href','<?php echo base_url(); ?>Master/customer/'+mem_sch_id);
    $('#memname').text(mem_sch_name);
    $('#mem_sch_valid').text(mem_sch_valid);
    $('#mem_from').text(mem_start_date);
    $('#mem_to').text(mem_end_date);

    $.ajax({
      url:'<?php echo base_url(); ?>Master/get_membership_details',
      type: 'POST',
      data: {"mem_sch_id":mem_sch_id,},
      context: this,
      success: function(result){
        $('#mem_det_body').html(result);
        // if(result > 0){
        //   $('#customer_email').val(customer_email1);
        //   toastr.error(customer_email+' Email Id Exist.');
        // }
      }
    });



    // alert(mem_sch_id);
  });
</script>
