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
                <h4>All Tasks</h4>
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


                        </div>
                        <div class="ibox-content">

                            <table id="shTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th data-toggle="true">Task</th>
                                        <th data-hide="phone">Start Time</th>
                                        <th data-hide="phone">End Time</th>
                                        <th data-hide="all">Ingredients</th>
                                        <th data-hide="phone,tablet">Production</th>
                                        <th data-hide="phone">Status</th>
                                        <th class="text-right" data-sort-ignore="true">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($task_data) : ?>
                                        <?php foreach ($task_data as $k => $v) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $v['task_info']['description']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($v['task_info']['status'] == 'todo') { ?>
                                                        <p>Reserved</p>
                                                    <?php
                                                    } else if ($v['task_info']['status'] == 'progress') { ?>
                                                        <p><?php echo $v['task_info']['date_time_issued']; ?></p>


                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <p><?php echo $v['task_info']['date_time_completed']; ?></p>
                                                </td>
                                                <td>
                                                    <?php if ($v['task_info']['ingredients']) : ?>
                                                        <?php foreach (json_decode($v['task_info']['ingredients'], true) as $ki => $vi) : ?>
                                                            <p><?php echo $ki; ?>:</strong><?php echo $vi; ?></p>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($v['task_info']['production']) : ?>
                                                        <?php foreach (json_decode($v['task_info']['production'], true) as $ki => $vi) : ?>
                                                            <p><?php echo $ki; ?>:</strong><?php echo $vi; ?></p>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                    </ </td> <td>
                                                    <?php if ($v['task_info']['status'] == 'todo') {
                                                        $color = 'label label-primary';
                                                    } else if ($v['task_info']['status'] == 'progress') {
                                                        $color = 'label label-warning';
                                                    } else {
                                                        $color = 'label label-success';
                                                    }

                                                    ?>
                                                    <span class="<?php echo $color; ?>"><?php echo $v['task_info']['status']; ?></span>

                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn-white btn btn-xs">View</button>
                                                        <button class="btn-white btn btn-xs" data-toggle="modal" data-target="#deleteModal<?php echo $v['task_info']['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal inmodal fade" id="deleteModal<?php echo $v['task_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4>Delete Confirmation</h4>
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

    <script>
        $(document).ready(function() {
            $("#manufacturingMainMenu").addClass('active');
            $("#allTaskMenu").addClass('active');
            $('.footable').footable();
            $('.footable2').footable();

        });
    </script>