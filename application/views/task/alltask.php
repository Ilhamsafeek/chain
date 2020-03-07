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
                            
                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                    <tr>

                                        <th data-toggle="true">Task</th>
                                        <th data-hide="phone">Time</th>
                                        <th data-hide="all">Ingredients</th>
                                        <th data-hide="phone">Price</th>
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

                                                    <?php

                                                    } else { ?>
                                                        <p><?php echo $v['task_info']['date_time_completed']; ?></p>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <?php if ($v['task_info']['ingredients']) : ?>
                                                        <?php foreach (json_decode($v['task_info']['ingredients'], true) as $ki => $vi) : ?>
                                                            <p><?php echo $ki; ?>:</strong><?php echo $vi; ?></p>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    $50.00
                                                </td>
                                                <td>
                                                    <?php if ($v['task_info']['production']) : ?>
                                                        <?php foreach (json_decode($v['task_info']['production'], true) as $ki => $vi) : ?>
                                                            <p><?php echo $ki; ?>:</strong><?php echo $vi; ?></p>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                    </ </td> <td>
                                                    <?php if ($v['task_info']['status'] == 'todo') {
                                                        $color = 'label label-success';
                                                    } else if ($v['task_info']['status'] == 'progress') {
                                                        $color = 'label label-warning';
                                                    } else {
                                                        $color = 'label label-primary';
                                                    }

                                                    ?>
                                                    <span class="<?php echo $color; ?>"><?php echo $v['task_info']['status']; ?></span>

                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn-white btn btn-xs">View</button>
                                                        <button class="btn-white btn btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif; ?>

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


    </div>

    <script>
        $(document).ready(function() {
            $("#manufacturingMainMenu").addClass('active');
            $("#allTaskMenu").addClass('active');
            $('.footable').footable();
            $('.footable2').footable();

        });
    </script>