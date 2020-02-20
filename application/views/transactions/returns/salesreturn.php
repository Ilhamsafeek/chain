
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
                        <h5>Return Sales Return</h5>
                        <?php if(in_array('createCustomer', $user_permission)): ?>
                            <div class="ibox-tools">
                                <a href="<?php echo base_url('customers/create') ?>" class="btn btn-primary btn-xs">Sales Return History</a>
                            </div>

                            <br /> <br />
                        <?php endif; ?>
                    </div>
                    <div class="ibox-title">

                        <form role="form" action="<?php echo base_url('task/createtask') ?>" method="post" id="createForm">

                            <div class="modal-body">

                                <div id="messages"></div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Purchase Order Number</label>
                                            <input type="text" id="pon" name="pon" value=""
                                                   placeholder="PON" class="form-control">
                                        </div>

                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="description">Customer</label>
                                            <input type="text" id="customer" name="customer" value=""
                                                   placeholder="Customer" class="form-control">
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
                                    <table class="table" id="shTable">
                                        <thead>
                                        <tr>
                                            <th style="width:35%">Material</th>
                                            <th style="width:10%">Quantity</th>
                                            <th style="width:10%">Cost</th>
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
</div>


<script type="text/javascript">
    $(document).ready(function () {
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

