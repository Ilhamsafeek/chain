
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
              <?php echo $this->session->flashdata('errors'); ?>
            </div>
          <?php endif; ?>


        <?php if($supplier_data){ ?>
            <div class="row">
                <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>All Suppliers</h5>

                                <div class="ibox-tools">
                                    <a href="<?php echo base_url('suppliers/create') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create new Supplier</a>

                                </div>
                            </div>
                            <div class="ibox-content">
                             
                                <table id="shTable" class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>

                                        <?php if(in_array('updateSupplier', $user_permission) || in_array('deleteSupplier', $user_permission)): ?>
                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($supplier_data as $k => $v): ?>
                                        <tr>
                                            <td><a href="#" class="client-link"><?php echo $v['supplier_info']['name']; ?></a></td>
                                            <td><?php echo $v['supplier_info']['address']; ?></td>
                                            <td><?php echo $v['supplier_info']['phone']; ?></td>
                                            <td><?php echo $v['supplier_info']['email']; ?></td>
                                            <?php if($v['supplier_info']['status']=='pending') {
                                                $color = 'label label-warning';
                                            }else if($v['supplier_info']['status']=='sampling'){
                                                $color ='label label-info';

                                            }else if($v['supplier_info']['status']=='review'){
                                                $color ='label label-success';

                                            }else if($v['supplier_info']['status']=='approved'){
                                                $color ='label label-primary';

                                            }else if($v['supplier_info']['status']=='rejected') {
                                                $color = 'label label-danger';

                                            }else if($v['supplier_info']['status']=='reserved'){
                                                $color ='label label-plain';

                                            }
                                            ?>
                                            <td class="client-status"><span class="<?php echo $color; ?>"><?php echo $v['supplier_info']['status']; ?></span></td>
                                            <?php if(in_array('updateSupplier', $user_permission) || in_array('deleteSupplier', $user_permission)): ?>

                                                <td class="text-right">

                                                    <div class="btn-group">

                                                            <a class="dropdown-item" href="<?php echo base_url('suppliers/profile/'.$v['supplier_info']['id']) ?>"><i class="fa fa-pencil"></i> View/Edit</a>

                                                        <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['supplier_info']['id']; ?>"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>

                                                </td>

                                            <?php endif; ?>
                                        </tr>



                                <div class="modal inmodal" id="deleteModal<?php echo $v['supplier_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                        <h4 class="modal-title">Confirm Delete?</h4>
                                                    </div>
                                                    <form role="form" action="<?php echo base_url('suppliers/delete/'.$v['supplier_info']['id']) ?>" method="post" id="issueForm">
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
        <?php }else{ ?>


            <div class="row justify-content-center">
                <div class="col-sm-6 align-item-center">
                    <div class="row justify-content-center">
                        <img src="https://plugin.intuitcdn.net/improved-inventory/2.4.29/images/aedd71ce8d4a14e839494d68e8de5cce.svg">
                    </div>
                    <div class="row text-center">
                        <h2><strong>Add a new supplier and do a research by doing the procurement processes</strong></h2>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?php echo base_url('suppliers/create') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new Supplier</a>
                    </div>
                </div>
            </div>
        <?php }?>



    </div>
     
  
  <script type="text/javascript">
    $(document).ready(function() {
      
        $("#profileMainMenu").addClass('active');
        $("#suppliersMenu").addClass('active');
       
    });
  </script>


