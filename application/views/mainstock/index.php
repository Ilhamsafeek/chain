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

            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">

                            <div class="ibox-tools">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addModal">
                                        <i class="fa fa-plus"></i> New Material
                                    </button>

                                    <div class="modal fade" id="addModal" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="demoModalLabel">Add New Material</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" action="<?php echo base_url('mainstock/create') ?>" method="post">

                                                    <div class="confirmation-modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">

                                                                <div class="modal-body">

                                                                    <div class="row">

                                                                        <div class="col-sm-8">
                                                                            <div class="form-group">
                                                                                <label class="font-normal">Material Name</label>
                                                                                <input type="text" id="name" name="name" placeholder="Material Name" class="form-control" autocomplete="off" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="form-group">
                                                                                <label class="font-normal">Type</label>
                                                                                <select class="select_group" id="type" name="type" data-placeholder="Choose Type" style="width:100%;" required>
                                                                                    <option value=""></option>
                                                                                    <option value="Raw Material">Raw Material</option>
                                                                                    <option value="Packing Material">Packing Material</option>
                                                                                </select> </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label class="font-normal">Unit</label>
                                                                                <select class="select_group" id="type" name="unit" data-placeholder="Choose Unit" style="width:100%;" required>
                                                                                    <option value=""></option>
                                                                                    <option value="Kg">Kg</option>
                                                                                    <option value="g">g</option>
                                                                                    <option value="mg">mg</option>
                                                                                    <option value="l">l</option>
                                                                                    <option value="Pieces">Pieces</option>
                                                                                </select> </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label class="font-normal">R.O.L</label>
                                                                                <input type="text" id="reorderlevel" name="reorderlevel" placeholder="Re Order Level" class="form-control" autocomplete="off" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label class="font-normal">Price</label>
                                                                                <input type="text" id="price" name="price" placeholder="Unit Cost" class="form-control" autocomplete="off" required>
                                                                            </div>
                                                                        </div>

                                                                    </div>





                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-around">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                </form>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                       Main Stock Materials
                    </div>
                    <div class="panel-body">
                        <div class="ibox-content">
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
                                                        <a class="btn btn-default" data-toggle="modal" data-target="#editModal<?php echo $v['material_info']['id']; ?>"><i class="fa fa-edit"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (in_array('deleteUser', $user_permission)) : ?>
                                                        <a class="btn btn-default" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['material_info']['id']; ?>"><i class="fa fa-trash-o"></i></a>

                                                    <?php endif; ?>
                                                </td>
                                    </tr>

                                    <div class="modal fade" id="editModal<?php echo $v['material_info']['id']; ?>" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="demoModalLabel">Edit Material</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form role="form" action="<?php echo base_url('mainstock/editmaterial/' . $v['material_info']['id']) ?>" method="post" id="issueForm">


                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="modal-body">

                                                                <div class="row">

                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Material Name</label>
                                                                            <input type="text" id="name" name="name" placeholder="Material Name" class="form-control" autocomplete="off" value="<?php echo $v['material_info']['name']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Type</label>
                                                                            <select class="select_group" id="type" name="type" data-placeholder="Choose Type" style="width:100%;" required>
                                                                                <option value=""></option>
                                                                                <option value="Raw Material" <?php if ($v['material_info']['type'] == 'Raw Material') {
                                                                                                                    echo 'selected';
                                                                                                                } ?>>Raw Material</option>
                                                                                <option value="Packing Material" <?php if ($v['material_info']['type'] == 'Packing Material') {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>>Packing Material</option>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Unit</label>
                                                                            <select class="select_group" id="type" name="unit" data-placeholder="Choose Unit" style="width:100%;" required>
                                                                                <option value=""></option>
                                                                                <option value="Kg" <?php if ($v['material_info']['unit'] == 'Kg') {
                                                                                                        echo 'selected';
                                                                                                    } ?>>Kg</option>
                                                                                <option value="g" <?php if ($v['material_info']['unit'] == 'g') {
                                                                                                        echo 'selected';
                                                                                                    } ?>>g</option>
                                                                                <option value="mg" <?php if ($v['material_info']['unit'] == 'mg') {
                                                                                                        echo 'selected';
                                                                                                    } ?>>mg</option>
                                                                                <option value="l" <?php if ($v['material_info']['unit'] == 'l') {
                                                                                                        echo 'selected';
                                                                                                    } ?>>l</option>
                                                                                <option value="Pieces" <?php if ($v['material_info']['unit'] == 'Pieces') {
                                                                                                            echo 'selected';
                                                                                                        } ?>>Pieces</option>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">R.O.L</label>
                                                                            <input type="text" id="reorderlevel" name="reorderlevel" placeholder="Re Order Level" class="form-control" autocomplete="off" value="<?php echo $v['material_info']['reorderlevel']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label class="font-normal">Price</label>
                                                                            <input type="text" id="price" name="price" placeholder="Unit Cost" class="form-control" autocomplete="off" value="<?php echo $v['material_info']['price']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                </div>





                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-around">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="modal fade" id="deleteModal<?php echo $v['material_info']['id']; ?>" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="demoModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you Really want to delete?</p>
                                                </div>

                                                <form role="form" action="<?php echo base_url('mainstock/deletematerial/' . $v['material_info']['id']) ?>" method="post" id="issueForm">


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-primary">Yes</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
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
        $("#mainStockMenu").addClass('active');


    });
</script>