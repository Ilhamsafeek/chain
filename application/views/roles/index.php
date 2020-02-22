
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
                            <h4>Roles</h4>
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

                <?php if($roles_data){ ?>
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>All Roles</h5>
                            <?php if(in_array('createRole', $user_permission)): ?>
                            <div class="ibox-tools">
                                <a href="<?php echo base_url('roles/create') ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Create new Role</a>
                            </div>

                            <br /> <br />
                            <?php endif; ?>
                            
                        </div>
                        <div class="ibox-content">
                          
                            <div class="project-list">

                                <table id="shTable" class="table table-hover">
                                    <tbody>

                                    <?php foreach ($roles_data as $k => $v): ?>
                                    <tr>
                                        <a href="">
                                        <td class="project-status">
                                            <span class="label label-primary">Active</span>
                                        </td>
                                        <td class="project-title">
                                            <a><?php echo $v['role']; ?></a>

                                        </td>
                                        <td class="project-completion">
                                                <p>
                                                    <?php 
                                                   
                                                   
                                                   foreach (unserialize($v['permission']) as $value) {?>
                                                        <span class="label label-default"><?php echo $value; ?></span>
                                                       
                                                   <?php } ?>
                                                    
                                                </p>
                                                
                                        </td>
                                       
                                        <?php if(in_array('updateRole', $user_permission) || in_array('deleteRole', $user_permission)): ?>
                        <td class="project-actions">
                          <?php if(in_array('updateRole', $user_permission)): ?>

                          <a href="<?php echo base_url('roles/edit/'.$v['id']) ?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                          <?php endif; ?>
                          <?php if(in_array('deleteRole', $user_permission)): ?>
                          <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['id']; ?>" class="btn btn-white btn-sm demo3"><i class="fa fa-trash"></i> Delete </a>

                          <?php endif; ?>
                        </td>
                        <?php endif; ?>
                                        </a>

                                    </tr>
                                  
                                        <div class="modal inmodal" id="deleteModal<?php echo $v['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                        <h4 class="modal-title">Confirm Delete?</h4>
                                                    </div>
                                                    <form role="form" action="<?php echo base_url('roles/delete/'.$v['id']) ?>" method="post" id="issueForm">
                                                    <div class="confirmation-modal-body">
                                                       
                                                        <div class="modal-footer d-flex justify-content-around">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-success" name="confirm" value="Confirm">Yes</button>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>


                    <div class="row justify-content-center">
                        <div class="col-sm-6 align-item-center">
                            <div class="row justify-content-center">
                                <img src="https://plugin.intuitcdn.net/improved-inventory/2.4.29/images/aedd71ce8d4a14e839494d68e8de5cce.svg">
                            </div>
                            <div class="row text-center">
                                <h2><strong>Add roles to manage the system by giving permission to each</strong></h2>
                            </div>
                            <div class="row justify-content-center">
                                <a href="<?php echo base_url('roles/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new Role</a>
                            </div>
                        </div>
                    </div>

                <?php }?>

            </div>
            </div>
 
  
            <script>
        $(document).ready(function(){
          $("#profileMainMenu").addClass('active');
          $("#rolesMenu").addClass('active');
           
        });
    </script>           