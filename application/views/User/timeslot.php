<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pt-0 pb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-left mt-2">
            <h4>Timeslot</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card <?php if(!isset($update)){ echo 'collapsed-card'; } ?> card-default">
              <div class="card-header">
                <h3 class="card-title"> <?php if(isset($update)){ echo 'Update'; } else{ echo 'Add New'; } ?> Timeslot</h3>
                <div class="card-tools">
                  <?php if(!isset($update)){
                    echo '<button type="button" class="btn btn-sm btn-primary" data-card-widget="collapse">Add New</button>';
                  } else{
                    echo '<a href="'.base_url().'Master/timeslot" type="button" class="btn btn-sm btn-outline-info" >Add New</a>';
                  } ?>
                </div>
              </div>
              <!--  -->
              <div class="card-body px-0 py-0" <?php if(isset($update)){ echo 'style="display: block;"'; } else{ echo 'style="display: none;"'; } ?>>
                <form class="input_form m-0" id="form_action" role="form" action="" method="post">
                  <div class="row p-4">
                    <div class="form-group col-md-6">
                      <label>Start Time</label>
                      <input type="text" class="form-control form-control-sm" name="timeslot_start_time" value="<?php if(isset($timeslot_info)){ echo $timeslot_info['timeslot_start_time']; } ?>" id="timepicker1" data-target="#timepicker1" data-toggle="datetimepicker" required >
                    </div>
                    <div class="form-group col-md-6">
                      <label>End Time</label>
                      <input type="text" class="form-control form-control-sm" name="timeslot_end_time" value="<?php if(isset($timeslot_info)){ echo $timeslot_info['timeslot_end_time']; } ?>" id="timepicker2" data-target="#timepicker2" data-toggle="datetimepicker" required >
                    </div>
                  </div>
                  <div class="card-footer clearfix" style="display: block;">
                    <div class="row">
                      <div class="col-md-6 text-left">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="timeslot_status" id="timeslot_status" value="0" <?php if(isset($timeslot_info) && $timeslot_info['timeslot_status'] == 0){ echo 'checked'; } ?>>
                          <label for="timeslot_status" class="custom-control-label">Disable This Timeslot</label>
                        </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <a href="<?php echo base_url(); ?>Master/timeslot" class="btn btn-sm btn-default px-4 mx-4">Cancel</a>
                        <?php if(isset($update)){
                          echo '<button class="btn btn-sm btn-primary float-right px-4">Update</button>';
                        } else{
                          echo '<button class="btn btn-sm btn-success float-right px-4">Save</button>';
                        } ?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">List All Timeslot</h3>
              </div>
              <div class="card-body p-2">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="d-none">#</th>
                    <th class="wt_50">Action</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th class="wt_75">tatus</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach ($timeslot_list as $list) { $i++;
                      // $party_info = $this->Master_Model->get_info_arr_fields('party_name','party_id', $list->party_id, 'party');
                    ?>
                      <tr>
                        <td class="d-none"><?php echo $i; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url() ?>Master/edit_timeslot/<?php echo $list->timeslot_id; ?>" type="button" class="btn btn-sm btn-default"><i class="fa fa-edit text-primary"></i></a>
                            <a href="<?php echo base_url() ?>Master/delete_timeslot/<?php echo $list->timeslot_id; ?>" type="button" class="btn btn-sm btn-default" onclick="return confirm('Delete this Timeslot');"><i class="fa fa-trash text-danger"></i></a>
                          </div>
                        </td>
                        <td><?php echo $list->timeslot_start_time; ?></td>
                        <td><?php echo $list->timeslot_end_time; ?></td>
                        <td>
                          <?php if($list->timeslot_status == 0){ echo '<span class="text-danger">Inactive</span>'; }
                            else{ echo '<span class="text-success">Active</span>'; } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>

</body>
</html>
<script type="text/javascript">
  // Calculate
  // $("#timeslot_gross, #timeslot_tear").on("change", function(){
  //   var timeslot_gross =  $('#timeslot_gross').val();
  //   var timeslot_tear =  $('#timeslot_tear').val();
  //   var timeslot_net = timeslot_gross - timeslot_tear;
  //   $('#timeslot_net').val(timeslot_net);
  // });

</script>
