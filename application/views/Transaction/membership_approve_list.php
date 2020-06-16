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
          <div class="col-sm-12 mt-1">
            <h4>Membership Approval</h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body p-0">
              <table id="example1" class="table table-bordered tbl_list">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th class="">Customer</th>
                  <th>Scheme Name</th>
                  <th class="wt_75">Amount</th>
                  <th class="wt_75">From</th>
                  <th class="wt_75">To</th>
                  <th class="wt_75">Status</th>
                  <th class="wt_75">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php //print_r($membership_list); ?>
                  <?php $i = 0;
                  foreach ($membership_list as $list) {
                    $customer_id = $list->customer_id;
                    $customer_info = $this->User_Model->get_info_arr_fields('customer_fname, customer_lname','customer_id', $customer_id, 'customer');
                    $mem_sch_id = $list->mem_sch_id;
                    $mem_sch_info = $this->User_Model->get_info_arr_fields('mem_sch_name','mem_sch_id', $mem_sch_id, 'membership_scheme');
                    $i++;
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $customer_info[0]['customer_fname'].' '.$customer_info[0]['customer_lname']; ?></td>
                    <td><?php echo $mem_sch_info[0]['mem_sch_name']; ?></td>
                    <td><?php echo $list->cust_mem_amt; ?></td>
                    <td><?php echo $list->cust_mem_start_date; ?></td>
                    <td><?php echo $list->cust_mem_end_date; ?></td>
                    <td class="text-danger">Inactive</td>
                    <td><a href="<?php echo base_url(); ?>Transaction/approve_membership/<?php echo $list->cust_mem_id; ?>" class="btn btn-outline-info btn-sm" onclick="return confirm('Do You Want To Approve This Membership');">Approve</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('approve_success')){ ?>
      $(document).ready(function(){
        toastr.success('Membership Approved successfully');
      });
    <?php } ?>
  </script>
</body>
</html>
