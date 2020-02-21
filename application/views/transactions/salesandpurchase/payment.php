
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

            <div class="box">


                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>New Payment</h5>
                        <?php if(in_array('createCustomer', $user_permission)): ?>
                            <div class="ibox-tools">
                                <a href="<?php echo base_url('sales/history') ?>" class="btn btn-primary btn-xs"><i class="fa fa-unsorted"></i> Sales History</a>
                            </div>

                            <br /> <br />
                        <?php endif; ?>
                    </div>
                    <div class="ibox-title">

                        <form role="form" action="<?php echo base_url('sales/createpayment') ?>" method="post" id="createForm">

                            <div class="modal-body">
                                <div id="messages"></div>

                                <div class="row">
                                <div class="col-sm-3" id="data_1">
                                <label class="font-normal">Payment Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="payment_date" name="payment_date" type="text" class="form-control" value="03/04/2014">
                                </div>
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Customer</label>
                                            <select class="select_group product"
                                                    id="customer" name="customer" style="width:100%;" required>
                                                <option value=""></option>
                                                <?php foreach ($customer_data as $k => $v): ?>
                                                    <option value="<?php echo $v['name'] ?>" placeholder="Choose customer"><?php echo $v['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-4">
                                        <label class="font-normal">Amount</label>
                                        <input  id="amount" name="amount" type="text" class="form-control text-right">
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
    $(document).ready(function () {
        $("#transactionMainMenu").addClass('active');
        $("#salesMenu").addClass('active');
        $(".product").select2();

        var mem = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
        var mem = $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });


        // Append table with add row form on add new button click ==Add new Task==
        $(".add-new").click(function () {
            var base_url = "<?php echo base_url(); ?>";


            var index = $("table tbody tr:last-child").index();
            var table = $("#product_info_table");
            var count_table_tbody_tr = $("#product_info_table tbody tr").length;
            var row_id = count_table_tbody_tr + 1;

            $.ajax({
                url: base_url + '/task/getProductRow/',
                type: 'post',
                dataType: 'json',
                success: function (response) {

                    var html = '<tr id="row_' + row_id + '">' +
                        '<td>' +
                        '<select class="form-control select_group product" data-row-id="' + row_id + '" id="product_' + row_id + '" name="product[]" style="width:100%;" >' +
                        '<option value=""></option>';
                    $.each(response, function (index, value) {
                        html += '<option value="' + value.name + '">' + value.name + '</option>';
                    });

                    html += '</select>' +
                        '</td>' +
                        '<td><input type="text" name="qty[]" id="qty_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="text" name="cost[]" id="cost_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="text" name="amount[]" id="amount_' + row_id + '" class="form-control"></td>' +
                        '<td> <a class="delete" title="Delete"><i class="fa fa-close"></i></a> </td>' +
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
        $(document).on("click", ".delete", function () {

            $(this).parents("tr").remove();

        });
    });



</script>

