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
            <h4>Vendor Report</h4>
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
              <form role="form" method="post" action="" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-3">
                    <input type="text" class="form-control form-control-sm" name="from_date" id="date1" data-target="#date1" data-toggle="datetimepicker" title="From Date" placeholder="From Date" required>
                    <label class="text-red"> <?php echo form_error('from_date'); ?> </label>
                  </div>
                  <div class="form-group col-md-3 ">
                    <input type="text" class="form-control form-control-sm" name="to_date" id="date2" data-target="#date2" data-toggle="datetimepicker" title="To Date"  placeholder="To Date" required>
                    <label class="text-red"> <?php echo form_error('to_date'); ?> </label>
                  </div>

                  <div class="form-group col-md-4 select_sm">
                    <select class="form-control select2 form-control-sm" data-placeholder="Select Vendor" title="Select Vendor" name="vendor_id" id="vendor_id">
                      <option selected="selected"  value="">Select Vendor</option>
                      <?php if(isset($vendor_list)){ foreach ($vendor_list as $list2) { ?>
                      <option value="<?php echo $list2->vendor_id; ?>" ><?php echo '[#'.$list2->vendor_id.'] '.$list2->vendor_name; ?></option>
                      <?php } } ?>
                    </select>
                  </div>

                  <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-success btn-sm">View</button>
                  </div>
                </form>
                <br><br><br>

                <?php if(isset($report)){ ?>
                  <section style="width:100%;" class="invoice" id="print_invoice">
                    <div class="row">
                      <div class="col-12 table-responsive" id="result_tbl">
                        <p style="text-align: center;">Vendor Report</p>
                        <p style="text-align: center;">From <?php echo $from_date; ?> To <?php echo $to_date; ?></p>
                        <?php if($vendor_id){
                          $vendor_info = $this->User_Model->get_info_arr_fields('vendor_name','vendor_id', $vendor_id, 'vendor');
                        ?>
                          <p>Vendor Name : <?php echo $vendor_info[0]['vendor_name']; ?></p>
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
                          <th> <p style="text-align:center">Bill No.</p> </th>
                          <th> <p style="text-align:center">Date</p> </th>
                          <th> <p style="text-align:center">Basic Amount</p></th>
                          <th> <p style="text-align:center">GST Amount</p></th>
                          <th> <p style="text-align:center">Net Amount</p></th>
                        </thead>
                        <tbody>
                          <?php foreach ($vendor_report_list as $vendor_report_list1) { ?>
                            <tr>
                              <td><?php echo $vendor_report_list1->purchase_no; ?></td>
                              <td><?php echo $vendor_report_list1->purchase_date; ?></td>
                              <td><?php echo $vendor_report_list1->purchase_amount; ?></td>
                              <td><?php echo $vendor_report_list1->purchase_gst; ?></td>
                              <td><?php echo $vendor_report_list1->purchase_total_amount; ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <!-- this row will not appear when printing -->
                    </div>
              <!-- /.card-body -->
                  </div>
                </section>

                <div class="row no-print">
                  <div class="col-12">
                    <br><br>
                    <!-- <a href="<?php echo base_url() ?>Report/stock_report_print" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                    <a onclick='printDiv();' class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <input type="button" name="export" id="export_excel" onclick="Export()" class="btn btn-primary" value="Export to Excel">
                  </div>
                </div>
                <?php  } ?>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script src="<?php echo base_url(); ?>assets/js/table2excel.js"></script>
  <script type="text/javascript">
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
        filename: "Vendor_Report_<?php echo date('dmy_His'); ?>.xls"
      });
    }
  </script>
</body>
</html>
