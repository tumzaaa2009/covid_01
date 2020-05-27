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
$("#back").click(function () { 
    window.location.assign("report-main.php");
});
$("#report-edit").on('submit', function(e){
    e.preventDefault();
    if($("#report_name").val() == ""){
        $("#report_name").addClass("border border-danger");
        toastr.warning('กรุณาเพิ่มชื่อรายงาน!!');
        return;
    }
    $("#file_name").removeClass("border border-danger");
    
    $.ajax({
        type: 'POST',
        url: 'report-get-edit.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(result){
            if(result == "true"){
                toastr.success("แก้ไขสำเร็จแล้ว!");
                reset_edit_report();
                get_Report();
            }else if(result == "fail1"){
                toastr.warning("ไม่มีการเปลี่ยนแปลงข้อมูล กรุณาลองใหม่อีกครั้ง!");
            }else if(result == "fail2"){
                toastr.warning("แก้ไขไม่สำเร็จ กรุณาลองใหม่อีกครั้ง!");
            }else if(result == "fileyet"){
                toastr.warning("ชื่อไฟล์ซ้ำ กรุณาลองใหม่อีกครั้ง!");
            }else if(result == "deleting1"){
                toastr.warning("ข้อผิดพลาด[D1] กรุณาลองใหม่อีกครั้ง!");
            }else {
                toastr.error("กรุณาลองใหม่อีกครั้ง!");
            }
        }
    });
});
function file_report(file_this) {
    var english = /^[A-Za-z0-9].*$/;
    var file = file_this.files[0];
    var fileType = file.type;
    var fileName = file.name;
    var fileSize = file.size;
    var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office'];/*'image/jpeg', 'image/png', 'image/jpg'*/
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]))){
        toastr.warning("อัพโหลดไฟล์ชนิด PDF และ DOC เท่านั้น");
        $("#file_name").html("เลือกไฟล์...");
        $("#fileReport").val('');
        return false;
    }
    if(!english.test(fileName)){
        toastr.warning("ใช้ชื่อไฟล์เป็นตัวอักษรภาษาอังกฤษเท่านั้น");
        $("#file_name").html("เลือกไฟล์...");
        $("#fileReport").val('');
        return false;
    }
    if(fileSize > 20000000){
        toastr.warning("ไฟล์ใหญ่เกิน 20 MB.");
        $("#file_name").html("เลือกไฟล์...");
        $("#fileReport").val('');
        return false;
    }
    $("#file_name").html(" "+fileName+" ");
}
function reset_edit_report() {
    $("#file_name").html("เลือกไฟล์...");
    $("#fileReport").val('');
}
function get_Report() {
    var report_id = $("#report_id").val();
    $.ajax({
        type: "POST",
        url: "report-get-edit.php",
         data: {btnEditMain:"01",report_id:report_id},
        success: function (result) {
            var report_obj = jQuery.parseJSON(result);
            if(report_obj != '') {
                $.each(report_obj, function(key, inval) {
                    $("#report_name").val(inval["report_name"]);
                    $("#report_type").val(inval["report_type"]);
                    $("#file_old").val(inval["report_file"]);
                    $("#file_old_name").html("<a href='report/"+inval["report_file"]+"' target='_blank'>"+inval["report_file"]+"</a>");
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}