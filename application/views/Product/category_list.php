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
          <div class="col-sm-6 mt-1">
            <h4>Category</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
            <a href="<?php echo base_url(); ?>Product/category" class="btn btn-sm btn-primary">Add Category</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card-body p-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Main-Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Sub-Category</a>
                </li>
              </ul>
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade active show py-4" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <table id="example1" class="table table-bordered tbl_list">
                    <thead>
                    <tr>
                      <th class="wt_75">Sr. No.</th>
                      <th>Main-Category Name</th>
                      <th class="wt_75">On Index</th>
                      <th class="wt_75">Status</th>
                      <th class="wt_75">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0;
                      foreach ($main_category_list as $list) {
                        $i++; ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $list->category_name ?></td>
                        <td><?php if($list->show_on_home == 1){ echo 'Yes'; } else{ echo 'No'; } ?></td>
                        <td><?php if($list->category_status == 1){ echo 'Active'; } else{ echo 'Inactive'; } ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>Product/edit_category/<?php echo $list->category_id; ?>"> <i class="fa fa-edit"></i> </a>
                          <a href="<?php echo base_url(); ?>Product/delete_category/<?php echo $list->category_id; ?>" onclick="return confirm('Delete this Category');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                        </td>
                      <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade py-4" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <table id="DataTable2" class="table table-bordered tbl_list">
                    <thead>
                    <tr>
                      <th class="wt_75">Sr. No.</th>
                      <th>Sub-Category Name</th>
                      <th class="wt_75">On Index</th>
                      <th class="wt_75">Status</th>
                      <th class="wt_75">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0;
                      foreach ($sub_category_list as $list) {
                        $i++; ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $list->category_name ?></td>
                        <td><?php if($list->show_on_home == 1){ echo 'Yes'; } else{ echo 'No'; } ?></td>
                        <td><?php if($list->category_status == 1){ echo 'Active'; } else{ echo 'Inactive'; } ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>Product/edit_category/<?php echo $list->category_id; ?>"> <i class="fa fa-edit"></i> </a>
                          <a href="<?php echo base_url(); ?>Product/delete_category/<?php echo $list->category_id; ?>" onclick="return confirm('Delete this Category');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                        </td>
                      <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--  -->
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
