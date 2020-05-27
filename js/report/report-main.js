toastr.options = {
    "closeButton": false,
    "debug": true,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
function report_get_table(){
    $.ajax({
        type: "POST",
        url: "report-get-main.php",
         data: {btnReportMain:"01"},
        success: function (result) {
            $("#report-table").html(result);
            $('#dataTable').DataTable({
                searching: true,
                paging: true,
                info: true,
                responsive: true,
            });
        }
    });
}
function delete_report(id,dataReport,nameFile,dataType) {
    let btn = "02";
    $.confirm({
        title: 'กล่องแจ้งเตือน',
        content: 'ต้องการลบรายงาน : ['+dataReport+']',
        autoClose: 'ยกเลิก|8000',
        animation: 'top',
        closeAnimation: 'top',
        type: 'red',
        typeAnimated: true,
        buttons: {
            deleteUser: {
                text: 'ลบรายงาน',
                action: function () {
                    $.ajax({
                        type: "POST",
                        url: "report-get-main.php",
                        data: {btnReportMain:btn, report_id:id, nameFile:nameFile,dataType:dataType},
                        success: function (result) {
                            if(result == "true"){
                                toastr.success("แจ้งเตือน","ลบรายงาน : "+dataReport+" สำเร็จ!");
                                report_get_table();
                            } else if(result == "fail"){
                                toastr.warning('ลบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง!');
                            }else if(result == "deleting"){
                                toastr.warning('ลบไม่ไฟล์สำเร็จ กรุณาลองใหม่อีกครั้ง!');
                            } else {
                                toastr.error('ติดต่อเซิฟเวอร์ไม่สำเร็จ!');
                            }
                        }
                    });
                }
            },
            ยกเลิก: function () { }
        }
    });
}