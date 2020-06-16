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
        </div>
        <hr>


      <h4 class="mb-3">Transactional Summary</h4>
        <div class="row">
        </div>

        <h4 class="mb-3">Inventory Information</h4>
          <div class="row">
          </div>
          <hr>
        
      </div><!-- /.container-fluid -->
    </section>
  </div>

</body>
</html>
