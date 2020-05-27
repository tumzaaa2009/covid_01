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
/*--------------------------------------------------------Funcion---------------------------------------------------------------*/
function map_get_table() {
    $.ajax({
        type: "POST",
        url: "map-alerted-main.php",
         data: {btnMapMain:"01"},
        success: function (result) {
            $("#table_map").html(result);
            $('#dataTable').DataTable({
                searching: true,
                paging: true,
                info: true,
                responsive: true,
            });
        }
    });
}
function delete_alerted(id,number) {
    let btn = "04";
    $.confirm({
        title: 'กล่องแจ้งเตือน',
        content: 'ต้องการลบผู้ป่วยรายที่ ['+number+']',
        autoClose: 'ยกเลิก|8000',
        animation: 'top',
        closeAnimation: 'top',
        type: 'red',
        typeAnimated: true,
        buttons: {
            deleteUser: {
                text: 'ลบผู้ป่วย',
                action: function () {
                    $.ajax({
                        type: "POST",
                        url: "map-alerted-main.php",
                        data: {btnMapMain:btn, alerted_id:id},
                        success: function (result) {
                            if(result == "true"){
                                toastr.success("แจ้งเตือน","ลบผู้ป่วยรายที่ : "+number+" สำเร็จ!");
                                map_get_table();
                            } else if(result == "fail"){
                                toastr.warning('ลบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง!');
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