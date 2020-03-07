<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="chain.html"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li>Transactions</li>
                </ul>
                <h4>Expense History</h4>
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




        <?php if ($expense_data) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                            <div class="ibox-tools">
                            <a href="<?php echo base_url('purchase/createexpense') ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> New Expense</a>
                        </div>
                            </div>
                            <div class="ibox-content">

                                <table id="shTable" class="footable table table-bordered table-stripped table-hover" data-page-size="8" data-filter=#filter>
                                    <thead>
                                        <tr>
                                            <th data-hide="phone">Date</th>
                                            <th data-hide="phone">Category</th>
                                            <th data-toggle="true">No</th>
                                            <th data-hide="phone">Payee</th>
                                            <th data-hide="phone">Description</th>
                                            <th data-hide="phone">Method</th>
                                            <th data-hide="phone">Amount</th>
                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($expense_data as $k => $v) : ?>
                                            <tr>

                                                <td>
                                                    <?php echo $v['expense_info']['date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['expense_info']['category']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['expense_info']['no']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['expense_info']['payee']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['expense_info']['description']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['expense_info']['method']; ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php echo $v['expense_info']['amount']; ?>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#viewModal<?php echo $v['expense_info']['id']; ?>">View</button>
                                                        <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>

                                                        </button>
                                                        <ul role="menu" class="dropdown-menu dropdown-menu-right dropdown-demo-only">

                                                            <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['expense_info']['id']; ?>"><i class="fa fa-trash-o"></i> Delete</a></li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade bs-example-modal-lg" id="viewModal<?php echo $v['expense_info']['id']; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                            <h4 class="modal-title"><?php echo $v['expense_info']['type']; ?></h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="panel panel-primary widget-messaging">
                                                                <div class="panel-heading">

                                                                    <h3 class="panel-title"><?php echo $v['expense_info']['supplier']; ?></h3>
                                                                </div>

                                                                <ul class="list-group">
                                                                    <?php foreach ($purchase_details_data as $key => $value) :
                                                                        if ($value['purchase_details_info']['purchase_order_no'] == $v['purchase_info']['no']) {
                                                                    ?>
                                                                            <li class="list-group-item">
                                                                                <small class="pull-right"><?php echo $value['purchase_details_info']['price']; ?></small>
                                                                                <h4 class="sender">Jennier Lawrence</h4>
                                                                                <p>Lorem ipsum dolor sit amet...</p>
                                                                            </li>
                                                                        <?php
                                                                        }
                                                                        ?>


                                                                    <?php endforeach ?>
                                                                </ul>
                                                            </div><!-- panel -->


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal inmodal" id="deleteModal<?php echo $v['expense_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                            <h4 class="modal-title">Confirm Delete?</h4>
                                                        </div>
                                                        <form role="form" action="<?php echo base_url('purchase/deleteexpense/' . $v['expense_info']['id']) ?>" method="post" id="issueForm">
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
                </div>
            </div>
        <?php } else { ?>

            <div class="notfoundpanel">

<div class="row">
    <img src="https://plugin.intuitcdn.net/transactions-list-ui/3.21.10/images/1369e3744cf993faa355b5f7f4833b1a.svg" width="200px">
</div>
<div class="row">
    <h2><strong>Enter transactions, bills and payments to get an in-depth view of your expenses.</strong></h2>
</div>
<div class="row">
    <a href="<?php echo base_url('purchase/createexpense') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Record New Expense</a>
</div>
</div>

        <?php } ?>

    </div>

    <script>
        $(document).ready(function() {
            $("#transactionMainMenu").addClass('active');
            $("#expenseMenu").addClass('active');
            $('.footable').footable();
            $('.footable2').footable();

            $('.table > tbody > tr').click(function() {
                // alert('success');
            });


        });
    </script>