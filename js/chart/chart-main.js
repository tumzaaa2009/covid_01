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

    $("#start_date_chart").removeClass("border border-danger");
    $("#end_date_chart").removeClass("border border-danger");
    if(start != "" || end != ""){
        $("#start_date_chart").removeClass("border border-danger");
        $("#end_date_chart").removeClass("border border-danger");
        if(start == ""){
            $("#start_date_chart").addClass("border border-danger");
            toastr.warning('เลือกช่วงเวลาเริ่มต้น');
            return;
        }
        if(end == ""){
            $("#end_date_chart").addClass("border border-danger");
            toastr.warning('เลือกช่วงเวลาสิ้นสุด');
            return;
        }
        if(start > end){
            $("#start_date_chart").addClass("border border-danger");
            $("#end_date_chart").addClass("border border-danger");
            toastr.warning('เลือกช่วงเวลาเริ่มต้น > เลือกช่วงเวลาสิ้นสุด');
            return;
        }
    }

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
function getChart_2(type) {
    $.ajax({
        url: "get-chart.php",
        type: "POST",
        data: {btnChartMain:"02",type:type},
        success: function (data) {
            remove_chart_2();
            $('#chart-main-2').html(data);
        },
        error: function (e) {
            $('#chart-main-2').html("มีข้อผิดพลาด กรุณาตรวจสอบ....<br/>" + e.message);
        }
    });
}
function remove_chart() {
    var ControlChart = FusionCharts('Chart-1');
    if (ControlChart !== undefined) {
        ControlChart.dispose();
    }
}
function remove_chart_2() {
    var ControlChart = FusionCharts('Chart-2');
    if (ControlChart !== undefined) {
        ControlChart.dispose();
    }
}