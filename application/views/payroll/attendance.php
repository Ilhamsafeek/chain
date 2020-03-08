<div class="mainpanel">
  <div class="pageheader">
    <div class="media">
      <div class="pageicon pull-left">
        <i class="fa fa-calendar"></i>
      </div>
      <div class="media-body">
        <ul class="breadcrumb">
          <li><a href="chain.html"><i class="fa fa-cubes"></i></a></li>
          <li>Payroll</li>
        </ul>
        <h4>Attendance</h4>
      </div>
    </div><!-- media -->
  </div><!-- pageheader -->
  <div class="contentpanel">

    <?php if ($this->session->flashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php elseif ($this->session->flashdata('error')) : ?>
      <div class="alert alert-error alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>

    <?php if ($attendance_data) { ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php

              echo "<h3>" . $employee_count . "</h3>";
              ?>

              <p>Total Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php

              echo "<h3>" . $ontime_percent . "<sup style='font-size: 20px'>%</sup></h3>";
              ?>

              <p>On Time Percentage</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php

              echo "<h3>" . $ontime_today . "</h3>"
              ?>

              <p>On Time Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php

              echo "<h3>" . $late_today . "</h3>"
              ?>

              <p>Late Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Mark Attendance</a>

      <div class="panel panel-dark-head">
        <div class="panel-heading">

          <h4 class="panel-title">Attendance History</h4>
        </div><!-- panel-heading -->

        <table id="shTable" class="footable table table-stripped table-hover" data-page-size="8" data-filter=#filter>
          <thead>
            <tr>
              <th>Date</th>
              <th>Employee ID</th>
              <th>Name</th>
              <th>Time In</th>
              <th>Time Out</th>

              <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                <th class="text-right" data-sort-ignore="true">Action</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($attendance_data as $k => $v) :
              $status = ($v['attendance_info']['status']) ? '<span class="label label-warning pull-right">ontime</span>' : '<span class="label label-danger pull-right">late</span>';
            ?>
              <tr>

                <td><?php echo date('M d, Y', strtotime($v['attendance_info']['date'])); ?></td>
                <td><?php echo $v['attendance_info']['employee_id']; ?></td>
                <td><?php echo $v['attendance_info']['name']; ?></td>
                <td><?php echo  date('h:i A', strtotime($v['attendance_info']['time_in'])) . $status; ?></td>
                <td><?php echo  date('h:i A', strtotime($v['attendance_info']['time_out'])); ?></td>

                <?php if (in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>

                  <td class="text-right">
                    <div class="btn-group">

                      <button class='btn btn-success btn-sm btn-flat edit' data-id='<?php echo $v['attendance_info']['attid']; ?>"'><i class='fa fa-pencil'></i> Edit</button>
                      <button class='btn btn-danger btn-sm btn-flat delete' data-id='<?php echo $v['attendance_info']['attid']; ?>'><i class='fa fa-trash-o'></i> Delete</button>
                    </div>
                  </td>

                <?php endif; ?>


                <!-- Add -->
                <div class="modal fade" id="addnew">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><b>Add Attendance</b></h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="attendance_add.php">
                          <div class="form-group">
                            <label for="employee" class="col-sm-3 control-label">Employee ID</label>

                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="employee" name="employee" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="datepicker_add" class="col-sm-3 control-label">Date</label>

                            <div class="col-sm-9">
                              <div class="date">
                                <input type="text" class="form-control" id="datepicker_add" name="date" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="time_in" class="col-sm-3 control-label">Time In</label>

                            <div class="col-sm-9">
                              <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_in" name="time_in">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="time_out" class="col-sm-3 control-label">Time Out</label>

                            <div class="col-sm-9">
                              <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="time_out" name="time_out">
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Edit -->
                <div class="modal fade" id="edit">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="attendance_edit.php">
                          <input type="hidden" id="attid" name="id">
                          <div class="form-group">
                            <label for="datepicker_edit" class="col-sm-3 control-label">Date</label>

                            <div class="col-sm-9">
                              <div class="date">
                                <input type="text" class="form-control" id="datepicker_edit" name="edit_date">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>

                            <div class="col-sm-9">
                              <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="edit_time_out" class="col-sm-3 control-label">Time Out</label>

                            <div class="col-sm-9">
                              <div class="bootstrap-timepicker">
                                <input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Delete -->
                <div class="modal fade" id="delete">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="<?php echo base_url('payroll/deleteAttendance'); ?>">
                          <input type="hidden" id="del_attid" name="id">
                          <div class="text-center">
                            <p>DELETE ATTENDANCE</p>
                            <h2 id="del_employee_name" class="bold"></h2>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


              <?php endforeach ?>

          </tbody>
        </table>
      </div><!-- panel -->

    <?php } else { ?>
      <div class="notfoundpanel">

        <div class="row">
          <img src="https://plugin.intuitcdn.net/transactions-list-ui/3.21.10/images/1369e3744cf993faa355b5f7f4833b1a.svg" width="200px">
        </div>
        <div class="row text-center">
          <h2><strong>Add a new user to manage your activities under roles</strong></h2>
        </div>
        <div class="row">
          <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new user</a>
        </div>
      </div>
    <?php } ?>






  </div><!-- contentpanel -->
</div><!-- mainpanel -->
</div><!-- mainwrapper -->
</section>


<script type="text/javascript">
  $(document).ready(function() {

    $("#payrollMainMenu").addClass('active');
    $("#attendanceMenu").addClass('active');

  });

  $(function() {
      $('.edit').click(function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $('.delete').click(function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

    
function getRow(id){
  var base_url = "<?php echo base_url(); ?>";
  $.ajax({
    type: 'POST',
    url: base_url + '/payroll/attendanceById/',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.name);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.name);
    }
  });
}
</script>