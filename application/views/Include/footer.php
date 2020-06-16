<?php
  $eco_user_id = $this->session->userdata('eco_user_id');
  $eco_company_id = $this->session->userdata('eco_company_id');
  $eco_roll_id = $this->session->userdata('eco_roll_id');
  $company_info = $this->User_Model->get_info_arr_fields('company_name','company_id', $eco_company_id, 'company');
?>
<footer class="main-footer">
  <strong>Copyright &copy;<?php echo date('Y'); ?>-<?php echo date('Y')+1; ?> <a href="<?php //echo base_url(); ?> google.com"><?php echo $company_info[0]['company_name']; ?></a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0
  </div>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<script type="text/javascript">
  $('#date1').datetimepicker({
    format: 'DD-MM-Y'
  });
  $('#date2').datetimepicker({
    format: 'DD-MM-Y'
  });
  $('#date3').datetimepicker({
    format: 'DD-MM-Y'
  })
  $('#date4').datetimepicker({
    format: 'DD-MM-Y'
  })
  $('#date5').datetimepicker({
    format: 'DD-MM-Y'
  })
  //Timepicker
  $('#timepicker1').datetimepicker({
    format: 'LT'
  })
  $('#timepicker2').datetimepicker({
    format: 'LT'
  })
  $('#timepicker3').datetimepicker({
    format: 'LT'
  })
  $('#timepicker4').datetimepicker({
    format: 'LT'
  })
  $('#timepicker5').datetimepicker({
    format: 'LT'
  })
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $("#DataTable1").DataTable();
    $("#DataTable2").DataTable();
    $("#DataTable3").DataTable();
    $("#DataTable4").DataTable();
    $("#DataTable5").DataTable();
  });
</script>
<script>
  $(function () {
    // Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    //Initialize Select2 Elements
    $('.select2').select2();
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();
  })
</script>
<!-- Menu Active -->
<script type="text/javascript">
  $(document).ready(function() {
    var url = window.location.href;
    var activePage = url;
    $('#sidebar .nav-link').removeClass('active');
    $('#sidebar .has-treeview').removeClass('menu-open');
    $('#sidebar .nav-treeview').css("display", "none");
    // alert(activePage);
    $('#sidebar .nav-link').each(function () {
      var linkPage = this.href;
      if (activePage == linkPage) {
          $(this).closest(".nav-link").addClass("active");
          $(this).closest(".has-treeview").addClass("menu-open");
          $(this).closest(".has-treeview").find(".nav-treeview").css("display", "block");
          $(this).closest(".has-treeview").find(".head").addClass("active");
      }
    });
  });
</script>
