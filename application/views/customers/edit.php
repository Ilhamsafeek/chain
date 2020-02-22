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
        <h4>Edit Customer</h4>
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

    <div class="ibox " style="padding:80px">
      <div class="ibox-title">
        <form role="form" action="<?php base_url('customers/create') ?>" method="post">
          <div class="box-body">

            <?php echo validation_errors(); ?>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $customer_data['name'] ?>" autocomplete="off">
                </div>
              </div>
              <div class="col-md-8">

                <div class="form-group">
                  <label for="fname">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $customer_data['address'] ?>" autocomplete="off">
                </div>
              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $customer_data['email'] ?>" autocomplete="off">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $customer_data['phone'] ?>" autocomplete="off">
                </div>
              </div>
            </div>



          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="<?php echo base_url('customers/') ?>" class="btn btn-warning">Back</a>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!-- col-md-12 -->
  </div>
  <!-- /.row -->


</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {

    $("#profileMainMenu").addClass('active');
    $("#customersMenu").addClass('active');

  });
</script>