<!DOCTYPE html>
<html>

<style>
  td{
    padding:2px 10px !important;
  }
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
            <h4>SLIDER INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Slider Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url() ?>Master/slider" class="btn btn-sm btn-block btn-primary">Add Slider</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Slider Title</th>
                  <th class="wt_100">Possition</th>
                  <th class="wt_100">Status</th>
                  <th class="wt_75">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($slider_list as $slider_list) {
                    if($slider_list->slider_status=='1'){
                      $status='Active';
                    } else{
                      $status='Inactive';
                    }
                    $i++; ?>
                  <tr>
                    <td class="wt_50"><?php echo $i; ?></td>
                    <td><?php echo $slider_list->slider_title; ?></td>
                    <td>Possition <?php echo $slider_list->slider_possition; ?></td>
                    <td class="wt_100"><?php echo $status ?></td>
                    <td  class="wt_75">
                      <a href="<?php echo base_url(); ?>Master/edit_slider/<?php echo $slider_list->slider_id; ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo base_url(); ?>Master/delete_slider/<?php echo $slider_list->slider_id; ?>" onclick="return confirm('Delete this Slider');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>
                    <?php } ?>
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
