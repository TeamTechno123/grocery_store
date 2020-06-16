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

  <title>Grocery Mart </title>
</head>
<style media="screen">
  .top-nav{
    background-color: #49a9e0;
    padding-top: 15px;
    padding-bottom: 10px;
    color: #fff;
  }

  .bg-lightblue{
    background-color: #49a9e0!important;
    color: #fff!important;
  }
  .nav-link{
    color: #fff!important;
    padding-top: 0px!important;
    padding-bottom: 0px!important;
    font-size: 14px;
  }

  .carousel{
    padding-top: 20px;
    padding-bottom: 20px;
  }


.offers{
  padding-top: 30px;
  padding-bottom: 30px;
}

.offers h5{
  font-weight: bold;
  padding-top: 10px;
  padding-bottom: 20px;
}

  .offers .offer-div{
    background-color: #efd6da;
    text-align: center;
    width: 100%;
    height: 250px;
    margin-bottom: 30px;
  }

    .offers .offer-div .batch{
      width: 100%;
      margin-top: -15px;
    }

  .offers .offer_badge{
    font-size: 16px;
    position: absolute;
    top: -5px;
    left: 30%;
    color: #fff;
    z-index: 1;
  }

  .offers .offer-div .img img{
    margin-top: 15px;
    width: 150px;
    height: 150px;
    margin-left: auto;
    margin-right: auto;
  }

  .two-img{
    padding-top: 30px;
    padding-bottom: 30px;
  }

.two-img img{
    width: 100%;
    height: 350px;
    margin-bottom: 30px;
}

.footer{
  background-color: #ecedef;
}

.notes{
  background-attachment: local;
    background-image:
        linear-gradient(to right, white 10px, transparent 10px),
        linear-gradient(to left, white 10px, transparent 10px),
        repeating-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
    line-height: 31px;
    padding: 8px 10px;
}

.dropdown-menu1{
  width: 250px!important;
}

#bottom{
  border-top: 1px solid #b8b8b8;
}

#bottom p{
  padding-top: 10px;
}

@media only screen and (max-width: 450px){

  .sticky-top {
        position: relative !important;
    }

    .m-center{
      text-align: center!important;
      margin-left: auto;
      margin-right: auto;
    }
    .mml-0{
      margin-left: 0px!important;
    }

    .carousel-item img{
      width: 100%;
      height: 150px;
    }

    .offers .offer_badge{
      font-size: 12px;
      position: absolute;
      top: -5px;
      left: 28%;
      color: #fff;
      z-index: 1;
    }

    .two-img img{
        width: 100%;
        height: auto;
        margin-bottom: 30px;
    }

    .navbar-collapse{
      background-color: #49a9e0!important;
    }
    .nav-link{
      color: #fff!important;
      padding-top: 8px!important;
      padding-bottom: 8px!important;
      font-size: 16px;
    }
}

</style>

<body>
  <section class="top-nav sticky-top ">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-6">
          <img class="m-center"  src="<?php echo base_url(); ?>assets/images/new/jiomart_logo_beta.svg" alt="">
        </div>

        <div class="col-6 d-block d-sm-none">
            <span class=""> <a class="text-white" href="#">  <i class="far fa-user ml-3 mr-2"></i> Login / Sign Up </a></span>
        </div>

        <div class="col-md-4 col-12">
          <div class="input-group mb-3  ml-5 mml-0">
              <input type="text" class="form-control" placeholder="Product / Category " aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-light" type="button"><i class="fas text-danger fa-search"></i></button>
              </div>
            </div>
        </div>
        <div class="col-md-2 ml-5 mml-0 col-12 m-center">
           <div class="dropdown">
             <button type="button" class="btn btn-link  text-white text-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search with List</button>
              <div class="dropdown-menu dropdown-menu1" aria-labelledby="dropdownMenuButton">
                <div class="row">
                    <div class="col-10">
                        <p class="f-14">Shop faster - type or paste your shopping list below</p>
                    </div>
                    <div class="col-2">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="col-12 mb-3">
                      <textarea class="form-control notes" rows="3" placeholder="Milk, Bread,Fruits  "></textarea>
                    </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-secondary">Clear</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-success">Search Now</button>
                  </div>
                  </div>
              </div>
            </div>
        </div>

        <div class="col-md-2 d-none d-sm-block">
            <span class=""> <a class="text-white" href="#">  <i class="far fa-user ml-3 mr-2"></i> Login / Sign Up </a></span>
        </div>
        <div class="col-md-1 d-none d-sm-block">
          <i class="fa  fa-shopping-cart "><span class="badge ">0</span></i>
        </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-lightblue w-100">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fruits & Vegetables
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dairy & Bakery
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Staples
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vegitables
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bekary Product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Oils & Ghee
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
  </section>
