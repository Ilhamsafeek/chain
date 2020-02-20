
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
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>



    <?php if($purchase_order_data){ ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>All Purchase Orders</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                       
                            <table id="shTable" class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>

                                    <th data-toggle="true">Order No</th>
                                    <th data-hide="phone">Time</th>
                                    <th data-hide="phone">Vendor</th>
                                    <th data-hide="phone">Total</th>
                                    <th data-hide="phone">Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($purchase_order_data as $k => $v): ?>
                                    <tr>
                                        <td>
                                            <?php echo $v['purchase_order_info']['purchase_order_no']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y H:i:s', $v['purchase_order_info']['date_time']); ?>
                                        </td>
                                        <td>
                                            <?php echo $v['purchase_order_info']['vendor']; ?>
                                        </td>
                                        <td>
                                            <?php echo $v['purchase_order_info']['total']; ?>
                                        </td>
                                        <td>
                                            <?php echo $v['purchase_order_info']['paid_status']; ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button class="btn-white btn btn-xs">View</button>
                                                <button class="btn-white btn btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </td>
                                    </tr>
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
        </div>
    <?php }else{ ?>
        <a href="<?php echo base_url('suppliers/create') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create new Purchase Order</a>

    <?php }?>


</div>

<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });

</script>