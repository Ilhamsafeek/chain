
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
                            <h4>Sales</h4>
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
                        <h5>Create Sales Receipt</h5>
                        <?php if(in_array('createCustomer', $user_permission)): ?>
                            <div class="ibox-tools">
                                <a href="<?php echo base_url('sales/history') ?>" class="btn btn-primary btn-xs"><i class="fa fa-unsorted"></i> Sales History</a>
                            </div>

                            <br /> <br />
                        <?php endif; ?>
                    </div>
                    <div class="ibox-title">

                        <form role="form" action="<?php echo base_url('sales/createsalesreceipt') ?>" method="post" id="createForm">

                            <div class="modal-body">

                                <div id="messages"></div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group" id="data_1">
                                        <label class="font-normal">Bill Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" id="bill_date" name="bill_date" class="form-control" value="03/04/2014">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Customer</label>
                                            <select class="select_group product" data-placeholder="Choose Customer" id="customer" name="customer" style="width:100%;" required>
                                                <option selected="false" value=""></option>

                                                <?php foreach ($customer_data as $k => $v): ?>
                                                    <option value="<?php echo $v['name'] ?>" placeholder="Choose customer"><?php echo $v['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Address</label>
                                            <input type="text" id="address" name="address" value=""
                                                   placeholder="Address" class="form-control">
                                        </div>

                                    </div>


                                </div>
                                <div class="row">
                                    <table class="table" id="product_info_table">
                                        <thead>
                                        <tr>
                                            <th style="width:35%">Product</th>
                                            <th style="width:10%">Quantity</th>
                                            <th style="width:10%">Cost</th>
                                            <th style="width:10%">Amount</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr id="row_1">
                                            <td>
                                                <select class="select_group product" data-row-id="row_1" data-placeholder="Choose Item" id="product_1" name="product[]" style="width:100%;"  onchange="getProductData(1)" required>
                                                    <option value=""></option>
                                                    <?php foreach ($products as $k => $v): ?>
                                                        <option value="<?php echo $v['id'] ?>" placeholder="Choose a product"><?php echo $v['name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="cost[]" id="cost_1" class="form-control" required>
                                            </td>
                                            <td><input type="number" name="qty[]" id="qty_1" class="form-control" required>
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

                                    <table class="table invoice-total">
                                        <tbody>
                                        <tr>
                                            <td><strong>Gross Amount :</strong></td>
                                            <td>
                                                <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                                            </td>

                                        </tr>
                                        <?php if($is_service_enabled == true): ?>
                                        <tr>
                                            <td><strong>S-Charge <?php echo $company_data['service_charge_value'] ?> % :</strong></td>
                                            <td>
                                                <input type="text" class="form-control" id="service_charge" name="service_charge" disabled autocomplete="off">
                                            </td>


                                        </tr>
                                        <?php endif; ?>
                                        <?php if($is_vat_enabled == true): ?>
                                        <tr>
                                            <td><strong>Vat <?php echo $company_data['vat_charge_value'] ?> % :</strong></td>
                                            <td>
                                                <input type="text" class="form-control" id="vat_charge" name="vat_charge" disabled autocomplete="off">
                                            </td>

                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td><strong>Discount :</strong></td>
                                            <td>
                                                <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" autocomplete="off">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Net Amount :</strong></td>
                                            <td>
                                                <input type="text" class="form-control" id="net_amount" name="net_amount" disabled autocomplete="off">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


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
    var base_url = "<?php echo base_url(); ?>";

    $(document).ready(function () {
        $("#transactionMainMenu").addClass('active');
        $("#salesMenu").addClass('active');
        $(".product").select2();

 
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
                        '<select class="select_group product" data-placeholder="Choose Item" data-row-id="row_' + row_id + '" id="product_' + row_id + '" name="product[]" style="width:100%;"  onchange="getProductData('+row_id+')">' +
                        '<option value=""></option>';
                    $.each(response, function (index, value) {
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    html += '</select>' +
                        '</td>' +
                        '<td><input type="text" name="cost[]" id="cost_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="number" name="qty[]" id="qty_' + row_id + '" class="form-control"></td>' +
                        '<td><input type="text" name="amount[]" id="amount_' + row_id + '" class="form-control"></td>' +
                        '<td> <a class="delete" title="Delete"><i class="fa fa-trash-o"></i></a> </td>' +
                        '</tr>';

                    if (count_table_tbody_tr >= 1) {
                        $("#product_info_table tbody tr:last").after(html);
                    } else {
                        $("#product_info_table tbody").html(html);
                    }
                    $("#product_"+row_id).select2();

                }
            });
        })




        // Delete row on delete button click
        $(document).on("click", ".delete", function () {

            $(this).parents("tr").remove();

        });
    });

// get the product information from the server
function getProductData(row_id) {

var product_id = $("#product_" + row_id).val();
if (product_id == "") {
   
    $("#cost_" + row_id).val("");
    $("#qty_" + row_id).val("");
    $("#amount_" + row_id).val("");
    
} else {
    $.ajax({
        url: base_url + 'task/getProductRow',
        type: 'post',
        data: {
            product_id: product_id
        },
        dataType: 'json',
        success: function(response) {
            // setting the rate value into the rate input field
               
            $("#cost_" + row_id).val(response.price);                 
            $("#qty_" + row_id).val(1);
          
             var total = Number(response.price) * 1;
             total = total.toFixed(2);
            $("#amount_" + row_id).val(total);
           

           // subAmount();
        } // /success
    }); // /ajax function to fetch the product data 
}
}

</script>

