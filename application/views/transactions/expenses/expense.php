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
                <h4>Expenses</h4>
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

        <div class="box">


            <div class="ibox ">
                <div class="ibox-title">
                    <?php if (in_array('createCustomer', $user_permission)) : ?>
                        <div class="ibox-tools">
                            <a href="<?php echo base_url('purchase/expense') ?>" class="btn btn-primary btn-xs"><i class="fa fa-unsorted"></i> Expense History</a>
                        </div>

                        <br /> <br />
                    <?php endif; ?>
                </div>
                <div class="ibox-title">

                    <form role="form" action="<?php echo base_url('purchase/expense') ?>" method="post" id="createForm">

                        <div class="modal-body">
                            <div id="messages"></div>

                            <div class="row">
                                <div class="col-sm-3" id="data_1">
                                    <label class="font-normal">Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="datepicker" name="date" type="text" class="form-control" value="<?php echo date("d/m/Y"); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="method">Payment Method</label>
                                        <select class="select_group product" data-placeholder="Choose Method" data-placeholder="Choose Item" id="method" name="mehtod" style="width:100%;" required>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Card">Card</option>
                                            <option value="Direct Debit">Direct Debit</option>

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="description">Payee</label>
                                        <select class="select_group product" data-placeholder="Choose Supplier" data-placeholder="Choose Item" id="supplier" name="supplier" style="width:100%;">
                                            <?php foreach ($supplier_data as $k => $v) : ?>
                                                <option value="<?php echo $v['name'] ?>" placeholder="Choose supplier"><?php echo $v['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="description">Category</label>
                                        <select class="select_group product" data-placeholder="Choose Category" data-placeholder="Choose Item" id="category" name="category" style="width:100%;" required>
                                            <option value="Cost of Sales">Cost of Sales</option>
                                            <option value="Legal & Professional" placeholder="Choose Category">Legal & Professional</option>
                                            <option value="Meals & Entertainment" placeholder="Choose Category">Meals & Entertainment</option>
                                            <option value="Repair & Maintenance" placeholder="Choose Category">Repair & Maintenance</option>
                                            <option value="Shipping & Delivery Expense" placeholder="Choose Category">Shipping & Delivery Expense</option>
                                            <option value="Bank Charges" placeholder="Choose Category">Bank Charges</option>
                                            <option value="Other" placeholder="Choose Category">Other</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <label class="font-normal">Description</label>
                                    <input id="description" name="description" type="text" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <label class="font-normal">Amount</label>
                                    <input id="amount" name="amount" type="text" class="form-control text-right">
                                </div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-pencil"></i> Clear</button>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save &amp Mail</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Save &amp Print</button>
                        </div>
                </div>
                </form>
                <!-- /.box-body -->


            </div>
        </div>

    </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#transactionMainMenu").addClass('active');
        $("#expenseMenu").addClass('active');
        $(".product").select2();

        // Append table with add row form on add new button click ==Add new Task==
        $(".add-new").click(function() {
            var base_url = "<?php echo base_url(); ?>";


            var index = $("table tbody tr:last-child").index();
            var table = $("#product_info_table");
            var count_table_tbody_tr = $("#product_info_table tbody tr").length;
            var row_id = count_table_tbody_tr + 1;

            $.ajax({
                url: base_url + '/task/getProductRow/',
                type: 'post',
                dataType: 'json',
                success: function(response) {

                    var html = '<tr id="row_' + row_id + '">' +
                        '<td>' +
                        '<select class="form-control select_group product" data-placeholder="Choose Item"  data-row-id="row_' + row_id + '" id="product_' + row_id + '" name="product[]" style="width:100%;" >' +
                        '<option value=""></option>';
                    $.each(response, function(index, value) {
                        html += '<option value="' + value.name + '">' + value.name + '</option>';
                    });

                    html += '</select>' +
                        '</td>' +
                        '<td><input type="text" name="qty[]" id="qty_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="text" name="cost[]" id="cost_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="text" name="amount[]" id="amount_' + row_id + '" class="form-control"></td>' +
                        '<td> <a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a> </td>' +
                        '</tr>';

                    if (count_table_tbody_tr >= 1) {
                        $("#product_info_table tbody tr:last").after(html);
                    } else {
                        $("#product_info_table tbody").html(html);
                    }
                    $(".product").select2();

                }
            });
        })


        // Delete row on delete button click
        $(document).on("click", ".delete", function() {

            $(this).parents("tr").remove();

        });
    });
</script>