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
                <h4>Purchase History</h4>
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




        <?php if ($purchase_data) { ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>All Purchase Transactions</h5>

                                <div class="ibox-tools">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-plus"></i> New Transaction
                                        </button>

                                        <ul role="menu" class="dropdown-menu dropdown-demo-only">
                                        <li><a href="<?php echo base_url('purchase') ?>" tabindex="-1" role="menuitem">Purchase (GRN)</a></li>
                                        <li><a href="<?php echo base_url('purchase/purchaseorder') ?>" tabindex="-1" role="menuitem">Purchase Order</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <table id="shTable" class="footable table table-bordered table-stripped table-hover" data-page-size="8" data-filter=#filter>
                                    <thead>
                                        <tr>
                                        <th data-hide="phone">Time</th>
                                                <th data-hide="phone">Type</th>
                                                <th data-toggle="true">No</th>
                                                <th data-hide="phone">Supplier</th>
                                                <th data-hide="phone">Total</th>
                                                <th data-hide="phone">Status</th>
                                                <th class="text-right" data-sort-ignore="true">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($purchase_data as $k => $v) : ?>
                                            <tr>

                                                <td>
                                                    <?php echo date("d/m/Y", strtotime($v['purchase_info']['date_time'])); ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['purchase_info']['type']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['purchase_info']['no']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['purchase_info']['supplier']; ?>
                                                </td>
                                  
                                                <td class="text-right">
                                                    <?php echo $v['purchase_info']['total']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $v['purchase_info']['paid_status']; ?>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-xs btn-success">Print</button>
                                                        <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>

                                                        </button>
                                                        <ul role="menu" class="dropdown-menu dropdown-demo-only">

                                                            <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal<?php echo $v['purchase_info']['id']; ?>"><i class="fa fa-trash"></i> Delete</a></li>

                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal inmodal" id="deleteModal<?php echo $v['purchase_info']['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                                                            <h4 class="modal-title">Confirm Delete?</h4>
                                                        </div>
                                                        <form role="form" action="<?php echo base_url('purchase/delete/' . $v['purchase_info']['id']) ?>" method="post" id="issueForm">
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

            <div class="row justify-content-center">
                <div class="col-sm-6 align-item-center">
                    <div class="row justify-content-center">
                        <img src="https://plugin.intuitcdn.net/improved-inventory/2.4.29/images/aedd71ce8d4a14e839494d68e8de5cce.svg">
                    </div>
                    <div class="row text-center">
                        <h2><strong>Add your Existing customers to create your next invoice or receipt</strong></h2>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?php echo base_url('purchase') ?>" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new Receipt</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <script>
        $(document).ready(function() {
            $("#transactionMainMenu").addClass('active');
            $("#purchaseMenu").addClass('active');
            $('.footable').footable();
            $('.footable2').footable();

            $('.table > tbody > tr').click(function() {
                // alert('success');
            });


        });
    </script>