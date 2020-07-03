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
        <h4 class="mb-3">User Summary</h4>
        <div class="row">
          <!-- left column -->
          <div class="col-md-2 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $office_emp_cnt; ?></h3>
                <p>Office Employee</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('User/dash_user_list/2'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $sale_exe_cnt; ?></h3>
                <p>Sales Executive</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('User/dash_user_list/5'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $cash_emp_cnt; ?></h3>
                <p>Cash Employee</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('User/dash_user_list/6'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $delivery_boy_cnt; ?></h3>
                <p>Delivery-Boy</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('User/dash_user_list/7'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3> <?php echo $reseller_cnt; ?> </h3>
                <p>Reseller/Freelancer</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('User/dash_user_list/3'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $team_cnt; ?></h3>
                <p>Team</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Master/team_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <hr>

      <h4 class="mb-3">Transactional Summary</h4>
        <div class="row">
          <!-- left column -->
          <div class="col-md-2 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $vendor_cnt; ?></h3>
                <p>Vendor</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Master/vendor_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $customer_cnt; ?></h3>
                <p>Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Master/customer_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-md-2 col-6">
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $purchase_cnt; ?></h3>
                <p>Purchase</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Transaction/purchase_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- <div class="col-md-2 col-6">
            <div class="small-box bg-red">
              <div class="inner">
                <h3>5</h3>
                <p>Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Master/team_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <div class="col-md-2 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $act_mem_cnt; ?></h3>
                <p>Membership</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Report/active_memberships'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- <div class="col-md-2 col-6">
            <div class="small-box bg-red">
              <div class="inner">
                <h3>5</h3>
                <p>Renewal Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('Master/team_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
        </div>
        <hr>
        <h4 class="mb-3">Inventory Information</h4>
          <div class="row">
            <!-- left column -->
            <!-- <div class="col-md-2 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $offer_cnt; ?></h3>
                  <p>Offers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('Master/team_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
            <div class="col-md-2 col-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $manufacturer_cnt; ?></h3>
                  <p>Brand</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('Master/manufacturer_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $category_cnt; ?></h3>
                  <p>Product Category</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('Product/category_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $product_cnt; ?></h3>
                  <p>Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('Product/product_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $coupon_cnt; ?></h3>
                  <p>Coupen</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('Product/coupon_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-md-2 col-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $unit_cnt; ?></h3>
                  <p>Unit</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url('Master/unit_list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <hr>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Sales-Executive</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Reseller/Freelancer</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Office-Employee</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <table id="DataTable1" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Name Of Person</th>
                        <?php foreach ($mem_scheme_list as $mem_scheme_list1) { ?>
                          <th><?php echo $mem_scheme_list1->mem_sch_name; ?></th>
                        <?php } ?>
                        <th>Count</th>
                        <th>Points</th>
                        <th>Amount</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($sales_executive_list as $sales_executive_list1) {
                          $emp_user_id = $sales_executive_list1->user_id;
                        ?>
                        <tr>
                          <td><?php echo $sales_executive_list1->user_name; ?></td>

                          <?php foreach ($mem_scheme_list as $mem_scheme_list2) {
                            $mem_sch_id = $mem_scheme_list2->mem_sch_id;
                            $mem_count = $this->User_Model->get_count('cust_mem_id ','cust_mem_addedby',$emp_user_id,'mem_sch_id',$mem_sch_id,'','','cust_membership');
                          ?>
                            <td><?php echo $mem_count; ?></td>
                          <?php } ?>
                          <?php $added_cust_count = $this->User_Model->get_count('customer_id ','customer_addedby',$emp_user_id,'','','','','customer'); ?>
                          <td><?php echo $added_cust_count; ?></td>
                          <td><?php echo $sales_executive_list1->user_points; ?></td>
                          <?php $tot_mem_amt = $this->User_Model->get_sum('','cust_mem_amt','cust_mem_addedby',$emp_user_id,'','','cust_membership'); ?>
                          <td><?php if($tot_mem_amt){ echo $tot_mem_amt; } else{ echo 0; } ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <table id="DataTable2" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Name Of Person</th>
                        <?php foreach ($mem_scheme_list as $mem_scheme_list1) { ?>
                          <th><?php echo $mem_scheme_list1->mem_sch_name; ?></th>
                        <?php } ?>
                        <th>Count</th>
                        <th>Points</th>
                        <th>Amount</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($reseller_list as $reseller_list1) {
                          $emp_user_id = $reseller_list1->user_id;
                        ?>
                        <tr>
                          <td><?php echo $reseller_list1->user_name; ?></td>

                          <?php foreach ($mem_scheme_list as $mem_scheme_list2) {
                            $mem_sch_id = $mem_scheme_list2->mem_sch_id;
                            $mem_count = $this->User_Model->get_count('cust_mem_id ','cust_mem_addedby',$emp_user_id,'mem_sch_id',$mem_sch_id,'','','cust_membership');
                          ?>
                            <td><?php echo $mem_count; ?></td>
                          <?php } ?>

                          <?php $added_cust_count = $this->User_Model->get_count('customer_id ','customer_addedby',$emp_user_id,'','','','','customer'); ?>
                          <td><?php echo $added_cust_count; ?></td>
                          <td><?php echo $reseller_list1->user_points; ?></td>
                          <?php $tot_mem_amt = $this->User_Model->get_sum('','cust_mem_amt','cust_mem_addedby',$emp_user_id,'','','cust_membership'); ?>
                          <td><?php if($tot_mem_amt){ echo $tot_mem_amt; } else{ echo 0; } ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                    <table id="DataTable3" class="table table-bordered tbl_list">
                      <thead>
                      <tr>
                        <th>Name Of Person</th>
                        <?php foreach ($mem_scheme_list as $mem_scheme_list1) { ?>
                          <th><?php echo $mem_scheme_list1->mem_sch_name; ?></th>
                        <?php } ?>

                        <th>Count</th>
                        <th>Points</th>
                        <th>Amount</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($office_emp_list as $office_emp_list1) {
                          $emp_user_id = $office_emp_list1->user_id;
                        ?>
                        <tr>
                          <td><?php echo $office_emp_list1->user_name; ?></td>

                          <?php foreach ($mem_scheme_list as $mem_scheme_list2) {
                            $mem_sch_id = $mem_scheme_list2->mem_sch_id;
                            $mem_count = $this->User_Model->get_count('cust_mem_id ','cust_mem_addedby',$emp_user_id,'mem_sch_id',$mem_sch_id,'','','cust_membership');
                          ?>
                            <td><?php echo $mem_count; ?></td>
                          <?php } ?>

                          <?php $added_cust_count = $this->User_Model->get_count('customer_id ','customer_addedby',$emp_user_id,'','','','','customer'); ?>
                          <!-- <td><?php if($added_cust_count > 0 ){ ?> <a href="<?php echo base_url(); ?>Master/customer_list/<?php echo $emp_user_id; ?>"><?php echo $added_cust_count; ?></a>   <?php } else{ echo $added_cust_count; } ?></td> -->
                          <td><?php echo $added_cust_count; ?></td>
                          <td><?php echo $office_emp_list1->user_points; ?></td>
                          <?php $tot_mem_amt = $this->User_Model->get_sum('','cust_mem_amt','cust_mem_addedby',$emp_user_id,'','','cust_membership'); ?>
                          <td><?php if($tot_mem_amt){ echo $tot_mem_amt; } else{ echo 0; } ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

</body>
</html>
