<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li>Stock</li>
                </ul>
                <h4>Finished Products</h4>
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

        <div class="row">
            <div class="col-lg-5">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="chain.html" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                            <a href="chain.html" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <h3 class="panel-title">Add Final Production Details</h3>
                    </div>
                    <div class="panel-body">


                        <form role="form" action="<?php base_url('finalstock/') ?>" method="post">
                            <?php echo validation_errors(); ?>


                            <div class="form-group row"><label class="col-lg-2 col-form-label">Product Name</label>

                                <div class="col-lg-10"><input type="text" id="name" name="name" placeholder="Product Name" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-2 col-form-label">Unit</label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="type" name="unit">
                                        <option value="">Select Unit</option>
                                        <option value="Kg">Kg</option>
                                        <option value="g">g</option>
                                        <option value="mg">mg</option>
                                        <option value="l">l</option>
                                        <option value="Pieces">Pieces</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">R.O.L</label>

                                <div class="col-lg-10"><input type="text" id="reorderlevel" name="reorderlevel" placeholder="Re Order Level" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-2 col-form-label">Price</label>

                                <div class="col-lg-10"><input type="text" id="price" name="price" placeholder="Unit Cost" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- panel-body -->
                </div><!-- panel -->



            </div>
            <div class="col-lg-7">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="chain.html" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                            <a href="chain.html" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <h3 class="panel-title">Manage Products</h3>
                    </div>
                    <div class="panel-body">
                        <table id="shTable" class="footable table table-stripped table-hover" data-page-size="8" data-filter=#filter>
                            <thead>
                                <tr>

                                    <th>Product</th>
                                    <th>Unit</th>
                                    <th>R O L</th>
                                    <th>Price</th>
                                    <?php if (in_array('updateUser', $user_permission) && in_array('deleteUser', $user_permission)) : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <?php if ($product_data) : ?>
                                        <?php foreach ($product_data as $k => $v) : ?>

                                            <td><span class="client-link"><?php echo $v['product_info']['name']; ?></span></td>
                                            <td class="text-navy"><?php echo $v['product_info']['unit']; ?></td>
                                            <td class="text-primary"><?php echo $v['product_info']['reorderlevel']; ?></td>
                                            <td class="text-danger"><?php echo $v['product_info']['price']; ?></td>
                                            <td>
                                                <?php if (in_array('updateUser', $user_permission)) : ?>
                                                    <a class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if (in_array('deleteUser', $user_permission)) : ?>
                                                    <a class="btn btn-default" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['product_info']['id']; ?>"><i class="fa fa-trash-o"></i></a>

                                                <?php endif; ?>
                                            </td>
                                </tr>

                                <div class="modal inmodal" id="deleteModal<?php echo $v['product_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                <h4 class="modal-title">Confirm Delete?</h4>
                                            </div>
                                            <form role="form" action="<?php echo base_url('finalstock/deleteproduct/' . $v['product_info']['id']) ?>" method="post" id="issueForm">
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
                        <?php endif; ?>

                            </tbody>
                        </table>
                    </div><!-- panel-body -->
                </div><!-- panel -->






            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Stock </h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th></th>
                                        <th>Material </th>
                                        <th>Type </th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" checked class="i-checks" name="input[]"></td>
                                        <td>Project<small>This is example of project</small></td>
                                        <td><span class="pie">0.52/1.561</span></td>
                                        <td>20%</td>
                                        <td>Jul 14, 2013</td>
                                        <td>
                                            <span class="label label-warning">Low stock</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $(".select_group").select2();

            $("#stockMainMenu").addClass('active');
            $("#finishedProductsMenu").addClass('active');

        });
    </script>