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
            <h4>MEMBERSHIP SCHEME INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Membership Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>Master/membership_scheme" class="btn btn-sm btn-block btn-primary">Add Membership</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Membership Scheme Name</th>
                  <th>Membership Scheme Amount</th>
                  <th>Membership Scheme Validity</th>
                  <th>Membership Scheme points</th>
                  <th>Status </th>
                  <th class="wt_75">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($membership_scheme_list as $list) {
                    $i++; ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $list->mem_sch_name ?></td>
                    <td><?php echo $list->mem_sch_amt ?></td>
                    <td><?php echo $list->mem_sch_valid ?></td>
                    <td><?php echo $list->mem_sch_point ?></td>
                    <td><?php if($list->mem_sch_status == 1){
                      echo "<span class='text-success'>Active</span>";
                      } else{
                        echo "<span class='text-danger'>Inactive</span>";
                      } ?>
                    </td>
                    <td>
                      <a href="<?php echo base_url(); ?>Master/edit_membership_scheme/<?php echo $list->mem_sch_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Master/delete_membership_scheme/<?php echo $list->mem_sch_id; ?>" onclick="return confirm('Delete this Information');" class="ml-2 text-danger"> <i class="fa fa-trash text-danger"></i> </a>
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
