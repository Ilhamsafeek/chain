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
        <h4>Create Role</h4>
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



    <form role="form" action="<?php base_url('roles/create') ?>" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="Enter role name" autocomplete="off">
          </div>
        </div>
      </div>


      <div class="ibox ">
        <div class="ibox-title">
          <h5>Permissions </h5>

        </div>

        <div class="ibox-content">

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>

                  <th></th>
                  <th>Create </th>
                  <th>Update </th>
                  <th>View</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Users</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                </tr>
                <tr>
                  <td>Roles</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createRole"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateRole"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewRole"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteRole"></td>
                </tr>
                <tr>
                  <td>Customers</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createCustomer"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateCustomer"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewCustomer"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteCustomer"></td>
                </tr>
                <tr>
                  <td>Supplier</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createSupplier"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateSupplier"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewSupplier"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteSupplier"></td>
                </tr>
                <tr>
                  <td>Product</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct"></td>
                </tr>
                <tr>
                  <td>Orders</td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="createOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder"></td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder"></td>
                </tr>
                <tr>
                  <td>Report</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewReport"></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Company</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Profile</td>
                  <td> - </td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile"></td>
                  <td> - </td>
                </tr>
                <tr>
                  <td>Setting</td>
                  <td> - </td>
                  <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"></td>
                  <td> - </td>
                  <td> - </td>
                </tr>
              </tbody>
            </table>
          </div>


          <div class="hr-line-dashed"></div>
          <div class="form-group row">
            <div class="col-sm-4 col-sm-offset-2">

              <button type="submit" class="btn btn-success">Create Role</button>
              <a href="<?php echo base_url('roles/') ?>" class="btn btn-warning">Back</a>
            </div>
          </div>



        </div>



    </form>
  </div>
</div>

</div>
</div>


<script>
  $(document).ready(function() {
    $("#profileMainMenu").addClass('active');
    $("#rolesMenu").addClass('active');
    $('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
    });
  });
</script>