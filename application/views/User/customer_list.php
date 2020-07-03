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
          <div class="col-sm-12 mt-1">
            <h4>Customer Information</h4>
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
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list"></i> List Customer Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>Master/select_cust_membership" class="btn btn-sm btn-block btn-primary">Add Customer</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Membership</th>
                  <th>Added By</th>
                  <th class="wt_50">Status</th>
                  <th class="wt_50">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($customer_list as $list) {
                    $i++;
                    $today = date('d-m-Y');
                    $customer_id = $list->customer_id;
                    // Membership...
                    $cust_mem_info = $this->User_Model->get_info_arr2_fields('*', 'customer_id', $customer_id, 'cust_mem_status', 1, '', '', 'cust_membership');
                    $mem_info = '';
                    $mem_sch_info = '';
                    if($cust_mem_info && strtotime($cust_mem_info[0]['cust_mem_end_date']) > strtotime($today)){
                      $mem_info = $cust_mem_info[0];
                      $mem_sch_id = $mem_info['mem_sch_id'];
                      $mem_sch_info = $this->User_Model->get_info_arr2_fields('mem_sch_name', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
                    }
                    // AddedBy...
                    $customer_addedby = $list->customer_addedby;
                    $addedby = "Online Registered";
                    $user_info = $this->User_Model->get_info_arr2_fields('user_name', 'user_id', $customer_addedby, '', '', '', '', 'user');
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->customer_fname.' '.$list->customer_lname; ?></td>
                    <td><?php echo $list->customer_email; ?></td>
                    <td><?php echo $list->customer_mobile; ?></td>
                    <td><?php
                      if ($mem_info && $mem_sch_info) {
                        echo $mem_sch_info[0]['mem_sch_name'].'<br>';
                        echo $mem_info['cust_mem_start_date'].' to<br>'.$mem_info['cust_mem_end_date'];
                      }
                     ?></td>

                     <td>
                       <?php if($customer_addedby == 0){ echo $addedby; }
                       else{ echo $user_info[0]['user_name']; } ?>
                     </td>
                    <td><?php if($list->customer_status == 1){
                      echo "<span class='text-success'>Active</span>";
                      } else{
                        echo "<span class='text-danger'>Inactive</span>";
                      } ?>
                    </td>
                    <td class="text-center">
                      <a href="<?php echo base_url(); ?>Master/edit_customer/<?php echo $list->customer_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <!-- <a href="<?php echo base_url(); ?>Master/delete_customer/<?php echo $list->customer_id; ?>" onclick="return confirm('Delete this Customer');" class="ml-2 text-danger"> <i class="fa fa-trash text-danger"></i> </a> -->
                    </td>
                  <?php } ?>
                  </tr>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
  <?php if($this->session->flashdata('save_success')){ ?>
    $(document).ready(function(){
      toastr.success('Saved successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('update_success')){ ?>
    $(document).ready(function(){
      toastr.info('Updated successfully');
    });
  <?php } ?>
  <?php if($this->session->flashdata('delete_success')){ ?>
    $(document).ready(function(){
      toastr.error('Deleted successfully');
    });
  <?php } ?>

  </script>

</body>
</html>
