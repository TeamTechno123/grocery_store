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
            <h4>VIEW ALL FRANCHISE INFORMATION</h4>
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
              <h3 class="card-title"><i class="fa fa-list"></i> List Franchise Information</h3>
              <div class="card-tools">
                <a href="<?php echo base_url(); ?>Master/franchise_information" class="btn btn-sm btn-block btn-primary">Add Franchise</a>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="wt_50">#</th>
                  <th>Franchise Name</th>
                  <th>Mobile No.</th>
                  <th>Email Id</th>
                  <th class="wt_50">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($franchise_list as $list) {
                    $i++;
                  ?>
                    <tr>
                      <td class="sr_no"><?php echo $i; ?></td>
                      <td><?php echo $list->franchise_name; ?></td>
                      <td><?php echo $list->franchise_mobile; ?></td>
                      <td><?php echo $list->franchise_email; ?></td>
                      <td>
                        <a href="<?php echo base_url(); ?>Master/edit_franchise/<?php echo $list->user_id ?>"> <i class="fa fa-edit"></i> </a>
                        <a class="ml-2 text-danger" href="<?php echo base_url(); ?>Master/delete_franchise/<?php echo $list->user_id ?>" onclick="return confirm('Delete Confirm');"> <i class="fa fa-trash"></i> </a>
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

</body>
</html>
