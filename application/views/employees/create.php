<div class="mainpanel">
  <div class="pageheader">
    <div class="media">
      <div class="pageicon pull-left">
        <i class="fa fa-home"></i>
      </div>
      <div class="media-body">
        <ul class="breadcrumb">
          <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
          <li>Profiles</li>
        </ul>
        <h4>Create Employee</h4>
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

    <div class="box">


      <div class="ibox ">
        <div class="ibox-title">


          <form role="form" action="<?php base_url('employees/create') ?>" method="post">
            <?php echo validation_errors(); ?>

            <div class="row">

              <div class="col-md-6">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" id="male" value="1" checked>
                        Male
                      </label>
                      <label>
                        <input type="radio" name="gender" id="female" value="2">
                        Female
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="col-form-label" for="description">Role</label>
                    <select class="select_group material" data-placeholder="Choose Role" id="role" name="role" style="width:100%;">
                      <option value=""></option>
                      <?php foreach ($role_data as $k => $v) : ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['role'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                  </div>

                </div>
              </div>
              <div class="col-md-6">

                <div class="col-md-4">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="address">Employee ID</label>
                      <input type="address" class="form-control" id="emp_id" name="emp_id" placeholder="Type Employee ID" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Basic Salary</label>
                    <input type="text" class="form-control" id="basics" name="basic" placeholder="Basic Salary" autocomplete="off">
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="form-group">
                    <label for="allowance">Allowance</label>
                    <input type="address" class="form-control" id="allowance" name="allowance" placeholder="Allowance amount" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ot">OT Rate (/hr)</label>
                    <input type="text" class="form-control" id="ot" name="ot" placeholder="Over Time" autocomplete="off">
                  </div>
                </div>


              </div>

            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Create Employee</button>
              <a href="<?php echo base_url('employees/') ?>" class="btn btn-warning">Back</a>
            </div>
          </form>
        </div>
        <!-- /.box-body -->


      </div>
    </div>

  </div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    jQuery('.material').select2({
      minimumResultsForSearch: -1
    });
    $("#profileMainMenu").addClass('active');
    $("#employeesMenu").addClass('active');

  });
</script>