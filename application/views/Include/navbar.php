<?php
  $eco_user_id = $this->session->userdata('eco_user_id');
  $eco_company_id = $this->session->userdata('eco_company_id');
  $eco_role_id = $this->session->userdata('eco_role_id');
  $company_info = $this->User_Model->get_info_arr_fields('company_name','company_id', $eco_company_id, 'company');
  $user_info = $this->User_Model->get_info_arr_fields('user_name','user_id', $eco_user_id, 'user');
  $role_info = $this->User_Model->get_info_arr_fields('role_name','role_id', $eco_role_id, 'role');
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url(); ?>User/dashboard" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $company_info[0]['company_name']; ?></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a class="d-block"><?php echo $user_info[0]['user_name']; ?></a>
        <a class="d-block">(<?php echo $role_info[0]['role_name']; ?>)</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2" id="sidebar">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if($eco_role_id == 1){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Website
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <!-- <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/header_content" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Header Content</p>
              </a>
            </li>
          </ul> -->
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/slider_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/cookbook_reg_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cookbook Contest</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/product_req_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Request</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/reseller_reg_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reseller Registration</p>
              </a>
            </li>
          </ul>
        </li>
<?php } if($eco_role_id == 1 || $eco_role_id == 2 || $eco_role_id == 3 || $eco_role_id == 4 || $eco_role_id == 5){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <?php if($eco_role_id == 1){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>User/company_information_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Company Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/franchise_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Franchise Information
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/user_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/vendor_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Vendor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/pincode_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pincode</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/team_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Team</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/gallery_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/offer_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Offers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/unit_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Unit</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/shipping_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Shipping Methode</p>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/customer_level_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Credit Info.</p>
              </a>
            </li>-->
          <?php } if($eco_role_id == 1 || $eco_role_id == 2 || $eco_role_id == 3 || $eco_role_id == 4 || $eco_role_id == 5){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/customer_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer</p>
              </a>
            </li>
          <?php } if($eco_role_id == 1){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/membership_scheme_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Membership Scheme</p>
              </a>
            </li>
          <?php }  ?>
          </ul>
        </li>
<?php } if($eco_role_id == 1 || $eco_role_id == 2){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/category_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                 Category
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/product_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                 Products
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Master/manufacturer_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manufacturer(Brand)</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/product_attri_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                 Products Attributes
                </p>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/inventory_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                 Inventory
                </p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/coupon_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Coupon</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/purchase_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/sale_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sales</p>
              </a>
            </li>
          </ul>
        </li>
      <?php } if($eco_role_id == 1 || $eco_role_id == 2 || $eco_role_id == 3 || $eco_role_id == 4 || $eco_role_id == 5){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Order Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Order/order_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Order Information
                </p>
              </a>
            </li>
          <?php if($eco_role_id == 1 || $eco_role_id == 2){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Order/receipt_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Receipt Information
                </p>
              </a>
            </li>
          <?php } ?>
            <!-- <li class="nav-item">
              <a href="<?php echo base_url(); ?>Product/order_status_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Order Status Information
                </p>
              </a>
            </li> -->
          </ul>
        </li>
      <?php } if($eco_role_id == 1 || $eco_role_id == 3){ ?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Transaction <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Transaction/sale_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sale</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Transaction/purchase_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Transaction/stock" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Transaction/employee_cash_list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Employee Cash</p>
              </a>
            </li>
          </ul>

        </li>
      <?php } if($eco_role_id == 1){?>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link head">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Report
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Report/customer_report" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Report</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Report/vendor_report" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Vendor Report</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Report/order_report" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order Report</p>
              </a>
            </li>
          </ul>

        </li>
      <?php } if($eco_role_id == 1){?>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>Order/booklet_order" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>Booklet Order</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>Transaction/membership_approve_list" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>Membership Approval</p>
        </a>
      </li>
    <?php } ?>
    <!-- Delivery Boy Order List -->
    <?php if($eco_role_id == 7){ ?>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>Order/delivery_boy_order_list" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>Order List</p>
        </a>
      </li>
    <?php } ?>
      </nav>
    <!-- /.sidebar-menu -->
    </div>
  <!-- /.sidebar -->
  </aside>


  
