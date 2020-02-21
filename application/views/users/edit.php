
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
                            <h4>Users</h4>
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

          <div class="ibox ">
                  <div class="ibox-title">
            <form role="form" action="<?php base_url('users/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

       
              <div class="row">
              <div class="col-md-4">
                
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['username'] ?>" autocomplete="off">
                </div>

              </div>

              <div class="col-md-4">  
                <div class="form-group">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name"  value="<?php echo $user_data['firstname'] ?>" autocomplete="off">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name"  value="<?php echo $user_data['lastname'] ?>" autocomplete="off">
                </div>
              </div>
              </div>
              
              <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="<?php echo $user_data['email'] ?>" autocomplete="off">
                </div>
                </div>
                
                <div class="col-md-4">
                <div class="form-group">
                  <label for="roles">Role</label>
                
                  <select class="form-control material" name="role" data-placeholder="Select role" class="width300">                  
                    <option value="">Select Role</option>
                  <?php foreach ($role_data as $k => $v): ?>
                      <option value="<?php echo $v['id'] ?>" <?php if($v['id']==$user_data['role_id']){ echo 'selected';}?>><?php echo $v['role'] ?></option>
                    <?php endforeach ?>
                  </select>

                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1" <?php if($user_data['gender'] == 1) {
                        echo "checked";
                      } ?>>
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2" <?php if($user_data['gender'] == 2) {
                        echo "checked";
                      } ?>>
                      Female
                    </label>
                  </div>
                </div>
                </div>
               
                <div class="col-md-12">
                <div class="form-group">
                  <div class="alert alert-info alert-dismissible" role="alert">
                      Leave the password field empty if you don't want to change.
                  </div>
                </div>                
                </div>  
                     
               
                 <div class="col-md-4">
                 <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>
                 </div>       
                
                 <div class="col-md-4">      
                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>
                </div>
               
              </div>        
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning">Back</a>
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
    $("#userMenu").addClass('active');
    
  });
</script>
