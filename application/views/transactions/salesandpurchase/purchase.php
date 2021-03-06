
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


                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Record GRN</h5>
                        <?php if(in_array('createCustomer', $user_permission)): ?>
                            <div class="ibox-tools">
                                <a href="<?php echo base_url('purchase/history') ?>" class="btn btn-primary btn-xs"><i class="fa fa-unsorted"></i> Purchase History</a>
                            </div>

                            <br /> <br />
                        <?php endif; ?>
                    </div>
                    <div class="ibox-title">

                        <form role="form" action="<?php echo base_url('purchase/create') ?>" method="post" id="createForm">

                            <div class="modal-body">

                                <div id="messages"></div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group" id="data_1">
                                            <label class="font-normal">Purchase Date</label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" id="datepicker" name="purchase_date" class="form-control" value="03/04/2014">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Supplier</label>
                                            <select class="form-control select_group material"
                                                    id="supplier" name="supplier" style="width:100%;" required >
                                                <option value=""></option>
                                                <?php foreach ($supplier_data as $k => $v):
                                                    if($v['status']=='approved'){?>
                                                        <option value="<?php echo $v['name'] ?>" placeholder="Choose supplier"><?php echo $v['name'] ?></option>

                                                        <?php
                                                        }
                                                        ?>                                               
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                    </div>


                                </div>

                                <div class="row">
                                    <table class="table" id="material_info_table">
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
                                                <select class="form-control select_group material" data-row-id="row_1"
                                                        id="material_1" name="material[]" style="width:100%;" required>
                                                    <option value=""></option>
                                                    <?php foreach ($materials as $k => $v): ?>
                                                        <option value="<?php echo $v['name'] ?>" placeholder="Choose a material"><?php echo $v['name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="qty[]" id="qty_1" class="form-control" required>
                                            </td>
                                            <td><input type="text" name="cost[]" id="cost_1" class="form-control" required>
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
    $(document).ready(function () {
        $("#transactionMainMenu").addClass('active');
        $("#purchaseMenu").addClass('active');
        $(".material").select2();


        // Append table with add row form on add new button click ==Add new Task==
        $(".add-new").click(function () {
            var base_url = "<?php echo base_url(); ?>";


            var index = $("table tbody tr:last-child").index();
            var table = $("#material_info_table");
            var count_table_tbody_tr = $("#material_info_table tbody tr").length;
            var row_id = count_table_tbody_tr + 1;

            $.ajax({
                url: base_url + '/task/getMaterialRow/',
                type: 'post',
                dataType: 'json',
                success: function (response) {

                    var html = '<tr id="row_' + row_id + '">' +
                        '<td>' +
                        '<select class="form-control select_group material" data-row-id="' + row_id + '" id="material_' + row_id + '" name="material[]" style="width:100%;" >' +
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
                        $("#material_info_table tbody tr:last").after(html);
                    } else {
                        $("#material_info_table tbody").html(html);
                    }
                    $(".material").select2();

                }
            });
        })


        // Delete row on delete button click
        $(document).on("click", ".delete", function () {

            $(this).parents("tr").remove();

        });
    });



</script>

