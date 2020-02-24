<div class="mainpanel">
  <div class="pageheader">
    <div class="media">
      <div class="pageicon pull-left">
        <i class="fa fa-home"></i>
      </div>
      <div class="media-body">
        <ul class="breadcrumb">
          <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
          <li>Settings</li>
        </ul>
        <h4>Company</h4>
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



    <div class="ibox ">
      <div class="ibox-title">

        <div class="ibox-content">

          <form role="form" action="<?php base_url('company/update') ?>" method="post">
            <div class="box-body">

              <?php echo validation_errors(); ?>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?php echo $company_data['company_name'] ?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?php echo $company_data['address'] ?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="service_charge_value">Charge Amount (%)</label>
                    <input type="text" class="form-control" id="service_charge_value" name="service_charge_value" placeholder="Enter charge amount %" value="<?php echo $company_data['service_charge_value'] ?>" autocomplete="off">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="vat_charge_value">Vat Charge (%)</label>
                    <input type="text" class="form-control" id="vat_charge_value" name="vat_charge_value" placeholder="Enter vat charge %" value="<?php echo $company_data['vat_charge_value'] ?>" autocomplete="off">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="<?php echo $company_data['country'] ?>" autocomplete="off">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="<?php echo $company_data['phone'] ?>" autocomplete="off">
                  </div>

                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="permission">Message</label>
                    <textarea class="form-control" id="message" name="message"><?php echo $company_data['message']; ?></textarea>
                  </div>

                </div>


              </div>






            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>




  <script type="text/javascript">
    $(document).ready(function() {
      $("#companyMainNav").addClass('active');
      $("#message").wysihtml5();
    });
  </script>