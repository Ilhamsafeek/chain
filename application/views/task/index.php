<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li>Manufacturing</li>
                </ul>
                <h4>Track Production</h4>
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
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i> Add task</button>
                                </span>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h3>To-do</h3>



                                            <?php if ($task_data) : ?>
                                                <?php foreach ($task_data as $k => $v) : ?>
                                                    <?php if ($v['task_info']['status'] == 'todo') : ?>

                                                        <div class="panel panel-primary widget-messaging">
                                                            <div class="panel-heading">
                                                                <div class="pull-right">
                                                                    <a style="color:white" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['task_info']['id']; ?>"><i class="fa fa-trash-o "></i></a>
                                                                </div><!-- pull-right -->
                                                                <h3 class="panel-title"><?php echo $v['task_info']['description']; ?></h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <p>Ingredients:</p>
                                                                <ul class="list-group">


                                                                    <?php foreach (json_decode($v['task_info']['ingredients'], true) as $ki => $vi) : ?>
                                                                        <li class="list-group-item">

                                                                            <strong class="pull-right"><?php echo $vi; ?></strong>
                                                                            <h4 class="sender"><?php echo $ki; ?></h4>

                                                                        </li>
                                                                    <?php endforeach ?>
                                                                </ul>
                                                                <div class="agile-detail">
                                                                    <i class="fa fa-clock-o"></i> Reserved
                                                                    <a href="#" class="float-right btn btn-xs btn-success" data-toggle="modal" data-target="#issueModal<?php echo $v['task_info']['id']; ?>">Issue</a>

                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="modal inmodal fade" id="issueModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h3>Issue Confirmation</h3>
                                                                    </div>
                                                                    <form role="form" action="<?php echo base_url('task/updatetask') ?>" method="post" id="issueForm">
                                                                        <input type="hidden" name="task_id" value="<?php echo $v['task_info']['id']; ?>">
                                                                        <input type="hidden" name="status" value="progress">
                                                                        <div class="modal-body">
                                                                            <p><strong>Do you really want to issue the ingredients?</strong></p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                                                            <button type="submit" class="btn btn-primary">Issue</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal inmodal fade" id="deleteModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h3>Delete Confirmation</h3>
                                                                    </div>
                                                                    <form role="form" action="<?php echo base_url('task/deletetask') ?>" method="post" id="issueForm">
                                                                        <input type="hidden" name="task_id" value="<?php echo $v['task_info']['id']; ?>">
                                                                        <div class="modal-body">
                                                                            <p><strong>Do you really want to delete?</strong></p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            <?php endif; ?>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h3>In Progress</h3>



                                            <?php if ($task_data) : ?>
                                                <?php foreach ($task_data as $k => $v) : ?>
                                                    <?php if ($v['task_info']['status'] == 'progress') : ?>


                                                        <div class="panel panel-warning widget-messaging">
                                                            <div class="panel-heading">
                                                                <div class="pull-right">
                                                                    <a href="#" data-toggle="modal" data-target="#revertModal<?php echo $v['task_info']['id']; ?>"><i class="fa fa-reply" aria-hidden="true"></i></a>&nbsp&nbsp
                                                                    <a href="#" data-toggle="modal" data-target="#deleteProgressModal<?php echo $v['task_info']['id']; ?>"><i class="fa fa-trash-o "></i></a>
                                                                </div><!-- pull-right -->
                                                                <h3 class="panel-title"><?php echo $v['task_info']['description']; ?></h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <p>Ingredients:</p>
                                                                <ul class="list-group">


                                                                    <?php foreach (json_decode($v['task_info']['ingredients'], true) as $ki => $vi) : ?>

                                                                        <li class="list-group-item">

                                                                            <strong class="pull-right"><?php echo $vi; ?></strong>
                                                                            <h4 class="sender"><?php echo $ki; ?></h4>

                                                                        </li>
                                                                    <?php endforeach ?>
                                                                </ul>
                                                                <div class="agile-detail">
                                                                    <i class="fa fa-clock-o"></i> <?php echo $v['task_info']['date_time_issued']; ?>
                                                                    <a href="#" class="float-right btn btn-xs btn-success" data-toggle="modal" data-target="#completeModal<?php echo $v['task_info']['id']; ?>">Complete</a>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="modal inmodal fade" id="deleteProgressModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h3>Delete Confirmation</h3>
                                                                    </div>
                                                                    <form role="form" action="<?php echo base_url('task/deletetask') ?>" method="post" id="issueForm">
                                                                        <input type="hidden" name="task_id" value="<?php echo $v['task_info']['id']; ?>">
                                                                        <div class="modal-body">
                                                                            <p><strong>Do you really want to delete?</strong></p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal inmodal fade" id="revertModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h3>Revert Confirmation</h3>
                                                                    </div>
                                                                    <form role="form" action="<?php echo base_url('task/updatetask') ?>" method="post" id="issueForm">
                                                                        <input type="hidden" name="task_id" value="<?php echo $v['task_info']['id']; ?>">
                                                                        <input type="hidden" name="status" value="todo">
                                                                        <div class="modal-body">
                                                                            <p><strong>Do you really want to revert the task?</strong></p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal inmodal fade" id="completeModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h3>Record Final Production</h3>
                                                                    </div>

                                                                    <form role="form" id="finalRecordForm" action="<?php echo base_url('task/completetask') ?>" method="post">
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="task_id" value="<?php echo $v['task_info']['id']; ?>">
                                                                            <div class="row">
                                                                                <table class="table" id="product_info_table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="width:35%">Product</th>
                                                                                            <th style="width:10%">Quantity</th>
                                                                                            <th style="width:10%">Damage</th>
                                                                                            <th style="width:5%"></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr id="row_<?php echo $v['task_info']['id']; ?>_1" name="<?php echo $v['task_info']['id']; ?>">
                                                                                            <td>
                                                                                                <select class="select_group product" data-placeholder="Choose Material" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" required>
                                                                                                    <option value=""></option>
                                                                                                    <?php foreach ($products as $k => $val) : ?>
                                                                                                        <option value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><input type="text" name="productqty[]" id="productqty_1" class="form-control" required></td>
                                                                                            <td><input type="text" name="damageqty[]" id="damageqty_1" class="form-control"></td>

                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>


                                                                            </div>
                                                                            <div class="box-footer">
                                                                                <button type="button" class="btn btn-default add-new-product" id="<?php echo $v['task_info']['id']; ?>"><i class="fa fa-plus"></i> Add Row
                                                                                </button>

                                                                            </div>
                                                                            <div class="row">
                                                                                <table class="table" id="return_material_info_table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="width:35%">Return Material</th>
                                                                                            <th style="width:10%">Quantity</th>
                                                                                            <th style="width:5%"></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr id="materialrow_<?php echo $v['task_info']['id']; ?>_1" name="<?php echo $v['task_info']['id']; ?>">
                                                                                            <td>
                                                                                                <select class="select_group return_material" data-placeholder="Choose Material" data-row-id="row_1" id="returnmaterial_1" name="returnmaterial[]" style="width:100%;">
                                                                                                    <option value=""></option>
                                                                                                    <?php foreach ($materials as $k => $value) : ?>
                                                                                                        <option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                                                                    <?php endforeach ?>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><input type="text" name="returnqty[]" id="returnqty_1" class="form-control"></td>

                                                                                        </tr>


                                                                                    </tbody>

                                                                                </table>

                                                                            </div>

                                                                            <div class="box-footer">
                                                                                <button type="button" class="btn btn-default add-new-return" id="<?php echo $v['task_info']['id']; ?>"><i class="fa fa-plus"></i> Add Row
                                                                                </button>

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            <?php endif; ?>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h3>Completed</h3>



                                            <?php if ($task_data) : ?>
                                                <?php foreach ($task_data as $k => $v) : ?>
                                                    <?php if ($v['task_info']['status'] == 'completed') : ?>


                                                        <div class="panel panel-success widget-messaging">
                                                            <div class="panel-heading">
                                                                <div class="pull-right">
                                                                    <a style="color:white" href="#" data-toggle="modal" data-target="#revertCompletedModal<?php echo $v['task_info']['id']; ?>"><i class="fa fa-reply"></i></a>

                                                                </div><!-- pull-right -->
                                                                <h3 class="panel-title"><?php echo $v['task_info']['description']; ?></h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <p>Ingredients:</p>
                                                                <ul class="list-group">


                                                                    <?php foreach (json_decode($v['task_info']['ingredients'], true) as $ki => $vi) : ?>
                                                                        <li class="list-group-item">

                                                                            <strong class="pull-right"><?php echo $vi; ?></strong>
                                                                            <h4 class="sender"><?php echo $ki; ?></h4>

                                                                        </li>
                                                                    <?php endforeach ?>
                                                                </ul>

                                                                <p>Production:</p>
                                                                <ul class="list-group">
                                                                    <?php if ($v['task_info']['production']) : ?>
                                                                        <?php foreach (json_decode($v['task_info']['production'], true) as $ki => $vi) : ?>
                                                                            <li class="list-group-item">


                                                                                <strong class="pull-right"><?php echo $vi; ?></strong>
                                                                                <h4 class="sender"><?php echo $ki; ?></h4>
                                                                            </li>
                                                                        <?php endforeach ?>
                                                                    <?php endif; ?>
                                                                </ul>

                                                                <?php if ($v['task_info']['return_materials']) : ?>
                                                                    <p>Return Materials:</p>

                                                                    <p class="font-bold  alert alert-info m-b-sm">
                                                                        <?php foreach (json_decode($v['task_info']['return_materials'], true) as $ki => $vi) : ?>

                                                                            <?php echo $ki; ?>:</strong><?php echo $vi; ?>

                                                                        <?php endforeach ?>
                                                                    </p>



                                                                <?php endif; ?>

                                                                <?php if ($v['task_info']['damage']) : ?>
                                                                    <p>Damage:</p>
                                                                    <p class="font-bold  alert alert-warning m-b-sm">
                                                                        <?php foreach (json_decode($v['task_info']['damage'], true) as $ki => $vi) : ?>

                                                                            <?php echo $ki; ?>:</strong><?php echo $vi; ?>

                                                                        <?php endforeach ?>
                                                                    </p>
                                                                <?php endif; ?>
                                                                <div class="agile-detail">
                                                                    <i class="fa fa-clock-o"></i> <?php echo $v['task_info']['date_time_completed']; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal inmodal fade" id="revertCompletedModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                        <h3>Revert Confirmation</h3>
                                                                    </div>
                                                                    <form role="form" action="<?php echo base_url('task/updatetask') ?>" method="post" id="issueForm">
                                                                        <input type="hidden" name="task_id" value="<?php echo $v['task_info']['id']; ?>">
                                                                        <input type="hidden" name="status" value="progress">
                                                                        <div class="modal-body">
                                                                            <p><strong>Do you really want to revert the task?</strong></p>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Discard</button>
                                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            <?php endif; ?>


                                        </div>
                                    </div>
                                </div>

                                <div class="modal inmodal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title">Add New Task</h4>
                                                </small>
                                            </div>

                                            <form role="form" action="<?php echo base_url('task/createtask') ?>" method="post" id="createForm">

                                                <div class="modal-body">

                                                    <div id="messages"></div>
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label class="col-form-label" for="description">Description</label>
                                                                <input type="text" id="description" name="description" value="" placeholder="Description" class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <table class="table" id="material_info_table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:35%">Material</th>
                                                                    <th style="width:10%">Quantity</th>
                                                                    <th style="width:5%"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="row_1">
                                                                    <td>
                                                                        <select class="select_group material" data-placeholder="Choose Material"  data-row-id="row_1" id="material_1" name="material[]" style="width:100%;" required>
                                                                            <option value=""></option>
                                                                            <?php foreach ($materials as $k => $v) : ?>
                                                                                <option value="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" name="qty[]" id="qty_1" class="form-control" required>
                                                                    </td>
                                                                    <td>
                                                                        <a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="box-footer">
                                                            <button type="button" class="btn btn-default add-new"><i class="fa fa-plus"></i> Add
                                                                Row
                                                            </button>

                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
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

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".select_group").select2();

            $("#manufacturingMainMenu").addClass('active');
            $("#taskMenu").addClass('active');

            // Append table with add row form on add new button click ==Add new Task==
            $(".add-new").click(function() {
                var base_url = "<?php echo base_url(); ?>";


                var index = $("table tbody tr:last-child").index();
                var actions = $("table td:last-child").html();
                var table = $("#material_info_table");
                var count_table_tbody_tr = $("#material_info_table tbody tr").length;
                var row_id = count_table_tbody_tr + 1;

                $.ajax({
                    url: base_url + '/task/getMaterialRow/',
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {

                        var html = '<tr id="row_' + row_id + '">' +
                            '<td>' +
                            '<select class="select_group material" data-placeholder="Choose Material" data-row-id="' + row_id + '" id="material_' + row_id + '" name="material[]" style="width:100%;" >' +
                            '<option value=""></option>';
                        $.each(response, function(index, value) {
                            html += '<option value="' + value.name + '">' + value.name + '</option>';
                        });

                        html += '</select>' +
                            '</td>' +
                            '<td><input type="text" name="qty[]" id="qty_' + row_id + '" class="form-control"></td>' +
                            '<td><a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a></td>' +
                            '</tr>';

                        if (count_table_tbody_tr >= 1) {
                            $("#material_info_table tbody tr:last").after(html);
                        } else {
                            $("#material_info_table tbody").html(html);
                        }

                        $("#material_" + row_id).select2();
                    }
                });
            })

            // Append table with add row form on add new button click ==Add Return Material==
            $(".add-new-return").click(function() {
                var base_url = "<?php echo base_url(); ?>";
                var row_name = this.id;

                var index = $("table tbody tr:last-child").index();
                var actions = $("table td:last-child").html();
                var table = $("#return_material_info_table");
                var count_table_tbody_tr = $('#return_material_info_table tbody tr[name="' + row_name + '"]').length;
                var row_index = count_table_tbody_tr + 1;

                $.ajax({
                    url: base_url + '/task/getMaterialRow/',
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {

                        var html = '<tr id="materialrow_' + row_name + '_' + row_index + '" name="' + row_name + '">' +
                            '<td>' +
                            '<select class="select_group return_material" data-placeholder="Choose Material" data-row-id="' + row_index + '" id="returnmaterial_' + row_index + '" name="returnmaterial[]" style="width:100%;" >' +
                            '<option value=""></option>';
                        $.each(response, function(index, value) {
                            html += '<option value="' + value.name + '">' + value.name + '</option>';
                        });

                        html += '</select>' +
                            '</td>' +
                            '<td><input type="text" name="returnqty[]" id="returnqty_' + row_index + '" class="form-control"></td>' +
                            '<td><a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a></td>' +
                            '</tr>';

                        if (count_table_tbody_tr >= 1) {
                            $('tr[id="materialrow_' + row_name + '_' + count_table_tbody_tr + '"]').after(html);
                        } else {
                            $("#return_material_info_table tbody").html(html);
                        }
                        $("#returnmaterial_" + row_index).select2();

                    }
                });
            })

            // Append table with add row form on add new button click ==Add new Product==
            $(".add-new-product").click(function() {
                var base_url = "<?php echo base_url(); ?>";
                var row_name = this.id;

                var index = $("table tbody tr:last-child").index();
                var actions = $("table td:last-child").html();
                var table = $("#product_info_table");
                var count_table_tbody_tr = $('#product_info_table tbody tr[name="' + row_name + '"]').length;
                var row_index = count_table_tbody_tr + 1;
                $.ajax({
                    url: base_url + '/task/getProductRow/',
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {

                        var html = '<tr id="row_' + row_name + '_' + row_index + '" name="' + row_name + '">' +
                            '<td>' +
                            '<select class="select_group product" data-placeholder="Choose Material" data-row-id="' + row_index + '" id="product_' + row_index + '" name="product[]" style="width:100%;" >' +
                            '<option value=""></option>';
                        $.each(response, function(index, value) {
                            html += '<option value="' + value.name + '">' + value.name + '</option>';
                        });

                        html += '</select>' +
                            '</td>' +
                            '<td><input type="text" name="productqty[]" id="productqty_' + row_index + '" class="form-control"></td>' +
                            '<td><input type="text" name="damageqty[]" id="damageqty_' + row_index + '" class="form-control"></td>' +
                            '<td><a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a></td>' +
                            '</tr>';

                        if (count_table_tbody_tr >= 1) {
                            $('tr[id="row_' + row_name + '_' + count_table_tbody_tr + '"]').after(html);
                        } else {
                            $("#product_info_table tbody").html(html);
                        }

                        $("#product_" + row_index).select2();
                    }
                });
            })




            // Delete row on delete button click
            $(document).on("click", ".delete", function() {

                $(this).parents("tr").remove();

            });
        });
    </script>