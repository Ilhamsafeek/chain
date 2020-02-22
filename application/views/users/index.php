
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
    
        <?php if($user_data){ ?>
            <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create new User</a>

            <div class="panel panel-dark-head">
                        <div class="panel-heading">
                          
                            <h4 class="panel-title">Show/Hide Columns Dynamically</h4>
                            <p>This example shows how to dynamically show and hide columns in a table.</p>
                        </div><!-- panel-heading -->

                        <table id="shTable" class="table table-striped table-bordered">
                            <thead class="">
                                <tr>
                                <th>Username</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Role</th>

                                        <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                        <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($user_data as $k => $v): ?>
                                        <tr>
                                            <td><?php echo $v['user_info']['username']; ?></td>
                                            <td><?php echo $v['user_info']['email']; ?></td>
                                            <td><?php echo $v['user_info']['firstname'] .' '. $v['user_info']['lastname']; ?></td>
                                            <td><?php echo $v['user_info']['phone']; ?></td>
                                            <td><?php echo $v['user_role']['role']; ?></td>

                                            <?php if(in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

                                                <td class="text-right">
                                                    <div class="btn-group">
                                                    <a class="dropdown-item" href="<?php echo base_url('users/edit/'.$v['user_info']['id']) ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['user_info']['id']; ?>"><i class="fa fa-trash"></i> Delete</a>

                                                    </div>


                                                </td>
                                            <?php endif; ?>
                                        </tr>

                                    

                                        <div class="modal inmodal" id="deleteModal<?php echo $v['user_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                        <h4 class="modal-title">Confirm Delete?</h4>
                                                    </div>
                                                    <form role="form" action="<?php echo base_url('users/delete/'.$v['user_info']['id']) ?>" method="post" id="issueForm">
                                                    <div class="confirmation-modal-body">
                                                       
                                                        <div class="modal-footer d-flex justify-content-around">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary" name="confirm" value="Confirm">Yes</button>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach ?>

                            </tbody>
                        </table>
                    </div><!-- panel -->
        <?php }else{ ?>
            <div class="notfoundpanel">
                
                    <div class="row">
                        <img src="https://plugin.intuitcdn.net/improved-inventory/2.4.29/images/aedd71ce8d4a14e839494d68e8de5cce.svg">
                    </div>
                    <div class="row text-center">
                        <h2><strong>Add a new user to manage your activities under roles</strong></h2>
                    </div>
                    <div class="row">
                        <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new user</a>
                    </div>
            </div>
        <?php }?>
   
       




        </div><!-- contentpanel -->
            </div><!-- mainpanel -->
        </div><!-- mainwrapper -->
    </section>

 
<script type="text/javascript">
  $(document).ready(function() {
   
    $("#profileMainMenu").addClass('active');
    $("#userMenu").addClass('active');
    
  });
</script>

