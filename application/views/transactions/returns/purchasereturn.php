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
                <h4>Purchase Return</h4>
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


        <div class="ibox ">
            <div class="ibox-title">
                <h5>Record Purchase Return</h5>
                <?php if (in_array('createCustomer', $user_permission)) : ?>
                    <div class="ibox-tools">
                        <a href="<?php echo base_url('purchase/history') ?>" class="btn btn-primary btn-xs"><i class="fa fa-unsorted"></i> Purchase History</a>
                    </div>

                    <br /> <br />
                <?php endif; ?>
            </div>
            <div class="ibox-title">

                <form role="form" action="<?php echo base_url('purchase/purchasereturn') ?>" method="post" id="createForm">

                    <div class="modal-body">

                        <div id="messages"></div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group" id="date_1">
                                    <label class="font-normal">Return Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" id="datepicker" name="purchase_date" class="form-control" value="<?php echo date("d/m/Y"); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Supplier</label>
                                    <select class="select_group" data-placeholder="Choose Supplier" id="supplier" name="supplier" style="width:100%;" onchange="setCharges();" required>
                                        <option value=""></option>
                                        <?php foreach ($supplier_data as $k => $v) :
                                            if ($v['status'] == 'approved') { ?>
                                                <option value="<?php echo $v['name'] ?>" placeholder="Choose supplier"><?php echo $v['name'] ?></option>

                                            <?php } ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>


                        </div>

                        <div class="row">
                            <table class="table" id="material_info_table">
                                <thead>
                                    <tr>
                                        <th style="width:35%">Material</th>
                                        <th style="width:10%">Cost</th>
                                        <th style="width:10%">Quantity</th>
                                        <th style="width:10%">Amount</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="row_1">
                                        <td>
                                            <select class="select_group material" data-placeholder="Choose Item" data-row-id="row_1" id="material_1" name="material[]" style="width:100%;" onchange="getMaterialData(1)" required>
                                                <option value=""></option>
                                                <?php foreach ($materials as $k => $v) : ?>
                                                    <option value="<?php echo $v['id'] ?>" placeholder="Choose a material"><?php echo $v['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="cost[]" id="cost_1" class="form-control" required>
                                        </td>
                                        <td><input type="text" name="qty[]" id="qty_1" class="form-control" onkeyup="getTotal(1)" required>
                                        </td>
                                        <td><input type="text" name="amount[]" id="amount_1" class="form-control" required>
                                        </td>
                                        <td>
                                            <a class="delete" title="Delete"><i class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box-footer">
                                <button type="button" class="btn btn-default add-new"><i class="fa fa-plus"></i> Add
                                    Row
                                </button>

                            </div>

                            <table class="table table-total">
                                <tbody>
                                    <tr>
                                        <td><strong>Gross Amount :</strong></td>
                                        <td>
                                            <input readonly type="text" class="form-control" id="gross_amount" name="gross_amount">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td><p>Service Charge <strong id="scharge"></strong> % :</p></td>
                                        <td>
                                            <input readonly type="text" class="form-control" id="service_charge" name="service_charge" autocomplete="off">
                                        </td>


                                    </tr>


                                    <tr>
                                        <td><p>Vat <strong id="vcharge"></strong> % :</p></td>
                                        <td>
                                            <input readonly type="text" class="form-control" id="vat_charge" name="vat_charge" autocomplete="off">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td><strong>Discount :</strong></td>
                                        <td>
                                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" autocomplete="off">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Net Amount :</strong></td>
                                        <td>
                                            <input readonly type="text" class="form-control" id="net_amount" name="net_amount" autocomplete="off">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Clear</button>
                        <button type="submit" class="btn btn-primary">Save &amp Close</button>
                    </div>
            </div>
            </form>
            <!-- /.box-body -->


        </div>
    </div>


</div>
</div>


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";

    $(document).ready(function() {
        $("#transactionMainMenu").addClass('active');
        $("#purchaseMenu").addClass('active');
        $(".select_group").select2();

        // Append table with add row form on add new button click ==Add new Task==
        $(".add-new").click(function() {

            var base_url = "<?php echo base_url(); ?>";
            var index = $("table tbody tr:last-child").index();
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
                        '<select class="select_group material" data-placeholder="Choose Item" data-row-id="row_' + row_id + '" id="material_' + row_id + '" name="material[]" style="width:100%;"  onchange="getMaterialData(' + row_id + ')" required>' +
                        '<option value=""></option>';
                    $.each(response, function(index, value) {
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    html += '</select>' +
                        '</td>' +
                        '<td><input type="text" name="cost[]" id="cost_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="text" name="qty[]" id="qty_' + row_id + '" class="form-control" onkeyup="getTotal(' + row_id + ')"></td>' +
                        '<td><input type="text" name="amount[]" id="amount_' + row_id + '" class="form-control"></td>' +
                        '<td> <a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a> </td>' +
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


        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            subAmount();
        });
    });
    // get the product information from the server
    function getMaterialData(row_id) {

        var material_id = $("#material_" + row_id).val();
        if (material_id == "") {

            $("#cost_" + row_id).val("");
            $("#qty_" + row_id).val("");
            $("#amount_" + row_id).val("");

        } else {
            $.ajax({
                url: base_url + 'task/getMaterialRow',
                type: 'post',
                data: {
                    material_id: material_id
                },
                dataType: 'json',
                success: function(response) {
                    // setting the rate value into the rate input field

                    $("#cost_" + row_id).val(response.price);
                    $("#qty_" + row_id).val(1);

                    var total = Number(response.price) * 1;
                    total = total.toFixed(2);
                    $("#amount_" + row_id).val(total);


                    subAmount();
                } // /success
            }); // /ajax function to fetch the product data 
        }
    }

    function getTotal(row = null) {

        if (row) {
            var total = Number($("#cost_" + row).val()) * Number($("#qty_" + row).val());
            total = total.toFixed(2);
            $("#amount_" + row).val(total);
            subAmount();
        } else {
            alert('no row !! please refresh the page');
        }
    }



    // calculate the total amount of the order
    function subAmount() {
        
        var tableProductLength = $("#material_info_table tbody tr").length;
        var totalSubAmount = 0;
        for (x = 0; x < tableProductLength; x++) {
            var tr = $("#material_info_table tbody tr")[x];
            var count = $(tr).attr('id');
            count = count.substring(4);

            totalSubAmount = Number(totalSubAmount) + Number($("#amount_" + count).val());
        } // /for

        totalSubAmount = totalSubAmount.toFixed(2);

        // sub total
        $("#gross_amount").val(totalSubAmount);

        // vat
        var vat = (Number($("#gross_amount").val()) / 100) * Number($("#vcharge").text());
        vat = vat.toFixed(2);
        $("#vat_charge").val(vat);
        $("#vat_charge_value").val(vat);

        // service
        var service = (Number($("#gross_amount").val()) / 100) * Number($("#scharge").text());
        service = service.toFixed(2);
        $("#service_charge").val(service);
        $("#service_charge_value").val(service);


        // total amount
        var totalAmount = (Number(totalSubAmount) + Number(vat) + Number(service));
        totalAmount = totalAmount.toFixed(2);
        // $("#net_amount").val(totalAmount);
        // $("#totalAmountValue").val(totalAmount);

        var discount = $("#discount").val();
        if (discount) {
            var grandTotal = Number(totalAmount) - Number(discount);
            grandTotal = grandTotal.toFixed(2);
            $("#net_amount").val(grandTotal);
            $("#net_amount_value").val(grandTotal);
        } else {
            $("#net_amount").val(totalAmount);
            $("#net_amount_value").val(totalAmount);

        } // /else discount 

    } // /sub total amount

    function setCharges() {

        var supplier = document.getElementById("supplier").value
        //    document.getElementById("scharge").value='5';
        <?php foreach ($supplier_data as $k => $v) : ?>
            if ('<?php echo $v['name']; ?>' == supplier) {


                $("#scharge").html('<?php echo $v['service_charge_value']; ?>');
                $("#vcharge").html('<?php echo $v['vat_charge_value']; ?>');
            }
        <?php endforeach ?>

        subAmount();
    }
</script>