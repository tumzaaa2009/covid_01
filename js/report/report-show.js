function report_get_show(){
    $.ajax({
        type: "POST",
        url: "report-get-show.php",
         data: {btnReportMain:"01"},
        success: function (result) {
            $("#show-table").html(result);
            $('#dataTable').DataTable({
                searching: true,
                paging: true,
                info: true,
                responsive: true,
                ordering: false,
                pageLength: 30
            });
        }
    });
}