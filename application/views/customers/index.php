
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
                            <h4>Customers</h4>
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
          
          
          
          <!-- /.box -->


        <?php if($customer_data){ ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>All Customers</h5>

                                <div class="ibox-tools">
                                    <a href="<?php echo base_url('customers/create') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create new Customer</a>

                                </div>
                            </div>
                            <div class="ibox-content">
                              
                                <table id="shTable" class="footable table table-stripped table-hover" data-page-size="8" data-filter=#filter>
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>

                                        <?php if(in_array('updateCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>
                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                        <?php endif; ?>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <?php foreach ($customer_data as $k => $v): ?>
                                        <tr>
                                            <td><a href="#" class="client-link"><?php echo $v['customer_info']['name']; ?></a></td>
                                            <td><?php echo $v['customer_info']['address']; ?></td>
                                            <td><?php echo $v['customer_info']['phone']; ?></td>
                                            <td><?php echo $v['customer_info']['email']; ?></td>
                                            <td class="client-status"><span class="label label-primary">Active</span></td>
                                            <?php if(in_array('updateCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>

                                                <td class="text-right">

                                                    <div class="btn-group">
                                                    <a class="dropdown-item" href="<?php echo base_url('customers/edit/'.$v['customer_info']['id']) ?>" ><i class="fa fa-pencil"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['customer_info']['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>

                                                </td>

                                            <?php endif; ?>
                                        </tr>
                  
                                        <div class="modal inmodal" id="deleteModal<?php echo $v['customer_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                        <h4 class="modal-title">Confirm Delete?</h4>
                                                    </div>
                                                    <form role="form" action="<?php echo base_url('customers/delete/'.$v['customer_info']['id']) ?>" method="post" id="issueForm">
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
                                    <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <ul class="pagination float-right"></ul>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }else{ ?>


            <div class="notfoundpanel">
                
            <div class="row">
                        <img src="https://plugin.intuitcdn.net/improved-inventory/2.4.29/images/aedd71ce8d4a14e839494d68e8de5cce.svg">
                    </div>
                   <div class="row">
                       <h2><strong>Add your Existing customers to create your next invoice or receipt</strong></h2>
                   </div>
                    <div class="row">
                       <a href="<?php echo base_url('customers/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new Customer</a>
                    </div>
        </div>

        <?php }?>
    </div>
     
    <script type="text/javascript">
  $(document).ready(function() {
   
    $("#profileMainMenu").addClass('active');
    $("#customersMenu").addClass('active');
    
  });
</script>