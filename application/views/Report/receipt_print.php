<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Receipt</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('files/dist/css/AdminLTE.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 <style type="text/css" media="print">
    @page
    {
        size:  auto;   /* auto is the initial value */
        margin: 7mm;  /* this affects the margin in the printer settings */
    }
    </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
</div>
<body id="pdf">
<div class="wrapper">
  <!-- Main content -->
  <div class="row">
    <p style="text-align:center; font-size:17px;"> <b>RECEIPT</b>  </p>
  </div>
  <table id="example" class="table table-bordered mb-0 invoice-table" width="100%">
    <style media="print">
    table{
      border-collapse: collapse;
    }
      .invoice-table td{
          Width:33% !important;
          border: 2px solid #555!important;
          padding-left: 10px;
      }
      .invoice-table .small{
        Width:15% !important;
          border: 2px solid #555!important;
      }
      .invoice-table .large{
        Width:85% !important;
          border: 2px solid #555!important;
      }
      .invoice-table{
        margin-bottom:0px;
        border: 2px solid #555!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .invoice-table .no-right-border{
      border-right: 0px!important;
      }
      .invoice-table .no-left-border{
      border-left: 0px!important;
      }
      .invoice-table .no-top-border{
      border-top: 0px!important;
      }
      .invoice-table .no-bottom-border{
      border-bottom: 0px!important;
      }


    </style>
    <style media="screen">
    table{
      border-collapse: collapse;
    }
      .invoice-table td{
        Width:33% !important;
          border: 2px solid #555!important;
          padding-left: 10px;
      }
      .invoice-table .small{
        Width:15% !important;
          border: 2px solid #555!important;
      }
      .invoice-table .large{
        Width:85% !important;
          border: 2px solid #555!important;
      }
      .invoice-table{
        margin-bottom:0px;
        border: 2px solid #555!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .invoice-table .no-right-border{
      border-right: 0px!important;
      }
      .invoice-table .no-left-border{
      border-left: 0px!important;
      }
      .invoice-table .no-top-border{
      border-top: 0px!important;
      }
      .invoice-table .no-bottom-border{
      border-bottom: 0px!important;
      }
    </style>
    <tr>
      <td   colspan="4" >
        <!-- <div class="" style="float:left;">
          <img class="" src="<?php echo base_url('files/images/logo/').$GetCmpInfo['logo']; ?>" width='150' alt="">

        </div> -->
          <div class="" style="text-align:center;">
                          <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:26px; margin-top: 0px; margin-bottom: 5px;font-weight:bold; text-transform:uppercase;" > Kirana Bhara Club</h3>
                          <p style="margin-bottom:5px; margin-top: 5px; line-height:20px;  font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;" > <b> Plot No. 10, Wale House, Pratibha Nagar, Kolhapur Maharashtra - 416008</b> </p>
                          <p  style="margin-bottom:5px; margin-top: 5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile No: 7558454784 &nbsp; | &nbsp; Email : info@kiranabhara.com </p>
                          <p  style="margin-bottom:5px; margin-top: 5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> Website : kiranabhara.com</p>
                </div>
      </td>
    </tr>

    <tr>
      <td colspan="2"  >  <p style="margin-top:5px; margin-bottom:5px;"> <b>Receipt No.</b>  : 123456</p>
        </td>
        <td colspan="2"  >  <p style="margin-top:5px; margin-bottom:5px;"> <b>Date</b>  : 12/03/2020</p>
          </td>
    </tr>
    <tr>
      <td colspan="1" class=" no-right-border">  <p style="margin-top:5px; margin-bottom:5px;"> <b> Party Details :</b> </p>
        </td>
      <td colspan="3" class=" no-left-border">
       <p style="margin-top:5px; margin-bottom:5px;" > <b>Satish Patil</b> </p> <p style="margin-top:5px; margin-bottom:5px;"> <b> Rajarampuri Kolhapur </b></p>
        </td>
    </tr>
    <tr>
      <td colspan="2"  >  <p style="margin-top:5px; margin-bottom:5px;"> <b>Amount in Words</b>  : <span style="font-size:15px!important; font-weight:bold; line-height:18px;">Two Thousand Five Hundred only</span>  </p>
        </td>
        <td colspan="2"  >  <p style="margin-top:5px; margin-bottom:5px;"> <b>Amount</b>  : <b>  &#8377; 2500 </b></p>
          </td>
    </tr>


    <tr>
      <td colspan="1" class=" no-right-border"> <p style="margin-top:5px; margin-bottom:5px;"> <b>Payment Against : </b> </p>
        </td>
        <td colspan="3" class=" no-left-border">
          </td>
    </tr>

    <tr style="border-bottom:0px!important;">
      <td colspan="4" style="border-bottom:0px!important;"> <p style="float:right; margin:5px; padding-bottom:15px; padding-right:15px;"> <b> For Kiranabhara.com </b> </p>
      </td>
    </tr>

    <tr style="border-top:0px!important; ">
      <td colspan="2" style=" padding-left:10px; border-right:0px!important; border-top:0px!important; padding-bottom: 5px; text-align:center;"> Receiver's Signature </td>
      <td colspan="2" style=" padding-left:10px; border-left:0px!important; border-top:0px!important; padding-bottom: 5px; text-align:center;"> Auth. Signatory </td>
    </tr>
  </table>



  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.10/jspdf.plugin.autotable.min.js"></script>

<script src="<?php echo base_url('files/dist/tableHTMLExport.js'); ?>"></script>

<!-- <script type="text/javascript">
  <?php if(isset($pdf)) { ?>


  var doc = new jsPDF();

  $('#cmd').click(function () {
      doc.fromHTML($('#content').html(), 15, 15, {
          'width': 170,
              'elementHandlers': specialElementHandlers
      });
      doc.save('sample-file.pdf');
  });


  <?php } else { ?>
   window.print();
 <?php } ?>

</script> -->
</body>
</html>
