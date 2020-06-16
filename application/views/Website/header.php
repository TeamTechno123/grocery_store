<!doctype html>
<?php
  $eco_cust_id = $this->session->userdata('eco_cust_id');
  $tahsil_list = $this->User_Model->get_list_by_id2('tahsil_id,tahsil_name','tahsil_status',1,'tahsil');
  if(isset($eco_cust_id)){
    $eco_cust_info = $this->User_Model->get_info_arr('customer_id',$eco_cust_id,'customer');
    $eco_cust_info = $eco_cust_info[0];
  }
  /*****************************header Dropdown ***************************************/
  $main_category_list2 = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- JQuery.js -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Merriweather|Noto+Serif&display=swap" rel="stylesheet">

  <title>Needs On Doors</title>
</head>

<body>

  <section class="top-header d-none d-sm-block">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
        <p class="mb-0 f-16 ml-3"><i class="fas fa-map-marker-alt mr-2"></i> New Delhi  <i class="fas fa-edit ml-2"></i></p>
        </div>
        <div class="col-md-6 text-center">
          <p class="mb-0 f-16 ml-3">  <i class="far fa-user mr-2"></i> Customer Service <span class="bl-1"> <a href="<?php echo base_url(); ?>Offers"> <i class="fas fa-map-marker-alt ml-3 mr-2"></i> Offers Zone </a></span> <span class="bl-1"> <a href="<?php echo base_url(); ?>Login">  <i class="far fa-user ml-3 mr-2"></i> Login / Sign Up </a></span> </p>
        </div>
      </div>
    </div>
</section>

<section class="nav-header d-none d-sm-block">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 text-center">
      <a href="<?php echo base_url(); ?>">  <img class="header-logo" src="<?php echo base_url(); ?>assets/images/new/newlogo.png" alt="" width="100%"> </a>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-10">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Product / Category " aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                </div>
              </div>
          </div>
          <div class="col-2">
            <div class=" head-shopping-cart ml-2 mt-2">
              <a href="#" data-toggle="modal" data-target="#myCart"><i class="fa m-f10 text-green fa-shopping-cart "><span class="badge badge-notify my-cart-badge">0</span></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="dropdown">
                  <button class="btn btn-warning dropdown-toggle w-100 text-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Shop By Category
                  </button>
                  <div class="dropdown-menu p-4" aria-labelledby="dropdownMenuButton">
                  <div class="row">
                    <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                    <div class="col-md-4">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>

                    <div class="col-md-4">
                      <img class="header-logo" src="<?php echo base_url(); ?>assets/images/new/newlogo.png" width="100%" alt="">
                    </div>
                  </div>
                  </div>
                </div>
            <!-- <button type="button" class="btn btn-warning w-100 text-left">Shop By Category</button> -->
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-success w-100">Refer Your Friend</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!--***********************     Mobile Responsive   head  ************************-->

<section class="mobile-head d-block d-sm-none">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-nav">
      <div class="row w-100">
        <div class="col-3">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
              <i class="fas text-white fa-bars bar3 pt-2"></i>
            </span>
          </button>
        </div>
        <div class="col-6">
          <a class="navbar-brand text-white text-center" href="<?php echo base_url(); ?>"> <span class="text-bold ">Needs</span> On Doors</a>
        </div>
        <div class="col-3 text-right">
            <?php if(isset($eco_cust_id)){ ?>
            <i class="far fa-user text-white pt-2 pr-3"></i>
            <p class="f-12 mb-0 text-white" ><?php echo $eco_cust_info['customer_fname'];?></p>
          <?php } else{ ?>
            <i class="far fa-user text-white pt-2 pr-3"></i>
            <a href="<?php echo base_url(); ?>Login"><p class="f-12 mb-0 text-white mr-1" >Login</p></a>
          <?php }  ?>
        </div>

        <div class="col-11">
          <form class="" action="index.html" method="post">
            <div class="input-group input-group-sm mb-3 mt-3 ml-3">
              <input type="text" class="form-control" id="inputGroup-sizing-sm" placeholder="Search By Category / Brand / Product" aria-label="Search By Category / Brand / Product" aria-describedby="basic-addon2" required>
              <div class="input-group-append">
                <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>


        <div class="collapse navbar-collapse " id="navbarNav">
          <?php if(isset($eco_cust_id)){ ?>
          <ul class="navbar-nav  navbar-mobile mr-auto">
            <li class="nav-item bg-mgery active">
              <a class="nav-link text-white" href="<?php echo base_url(); ?>Profile"><?php echo $eco_cust_info['customer_fname'].' '.$eco_cust_info['customer_lname']; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> <p>Address : <?php echo $eco_cust_info['customer_city']?> </p> </a>
            </li>

            <hr class="hr-web">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Profile">My Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>My-Orders">My Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>My-Wallet">My Wallet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>My-Membership">My Membership</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>My-Gift-Card">My Gift Card</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Website/logout">Logout</a>
            </li>
          </ul>
        <?php } else{ ?>
          <ul class="navbar-nav  navbar-mobile mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Login">Login</a>
            </li>
          </ul>
        <?php } ?>
        </div>
      </nav>
  </div>
</section>


<!-- Modal -->
  <div class="modal fade" id="myCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-shopping-cart"></i> My Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body m-autoscroll">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php //$row_count = count($this->cart->contents());
          //if($row_count > 0){ ?>
            <a href="<?php echo base_url(); ?>Cart" type="button" class="btn btn-primary">Checkout</a>
          <?php //} ?>
        </div>
      </div>
    </div>
  </div>
