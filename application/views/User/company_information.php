<!DOCTYPE html>
<html>
<?php
  $page = "company_information";
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
            <h1>COMPANY INFORMATION</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Company Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <?php if(isset($update)){ ?>
                <form action="<?php echo base_url(); ?>User/update_company" method="post" enctype="multipart/form-data" role="form">
                  <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
              <?php }else{ ?>
                <form action="<?php echo base_url(); ?>User/save_company" method="post" enctype="multipart/form-data" role="form">
              <?php } ?> -->
              <form action="" method="post" enctype="multipart/form-data">

                <div class="card-body row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="company_name" id="company_name" value="<?php if(isset($company_name)){ echo $company_name; } ?>" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group col-md-12">
                    <textarea class="form-control" rows="3" name="company_address" id="company_address" placeholder="Enter Company Address"><?php if(isset($company_address)){ echo $company_address; } ?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_city" id="company_city" value="<?php if(isset($company_city)){ echo $company_city; } ?>" placeholder="City">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_state" id="company_state" value="<?php if(isset($company_state)){ echo $company_state; } ?>" placeholder="State">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_district" id="company_district" value="<?php if(isset($company_district)){ echo $company_district; } ?>" placeholder="District">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="company_statecode" id="company_statecode" value="<?php if(isset($company_statecode)){ echo $company_statecode; } ?>" placeholder="Statecode">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="company_mob1" id="company_mob1" value="<?php if(isset($company_mob1)){ echo $company_mob1; } ?>" placeholder="Mobile No. 1">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="company_mob2" id="company_mob2" value="<?php if(isset($company_mob2)){ echo $company_mob2; } ?>" placeholder="Mobile No. 2">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="company_email" id="company_email" value="<?php if(isset($company_email)){ echo $company_email; } ?>" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_website" id="company_website" value="<?php if(isset($company_website)){ echo $company_website; } ?>" placeholder="Website">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_pan_no" id="company_pan_no" value="<?php if(isset($company_pan_no)){ echo $company_pan_no; } ?>" placeholder="Pan No.">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_gst_no" id="company_gst_no" value="<?php if(isset($company_gst_no)){ echo $company_gst_no; } ?>" placeholder="GST No.">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_lic1" id="company_lic1" value="<?php if(isset($company_lic1)){ echo $company_lic1; } ?>" placeholder="Attorney Code">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_lic2" id="company_lic2" value="<?php if(isset($company_lic2)){ echo $company_lic2; } ?>" placeholder="Lic No. 2">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control date" name="company_start_date" id="date1" value="<?php if(isset($company_start_date)){ echo $company_start_date; } ?>" data-target="#date1" data-toggle="datetimepicker" placeholder="Fin Start Date">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="company_end_date" id="date2" value="<?php if(isset($company_end_date)){ echo $company_end_date; } ?>" data-target="#date2" data-toggle="datetimepicker" placeholder="Fin End Date">
                  </div>
                  <?php if(isset($update)){ }else{ ?>
                    <div class="form-group col-md-6">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="company_logo" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Browse Logo</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      No file selected.
                    </div>
                    <div class="form-group col-md-6">
                      <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Admin Email">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Admin Password">
                    </div>
                  <?php } ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php if(isset($update)){ ?>
                    <button type="submit" class="btn btn-primary">Update Company</button>
                  <?php }else{ ?>
                    <button type="submit" class="btn btn-success">Create Company</button>
                  <?php } ?>
                  <a href="<?php echo base_url(); ?>/User/company_information_list" class="btn btn-default ml-4">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div> 

</body>
</html>
