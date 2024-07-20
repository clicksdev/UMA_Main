<script>
    var $processing = true,
        $serverSide = false,
        $responsive = true,
        $includeJsonArFile = false;

    function _DataTableHandler($ajaxUrl, data, $buttons, $includeJsonArFile, $processing, $serverSide, $responsive) {
        var table = $('#myTable').DataTable({
            "order": [
                [0, 'desc']
            ],
            "ajax": "{{Url('/admin')}}/" + $ajaxUrl + "/dataTable",
            columns: data,
            processing: $processing,
            serverSide: $serverSide,
            responsive: $responsive,
            "bDestroy": true, // To Clear and Re init DataTable if Exist .
        });
        return true;
    }

    /*  $('#myTable thead tr').clone(true).appendTo('#myTable thead');
        $('#myTable thead tr:eq(0) th').each(function (i) {
            var title = $(this).text();
            if (this.className == 'dataTableSearch') {
                $(this).html('<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text bg-warning text-white"><i class="fas fa-search"></i></span></div><input type="text" class="form-control" placeholder="Search ' + title + '">');
            } else {
                $(this).html('');
            }
            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });*/
</script>
