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
        <h4>Summary</h4>
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
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php var_dump($this->session->flashdata('error')); ?>
      </div>
    <?php endif; ?>

    <?php if ($attendance_data) {
      
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));

      ?>



      <div class="panel">
        <div class="panel-heading">

         <button>Attendance History</button>


          <div class="pull-right">
            <form method="POST" class="form-inline" id="payForm">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from . ' - ' . $range_to; ?>">
              </div>
              <button type="button" class="btn btn-success btn-sm btn-flat" id="payroll"><span class="glyphicon glyphicon-print"></span> Payroll</button>
              <button type="button" class="btn btn-primary btn-sm btn-flat" id="payslip"><span class="glyphicon glyphicon-print"></span> Payslip</button>
            </form>
          </div>
        </div><!-- panel-heading -->

        <table id="shTable" class="footable table table-stripped table-hover" data-page-size="8" data-filter=#filter>
          <thead>
            <tr>
              <th>Employee Name</th>
              <th>Employee ID</th>
              <th>Gross</th>
              <th>Deductions</th>
              <th>Cash Advance</th>
              <th>Net Pay</th>


            </tr>
          </thead>
          <tbody>
            <?php foreach ($attendance_data as $k => $v) :
              $status = ($v['attendance_info']['status']) ? '<span class="label label-warning pull-right">ontime</span>' : '<span class="label label-danger pull-right">late</span>';
            ?>
              <tr>

                <td><?php echo $deduction; ?></td>
                <td><?php echo $deduction; ?></td>
                <td><?php echo $deduction; ?></td>
                <td><?php echo $deduction; ?></td>
                <td>Test</td>
                <td>Test</td>




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
                        <form class="form-horizontal" method="POST" action="<?php echo base_url('payroll/editAttendance'); ?>">
                          <input type="hidden" id="attid" name="id">
                          <div class="form-group">
                            <label for="datepicker_edit" class="col-sm-3 control-label">Date</label>

                            <div class="col-sm-9">
                              <div class="date">
                                <input type="text" class="form-control" id="datepicker_edit" name="edit_date" autocomplete="off">
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
          <h2><strong>Mark Attendance to Manage Payroll system</strong></h2>
        </div>
        <div class="row">
          <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Mark Attendance</a>
        </div>
      </div>
    <?php } ?>

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
            <form class="form-horizontal" method="POST" action="<?php echo base_url('payroll/createAttendance'); ?>">
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
                    <input type="text" class="form-control" id="datepicker_add" name="date" autocomplete="off" required>
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

  </div><!-- contentpanel -->
</div><!-- mainpanel -->
</div><!-- mainwrapper -->

</section>


<script type="text/javascript">
  $(document).ready(function() {

    $("#payrollMainMenu").addClass('active');
    $("#summaryMenu").addClass('active');

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

    //Date range picker
    $('#reservation').daterangepicker()

  });


  function getRow(id) {
    var base_url = "<?php echo base_url(); ?>";
    $.ajax({
      type: 'POST',
      url: base_url + '/payroll/attendanceById/',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(response) {
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