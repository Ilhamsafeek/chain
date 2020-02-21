
        <div class="mainpanel">
                <div class="pageheader">
                    <div class="media">
                        <div class="pageicon pull-left">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="media-body">
                            <ul class="breadcrumb">
                                <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
                                <li>Users</li>
                            </ul>
                            <h4>Creare User</h4>
                        </div>
                    </div><!-- media -->
                </div><!-- pageheader -->
         <div class="contentpanel">
                 
                <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box" style="padding:80px">
           

            <div class="ibox ">
                  <div class="ibox-title">


                <form role="form" action="<?php base_url('suppliers/create') ?>" method="post">
                <?php echo validation_errors(); ?>
                
                <div class="row">
                  <div class="col-md-4">
                     
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Supplier Name" autocomplete="off">
                </div>
                  </div>
                  <div class="col-md-8">
                  <div class="form-group">
                  <label for="address">Address</label>
                  <input type="address" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label for="web">Web</label>
                        <input type="text" class="form-control" id="web" name="web" placeholder="Web" autocomplete="off">
                    </div>

                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" class="form-control" id="source" name="source" placeholder="Source" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                        <label for="overview">Overview</label>
                        <textarea type="text" id="overview" name="overview" placeholder="Overview" class="form-control" autocomplete="off">
                    </textarea>
                </div>
                  </div>
                  
                    
                    </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('suppliers/') ?>" class="btn btn-warning">Back</a>
              </div>
              </form>
              </div>
              <!-- /.box-body -->


            </div>
                </div>

            </div>
        </div>
</div>
      

 
<script>
        $(document).ready(function(){
          $("#profileMainMenu").addClass('active');
          $("#suppliersMenu").addClass('active');
       
        });
    </script>