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
                <h4>Main Stock</h4>
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
                        <h3 class="panel-title">Add Main Stock Material</h3>
                    </div>
                    <div class="panel-body">

                        <form role="form" action="<?php base_url('mainstock/') ?>" method="post">
                            <?php echo validation_errors(); ?>


                            <div class="form-group row"><label class="col-lg-2 col-form-label">Material Name</label>

                                <div class="col-lg-10"><input type="text" id="name" name="name" placeholder="Material Name" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                
                            <div class="form-group"> 
                                <label class="col-lg-2 col-form-label">Type</label>
                                <div class="col-md-10">
                                    <select class="select_group" id="type" name="type" data-placeholder="Choose Type" style="width:100%;">
                                        <option value=""></option>
                                        <option value="Raw Material">Raw Material</option>
                                        <option value="Packing Material">Packing Material</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Unit</label>
                                <div class="col-md-10">
                                    <select class="select_group" id="type" name="unit" data-placeholder="Choose Unit" style="width:100%;">
                                        <option value=""></option>
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


                    </div>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="chain.html" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                            <a href="chain.html" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <h3 class="panel-title">Manage Materials</h3>
                    </div>
                    <div class="panel-body">
                        <table id="shTable" class="footable table table-stripped table-hover" data-page-size="8" data-filter=#filter>
                            <thead>
                                <tr>

                                    <th>Material</th>
                                    <th>Type</th>
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

                                    <?php if ($material_data) : ?>
                                        <?php foreach ($material_data as $k => $v) : ?>

                                            <td><span class="client-link"><?php echo $v['material_info']['name']; ?></span></td>
                                            <td><?php echo $v['material_info']['type']; ?></td>
                                            <td class="text-navy"><?php echo $v['material_info']['unit']; ?></td>
                                            <td class="text-primary"><?php echo $v['material_info']['reorderlevel']; ?></td>
                                            <td class="text-danger"><?php echo $v['material_info']['price']; ?></td>
                                            <td>
                                                <?php if (in_array('updateUser', $user_permission)) : ?>
                                                    <a class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if (in_array('deleteUser', $user_permission)) : ?>
                                                    <a class="btn btn-default" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['material_info']['id']; ?>"><i class="fa fa-trash-o"></i></a>

                                                <?php endif; ?>
                                            </td>
                                </tr>

                                <div class="modal inmodal" id="deleteModal<?php echo $v['material_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                    <h4 class="modal-title">Confirm Delete?</h4>
                                                </div>
                                                <form role="form" action="<?php echo base_url('mainstock/deletematerial/' . $v['material_info']['id']) ?>" method="post" id="issueForm">
                                                    <div class="confirmation-modal-body">

                                                        <div class="modal-footer d-flex justify-content-around">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary" name="confirm" value="Confirm">Yes</button>
                                                        </div>
                                                    </div>


                                                </form>
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
       
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".select_group").select2();

            $("#stockMainMenu").addClass('active');
            $("#mainStockMenu").addClass('active');


        });
    </script>