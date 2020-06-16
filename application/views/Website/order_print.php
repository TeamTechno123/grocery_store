<!DOCTYPE html>
<html>
<style>
  td{ padding:2px 10px !important; }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <section class="invoice">
    <!-- title row -->

    <div class="row">
  <p style="text-align:center; width: 100%;margin-bottom: 10px; font-size:17px;"> <b>Order Print</b>  </p>
</div>
    <table class="table table-bordered mb-0 invoice-table"  width="100%">
<style media="print">
table{
  border-collapse: collapse;
}
.invoice-table td, th{
    border: 1px solid #555!important;
}
.invoice-table{
  margin-bottom:0px;
  border: 1px solid #555!important;
}
.invoice-table p{
  line-height: 15px;
}
.mx-auto{
  margin-left: auto;
  margin-right: auto;
}
</style>

<style media="screen">
table{
  border-collapse: collapse;
}
.invoice-table td, th{
  /* Width:33% !important; */
    border: 1px solid #555!important;
}
.invoice-table{
  margin-bottom:0px;
  border: 1px solid #555!important;
}
.invoice-table p{
  line-height: 15px;
}
.mx-auto{
  margin-left: auto;
  margin-right: auto;
}
</style>

<tr>
    <td colspan="6" width="80%" style="border-right:0px!important; border-left:0px!important;">
    <div style="float:left;">
      <img class="" src="" width="150" height="100" alt="">
    </div>
    <div style="">
      <h3 style="font-size:18px; text-align:center; margin:5px; " >Kirana Bhara Club </h3>
      <p   style="font-size:14px; margin-bottom:3px; margin-top:3px; text-align:center; ">
      Plot No. 10, Wale House, Pratibha Nagar, Kolhapur Maharashtra - 416008
      </p>
      <p  style="font-size:14px; margin-bottom:3px; margin-top:3px; text-align:center; " >Mob No. 7558454784</p>

      <p  style="font-size:14px; margin-bottom:3px; margin-top:3px; text-align:center; ">Email: info@kiranabhara.com  <span style="margin-left:20px;">Website: kiranabhara.com</span> </p>
    </div>
    <!-- <p  style="font-size:14px; margin-bottom:3px; margin-top:3px; text-align:center;">Website: www.universaldigital.net</p>  -->
   </td>
</tr>
<tr>
  <?php
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    if(isset($eco_cust_id)){
      $eco_cust_info = $this->User_Model->get_info_arr('customer_id',$eco_cust_id,'customer');
      $eco_cust_info = $eco_cust_info[0];
    }
  ?>
    <td colspan="4" style="border-right:0px!important; padding-left: 20px; padding-top:5px;" >
       <p style="font-size:16px; margin-bottom:5px; margin-top:5px;"><strong>Customer Name and Address</strong></p>
      <p style="font-size:16px; margin-bottom:5px; margin-top:5px;"><?php echo $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname']; ?></p>
      <p style="font-size:16px; margin-bottom:5px; margin-top:5px;"><?php echo $eco_cust_info['customer_address'].', '.$eco_cust_info['customer_city'].', '.$eco_cust_info['customer_pin']; ?></p>
      <p style="font-size:16px; margin-bottom:5px; margin-top:5px;"> Contact No. <?php echo $eco_cust_info['customer_mobile']; ?></p>
    </td>

      <td colspan="2" style="padding:0px!important;">
      <p style="font-size:14px; margin-bottom:3px; margin-top:3px; padding-left:10px;"><b>Bill No.  <?php echo $order_info['order_no']; ?></b></p>  <hr style="border-bottom:1px solid #000; padding:0px; margin:0px;">
      <p style="font-size:14px; margin-bottom:3px; margin-top:3px;  padding-left:10px;"> <b>Date : </b>&nbsp;  <strong><?php echo $order_info['order_date']; ?></strong></p> <hr style="border-bottom:1px solid #000; padding:0px; margin:0px;">
      </td>
</tr>
<tr>
  <th width="8%"> <p style="text-align:center;">#</p> </th>
  <th colspan="2" Width="35%" > <p style="text-align:center;">Item</p> </th>
  <th  width="12%" > <p style="text-align:center;">Qty</p> </th>
  <th width="14%"> <p style="text-align:center;">Rate</p> </th>
  <th width="10%"> <p style="text-align:center;">Amount</p></th>
</tr>
<?php
$i=0;
foreach ($order_pro_list as $order_pro_list1) {
  $i++;
?>
  <tr>
    <td style="text-align:center;"> <p style="font-size:12px;"></p><?php echo $i; ?></td>
    <td colspan="2"  style="text-align:center;"> <p style="font-size:12px;"><?php echo $order_pro_list1->order_pro_name.' - '.$order_pro_list1->order_pro_weight.' '.$order_pro_list1->order_pro_unit; ?></p></td>
    <td style="text-align:center;"> <p style="font-size:12px;"><?php echo $order_pro_list1->order_pro_qty; ?></p></td>
    <td style="text-align:center;"> <p style="font-size:12px;"><?php echo $order_pro_list1->order_pro_price; ?></p></td>
    <td style="text-align:center;"> <p style="font-size:12px;"><?php echo $order_pro_list1->order_pro_amt; ?></p></td>
  </tr>
<?php } ?>

<tr>
  <td colspan="4" rowspan="6">
   </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px; font-size:14px;">Net Total : </p> </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px;"> <b>&#8377; </b><?php echo $order_info['order_amount']; ?></p></td>
</tr>
<tr>
  <td colspan="1"><p style="padding-left:10px; margin:5px; font-size:14px;">CGST : </p> </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px;"> <b>&#8377; </b><?php echo $order_info['order_gst']/2; ?></p></td>
</tr>
<tr>
  <td colspan="1"><p style="padding-left:10px; margin:5px; font-size:14px;">SGST : </p> </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px;"> <b>&#8377; </b><?php echo $order_info['order_gst']/2; ?></p></td>
</tr>
<tr>
  <td colspan="1"><p style="padding-left:10px; margin:5px; font-size:14px;">IGST: </p> </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px;"> <b>&#8377; </b><?php echo $order_info['order_gst']; ?></p></td>
</tr>
<tr>
  <td colspan="1"><p style="padding-left:10px; margin:5px; font-size:14px;">Shipping : </p> </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px;"> <b>&#8377; </b><?php echo $order_info['order_shipping_amt']; ?></p></td>
</tr>
<tr>
  <td colspan="1"><p style="padding-left:10px; margin:5px; font-size:14px;">Grand Total: </p> </td>
  <td colspan="1"><p style="padding-left:10px; margin:5px;"> <b>&#8377; </b><?php echo $order_info['order_total_amount']; ?></p></td>
</tr>

<tr style="border-bottom:0px!important;">
  <td colspan="6" style="border-bottom:0px!important;"> <p style="float:right; margin:5px;"> <b> For Kiranabhara.com </b> </p>
  </td>
</tr>

<tr style="border-top:0px!important;">
  <td colspan="2" style=" padding-left:10px; border-right:0px!important; border-top:0px!important; padding-bottom: 5px; text-align:center;"> Receiver's Signature </td>
  <td colspan="2" style=" padding-left:10px; border-left:0px!important; border-right:0px!important; padding-bottom: 5px; border-top:0px!important; text-align:center;"> Delivery Person Signature </td>
  <td colspan="2" style=" padding-left:10px; border-left:0px!important; border-top:0px!important; padding-bottom: 5px; text-align:center;"> Auth. Signatory </td>
</tr>
</table>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript">
  window.print();
</script>

</body>
</html>
