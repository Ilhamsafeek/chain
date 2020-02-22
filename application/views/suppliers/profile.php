
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
                            <h4>Supplier Profile</h4>
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




    <div class="row">
    <div class="col-lg-9">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                            <a href="<?php echo base_url('suppliers') ?>" class="btn btn-primary btn-xs"><i class="fa fa-unsorted"></i> All Suppliers</a>

                                <a href="<?php echo base_url('suppliers/edit/'.$supplier_data['id']) ?>" class="btn btn-white btn-xs float-right">Edit profile</a>
                                <h2><?php echo $supplier_data['name']; ?></h2>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if($supplier_data['status']=='pending') {
                                    $color = 'label label-warning';

                                }else if($supplier_data['status']=='review'){
                                $color ='label label-success';

                                }else if($supplier_data['status']=='sampling'){
                                $color ='label label-info';

                                }else if($supplier_data['status']=='approved'){
                                $color ='label label-primary';

                                }else if($supplier_data['status']=='rejected') {
                                $color = 'label label-danger';

                                }else if($supplier_data['status']=='reserved'){
                                $color ='label label-plain';

                                }
                                ?>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right"><dt>Status:</dt> </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1">
                                 
                                    <div class="btn-group">
                                           <button type="button" class="btn btn-xs <?php echo $color; ?>"><?php echo $supplier_data['status'];?></button>
                                           <button type="button" class="btn btn-xs <?php echo $color; ?> dropdown-toggle" data-toggle="dropdown">
                                              <span class="caret"></span>

                                            </button>
                                            <div class="dropdown-menu" id="dropdown">
                                            <form action="<?php echo base_url('suppliers/updatestatus/'.$supplier_data['id']); ?>" method="post">

                                                <button type="submit" id="status" name="status" value="pending" class="dropdown-item">Make Pending</button>
                                                <button type="submit" id="status" name="status" value="review" class="dropdown-item">Make Review</button>
                                                <button type="submit" id="sampling" name="status" value="sampling" class="dropdown-item">Make Sampling</button>
                                                <button type="submit" id="status" name="status" value="approved" class="dropdown-item">Make Approved</button>
                                                <button type="submit" id="status" name="status" value="rejected" class="dropdown-item">Make Rejected</button>
                                                <button type="submit" id="status" name="status" value="reserved" class="dropdown-item">Make Reserved</button>
                                            </form>

                                        </div>
                                    </div>

                                    </dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right"><dt>Web:</dt> </div>
                                <div class="col-sm-8 text-sm-left"><dd class="mb-1"> <?php echo $supplier_data['web']; ?></dd> </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right"><dt>Email:</dt> </div>
                                <div class="col-sm-8 text-sm-left"> <dd class="mb-1">  <?php echo $supplier_data['email']; ?></dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right"><dt>Contact:</dt> </div>
                                <div class="col-sm-8 text-sm-left"> <dd class="mb-1"><a href="#"> <?php echo $supplier_data['phone']; ?></a> </dd></div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right"><dt>Source:</dt> </div>
                                <div class="col-sm-8 text-sm-left"> <dd class="mb-1"><a href="#" class="text-navy"> <?php echo $supplier_data['source']; ?></a> </dd></div>
                            </dl>


                        </div>
                        <div class="col-lg-6" id="cluster_info">

                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Country:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1">Sri Lanka</dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Address:</dt>
                                </div>
                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1"> <?php echo $supplier_data['address']; ?></dd>
                                </div>
                            </dl>
                            <dl class="row mb-0">
                                <div class="col-sm-4 text-sm-right">
                                    <dt>Experience:</dt>
                                </div>

                                <div class="col-sm-8 text-sm-left">
                                    <dd class="mb-1">8 years</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                  
                    <div class="row m-t-sm">
                        <div class="col-lg-12">
                            <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li><a class="nav-link active" href="#tab-1" data-toggle="tab">Review Records</a></li>
                                            <?php if($supplier_data['status']!='pending'): ?>
                                            <li><a class="nav-link" href="#tab-2" data-toggle="tab">Sampling</a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">

                                            <div class="feed-element">

                                                <div class="media-body ">
                                                    <strong>New Entry</strong><br>

                                                        <form action="<?php echo base_url('suppliers/createreview/'.$supplier_data['id']); ?>" method="post">
                                                            <div class="well">
                                                                <?php echo validation_errors(); ?>
                                                                <div class="col-sm-8 form-group">
                                                                    <input type="text" id="source" name="source" placeholder="Source" class="form-control" autocomplete="off">
                                                                </div>
                                                        <div class="col-sm-12 form-group">
                                                            <label for="permission">Review</label>

                                                            <textarea type="text" id="review" name="review" placeholder="Review" class="form-control" autocomplete="off">
                                                            </textarea>
                                                        </div>

                                                    </div>
                                                            <div class="float-right">
                                                                <button type="submit" class="btn btn-xs btn-warning">Record</button>
                                                            </div>
                                                        </form>

                                                </div>
                                            </div>
                                            <div class="feed-activity-list">

                                                <?php if($supplier_review_data): ?>
                                                <?php foreach ($supplier_review_data as $k => $v): ?>

                                                <div class="feed-element">

                                                    <a href="#" class="float-left">
                                                        <i class="fa fa-comments"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="float-right" data-toggle="modal"
                                                           data-target="#deleteModal<?php echo $v['supplier_review_info']['id']; ?>"><i class="fa fa-trash"></i></a>
                                                        <strong>Source :</strong>  <?php echo $v['supplier_review_info']['source']; ?> <br>
                                                        <small class="text-muted"><?php echo $v['supplier_review_info']['date_time']; ?></small>
                                                        <div class="well">
                                                            <?php echo $v['supplier_review_info']['review']; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal<?php echo $v['supplier_review_info']['id']; ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3>Delete Confirmation</h3>

                                                                        <button type="button" class="close" data-dismiss="modal"><span
                                                                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                    </div>

                                                                    <form role="form" action="<?php echo base_url('suppliers/deletereview/'.$v['supplier_review_info']['id'].'/'.$v['supplier_review_info']['supplier_id']); ?>" method="post" id="removeForm">
                                                                        <div class="modal-body">
                                                                            <p>Do you really want to remove?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Remove</button>
                                                                        </div>
                                                                    </form>


                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                <?php endforeach; ?>
                                                <?php endif; ?>



                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab-2">

                                            <div class="feed-element">

                                                <div class="media-body ">
                                                    <strong>Request Sample</strong><br>
                                                    <form action="<?php echo base_url('suppliers/createsample/'.$supplier_data['id']); ?>" method="post">

                                                    <div class="well">

                                                            <div class="col-sm-4 form-group">
                                                                <input id="item" name="item" type="text" placeholder="Item" class="form-control">
                                                            </div>

                                                        <div class="col-sm-12 form-group">
                                                            <label for="permission">Note</label>
                                                        <textarea id="note" name="note" type="text" placeholder="Note" class="form-control">
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <button type="submit" class="btn btn-xs btn-primary">Request</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <?php if($supplier_sample_data): ?>

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Time</th>
                                                    <th>Material</th>
                                                    <th>Note</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($supplier_sample_data as $k => $v): ?>

                                                <tr>
                                                    <td>
                                                        <span class="label label-primary"><i class="fa fa-check"></i> <?php echo $v['supplier_sample_info']['status']; ?></span>
                                                    </td>
                                                    <td>
                                                        <?php echo $v['supplier_sample_info']['date_time']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $v['supplier_sample_info']['item']; ?>
                                                    </td>

                                                    <td>
                                                        <p class="small">
                                                            <?php echo $v['supplier_sample_info']['note']; ?>
                                                        </p>
                                                    </td>
                                                    <td>

                                                            <a class="btn-white btn btn-xs" href=""><i class="fa fa-pencil"></i> Edit</a>
                                                            <a class="btn-white btn btn-xs" href=""><i class="fa fa-trash"></i> Delete</a>
                                                    </td>

                                                </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                            <?php endif;?>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="wrapper wrapper-content project-manager">
            <h4>Supplier Overview</h4>
            <img src="img/zender_logo.png" class="img-fluid">
            <p class="small">
                <?php echo $supplier_data['overview']; ?>
            </p>
            <p class="small font-bold">
                <span><i class="fa fa-circle text-warning"></i> High priority</span>
            </p>
            <h5>service tag</h5>
            <ul class="tag-list" style="padding: 0">
                <li><a href=""><i class="fa fa-tag"></i> Sugar</a></li>
                <li><a href=""><i class="fa fa-tag"></i> Baking Powder</a></li>
                <li><a href=""><i class="fa fa-tag"></i> Colour Powder</a></li>
                <li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
            </ul>

            <h5>Related files</h5>
            <ul class="list-unstyled project-files">
                <li><a href=""><i class="fa fa-file"></i> Project_document.docx</a></li>
                <li><a href=""><i class="fa fa-file-picture-o"></i> Logo_zender_company.jpg</a></li>
                <li><a href=""><i class="fa fa-stack-exchange"></i> Email_from_Alex.mln</a></li>
                <li><a href=""><i class="fa fa-file"></i> Contract_20_11_2014.docx</a></li>
            </ul>
            <span><i class="fa fa-rectangle text-warning"></i> Change State</span>

            <form action="<?php echo base_url('suppliers/updatestatus/'.$supplier_data['id']) ?>" method="post">
            <div class="text-center m-t-md">

                <button type="submit" href="#" class="btn btn-xs btn-primary" id="status" name="status" value="approved">Add files</button>
                <button type="submit" href="#" class="btn btn-xs btn-warning" id="status" name="status" value="approved">Approve Supplier</button>

            </div>
            </form>
        </div>
    </div>
</div>

</div>


<script type="text/javascript">
    $(document).ready(function() {
    
        $("#profileMainMenu").addClass('active');
          $("#suppliersMenu").addClass('active');
       
    });
  </script>
