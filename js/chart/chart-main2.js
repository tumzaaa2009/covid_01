$("#sent_chart").click(function () { 
    getChart();
});
$("#reset_chart").click(function () { 
    $("#start_date_chart").val("");
    $("#end_date_chart").val("");
    getChart();
});
$("#btn-container-chart").click(function () { 
    switch ($("#btn-container-chart").val()) {
        case "1":
            $("#container-set-chart").removeClass("container");
            $("#container-set-chart").addClass("container-fluid");
            $("#btn-container-chart").html('<i class="fas fa-compress-arrows-alt"></i> ย่อ');
            $("#btn-container-chart").val('2')
            break;
        case "2":
            $("#container-set-chart").removeClass("container-fluid");
            $("#container-set-chart").addClass("container");
            $("#btn-container-chart").html('<i class="fas fa-expand-arrows-alt"></i> ขยาย');
            $("#btn-container-chart").val('1')
            break;
    }
});
/*----------------------------------------------------Function--------------------------------------------------------*/
function getChart() {
    let start = $("#start_date_chart").val();
    let end = $("#end_date_chart").val();
    $.ajax({
        url: "get-chart.php",
        type: "POST",
        data: {btnChartMain:"01",start:start,end:end},
        success: function (data) {
            remove_chart();
            $('#chart-main-1').html(data);
        },
        error: function (e) {
            $('#chart-main-1').html("มีข้อผิดพลาด กรุณาตรวจสอบ....<br/>" + e.message);
        }
    });

}
function remove_chart() {
    var ControlChart = FusionCharts('Chart-1');
    if (ControlChart !== undefined) {
        ControlChart.dispose();
    }
}