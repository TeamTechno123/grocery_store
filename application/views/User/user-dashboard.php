<!DOCTYPE html>
<html>
<?php
  $eco_user_id = $this->session->userdata('eco_user_id');
  $eco_company_id = $this->session->userdata('eco_company_id');
  $eco_role_id = $this->session->userdata('eco_role_id');
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Company Information</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <hr>

      <?php if($eco_role_id == '5' || $eco_role_id == '3'){ ?>
        <div class="row">
          <div class="col-md-2 col-6">
            <a href="<?php echo base_url('Master/select_cust_membership'); ?>">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h5 class="text-center">Add</br>Customer</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="<?php echo base_url('Master/customer_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </a>
          </div>
          <div class="col-md-2 col-6">
            <a href="<?php echo base_url('Order/order'); ?>">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h5 class="text-center">Add</br>Order</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </a>
          </div>
          <?php if($eco_role_id == '3'){ ?>
            <div class="col-md-2 col-6">
              <a href="<?php echo base_url('Transaction/purchase'); ?>">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h5 class="text-center">Add</br>Purchase</h5>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
              </a>
            </div>
            <div class="col-md-2 col-6">
              <a href="<?php echo base_url('Transaction/employee_cash'); ?>">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h5 class="text-center">Add</br>Employee Cash</h5>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
              </a>
            </div>
            <div class="col-md-2 col-6">
              <a href="<?php echo base_url('Transaction/stock'); ?>">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h5 class="text-center">Stock</br>List</h5>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
        <h4 class="mb-3">User Summary</h4>
        <div class="row">
          <div class="col-md-2 col-6">
            <a href="<?php echo base_url('Master/customer_list'); ?>">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $customer_cnt; ?></h3>
                  <p>Customer</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="<?php echo base_url('Master/customer_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </a>
          </div>
          <div class="col-md-2 col-6">
            <a href="<?php echo base_url('Order/order_list'); ?>">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $order_cnt; ?></h3>
                  <p>Order</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </a>
          </div>
          <?php if($eco_role_id == '3'){ ?>
            <div class="col-md-2 col-6">
              <a href="<?php echo base_url('Transaction/purchase_list'); ?>">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?php echo $purchase_cnt; ?></h3>
                    <p>Purchase</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
        <hr>
      <?php } elseif ($eco_role_id == '7') { ?>
        <div class="row">
          <div class="col-md-2 col-6">
            <a href="<?php echo base_url('Order/delivery_boy_order_list'); ?>">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $delivery_boy_order_cnt; ?></h3>
                  <p>Order</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="<?php echo base_url('Order/order_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </a>
          </div>
        </div>
      <?php } ?>
      </div><!-- /.container-fluid -->
    </section>
  </div>
</body>
</html>
<?php if($eco_role_id == '5'){ ?>
<script type="text/javascript">
  $(document).ready(function(){
    // alert('asdf');
    // var x = document.getElementById("demo");
    // function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert('location error');
        // x.innerHTML = "Geolocation is not supported by this browser.";
      }
    // }
    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      var user_id = <?php echo $eco_user_id; ?>;
      $.ajax({
        method:"post",
        data:{"user_id":user_id,
              "latitude":latitude,
              "longitude":longitude,},
        url:'update_location',
        success:function(result){
          // alert(result);
          // toastr.info('Payment Status Changed');
          // var base_url = "<?php echo base_url(); ?>";
          // window.location.href = base_url+"Order/delivery_boy_order_list";
        }
      });

      // x.innerHTML = "Latitude: " + position.coords.latitude +
      // "<br>Longitude: " + position.coords.longitude;
    }
  });
</script>
<?php } ?>
