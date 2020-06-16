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
          <div class="col-sm-12 mt-1 text-center">
            <h4>Customer Report</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >
              <form role="form" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" name="from_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="From Date" placeholder="From Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-2 ">
                    <input type="text" class="form-control form-control-sm" name="to_date" id="date2" data-target="#date2" data-toggle="datetimepicker" title="To Date"  placeholder="To Date" required>
                    <label class="text-red"> <?php echo form_error('to_date'); ?> </label>
                  </div>

                  <div class="form-group col-md-3 select_sm">
                    <select class="form-control select2 form-control-sm"  data-placeholder="Select Role" title="Select Role" name="role_id" id="role_id">
                      <option selected="selected" value="" >Select Role</option>
                      <?php if(isset($role_list)){ foreach ($role_list as $list2) { ?>
                      <option value="<?php echo $list2->role_id; ?>" ><?php echo $list2->role_name; ?></option>
                      <?php } } ?>
                   </select>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Employee" title="Select Employee" name="user_id" id="user_id">
                      <option selected="selected" value="">Select Employee</option>
                    </select>
                  </div>

                  <div class="col-md-2 text-center">
                      <button type="submit" class="btn btn-success btn-sm">View</button>
                  </div>
                </form>
                <br><br><br>

                <?php if(isset($report)){
                  //print_r($customer_report_list);
                  ?>
                <section style="width:100%;" class="invoice" id="print_invoice">
                  <div class="row">
                    <div class="col-12 table-responsive" id="result_tbl">
                      <p style="text-align: center;">Customer Report</p>
                      <p style="text-align: center;">From <?php echo $from_date; ?> To <?php echo $to_date; ?></p>
                      <?php if($user_id){
                        $user_info = $this->User_Model->get_info_arr_fields('user_name','user_id', $user_id, 'user');
                      ?>
                        <p>Added By : <?php echo $user_info[0]['user_name']; ?></p>
                      <?php } ?>
                      <table class="table table-botttom" id="exp_tbl" width="100%">
                        <style media="print">
                        #result_tbl table {
                          border-collapse: collapse!important;
                          Width:100%!important;
                        }
                        #result_tbl table, #result_tbl tr, #result_tbl td, #result_tbl th{
                          border: 1px solid #000;
                          margin-left: auto;
                          margin-right: auto;
                          padding: 5px;
                          text-align: center;
                        }
                      </style>
                      <style media="screen">
                        #result_tbl table {
                          border-collapse: collapse!important;
                          Width:100%!important;
                          margin-bottom: 0px!important;
                        }
                        #result_tbl .table thead th{
                            border: 1px solid #000;
                        }
                        #result_tbl table, #result_tbl tr, #result_tbl td, #result_tbl th{
                          border: 1px solid #000;
                          margin-left: auto;
                          margin-right: auto;
                          padding: 5px;
                          text-align: center;
                        }
                      </style>
                      <thead>
                        <th> <p style="text-align:center">Membership Type</p> </th>
                        <th> <p style="text-align:center">Customer Name</p> </th>
                        <th> <p style="text-align:center">MOB no.</p></th>
                        <th> <p style="text-align:center">City</p></th>
                        <th> <p style="text-align:center">Email</p></th>
                        <th> <p style="text-align:center">Start Date</p> </th>
                        <th> <p style="text-align:center">End Date</p> </th>
                        <!-- <th> <p style="text-align:center">Payment Status</p> </th> -->
                        <th> <p style="text-align:center">Commission Point</p> </th>
                      </thead>
                      <tbody>
                        <?php foreach ($customer_report_list as $customer_report_list1) {
                          $customer_id = $customer_report_list1->cust_id;
                          $commission_points = $this->User_Model->get_sum('','point_add_cnt','customer_id',$customer_id,'point_add_type',2,'point_add');
                          if(!$commission_points){ $commission_points = 0; }
                        ?>
                          <tr>
                            <td><?php echo $customer_report_list1->mem_sch_name; ?></td>
                            <td><?php echo $customer_report_list1->customer_fname.' '.$customer_report_list1->customer_lname; ?></td>
                            <td><?php echo $customer_report_list1->customer_mobile; ?></td>
                            <td><?php echo $customer_report_list1->customer_city; ?></td>
                            <td><?php echo $customer_report_list1->customer_email; ?></td>
                            <td><?php echo $customer_report_list1->cust_mem_start_date; ?></td>
                            <td><?php echo $customer_report_list1->cust_mem_end_date; ?></td>
                            <!-- <td><?php echo $customer_report_list1->mem_sch_id; ?></td> -->
                            <td><?php echo $commission_points; ?></td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
              </div>
            </section>
          <?php } ?>
            <div class="row no-print">
              <div class="col-12">
                <br><br>
                <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <input type="button" name="export" id="export_excel" onclick="Export()" class="btn btn-primary" value="Export to Excel">
              </div>
            </div>

          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
  <script type="text/javascript">
    // Employee List by Role...
    $("#role_id").on("change", function(){
      var role_id =  $('#role_id').find("option:selected").val();
      $.ajax({
        url:'<?php echo base_url(); ?>Report/get_user_by_role',
        type: 'POST',
        data: {"role_id":role_id},
        context: this,
        success: function(result){
          $('#user_id').html(result);
        }
      });
    });


    function printDiv()
    {
      var divToPrint=document.getElementById('print_invoice');
      var newWin=window.open('','Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
      newWin.document.close();
      setTimeout(function(){newWin.close();},10);
    }

    function Export() {
      $("#exp_tbl").table2excel({
        filename: "Customer_Repor_<?php echo date('dmy_His'); ?>t.xls"
      });
    }
  </script>
</body>
</html>
