<script>
    jQuery(document).ready(function() {


        var shTable = jQuery('#shTable').DataTable({
            "fnDrawCallback": function(oSettings) {
                jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
            },
            responsive: true
        });

        // Show/Hide Columns Dropdown
        jQuery('#shCol').click(function(event) {
            event.stopPropagation();
        });

        // Date Picker
        jQuery('#datepicker').datepicker({
            dateFormat: 'dd/mm/yy',

        });

        jQuery('#shCol input').on('click', function() {

            // Get the column API object
            var column = shTable.column($(this).val());

            // Toggle the visibility
            if ($(this).is(':checked'))
                column.visible(true);
            else
                column.visible(false);
        });

        var exRowTable = jQuery('#exRowTable').DataTable({
            responsive: true,
            "fnDrawCallback": function(oSettings) {
                jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
            },
            "ajax": "ajax/objects.txt",
            "columns": [{
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {
                    "data": "name"
                },
                {
                    "data": "position"
                },
                {
                    "data": "office"
                },
                {
                    "data": "salary"
                }
            ],
            "order": [
                [1, 'asc']
            ]
        });

        // Add event listener for opening and closing details
        jQuery('#exRowTable tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = exRowTable.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });


        // DataTables Length to Select2
        jQuery('div.dataTables_length select').removeClass('form-control input-sm');
        jQuery('div.dataTables_length select').css({
            width: '60px'
        });
        jQuery('div.dataTables_length select').select2({
            minimumResultsForSearch: -1
        });

    });

    function format(d) {
        // `d` is the original data object for the row
        return '<table class="table table-bordered nomargin">' +
            '<tr>' +
            '<td>Full name:' +
            '<td>' + d.name + '' +
            '' +
            '<tr>' +
            '<td>Extension number:' +
            '<td>' + d.extn + '' +
            '' +
            '<tr>' +
            '<td>Extra info:' +
            '<td>And any further details here (images etc)...' +
            '' +
            '';
    }
</script>
</body>

</html>