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
$("#report_type").change(function (e) { 
    e.preventDefault();
    let report_type = $("#report_type").val();
    if(report_type != "0"){
        $.ajax({
            type: "POST",
            url: "form-input-type.php",
            data: {report_type : report_type},
            dataType: "html",
            success: function (response) {
                $("#ShowTypeInput").html(response);
            }
        });
    }else{
        $("#ShowTypeInput").html('<div class="col-12 text-center"><p>กรุณาเลือกประเภทการอัปโหลด !</p></div>');
    }
});
$("#back").click(function () { 
    window.location.assign("report-main.php");
});
$("#report-add").on('submit', function(e){
    e.preventDefault();
    if($("#report_name").val() == ""){
        $("#report_name").addClass("border border-danger");
        toastr.warning('กรุณาเพิ่มชื่อรายงาน!!');
        return;
    }
    $("#report_name").removeClass("border border-danger");

    if($("#report_type").val() == "0"){
        $("#report_type").addClass("border border-danger");
        toastr.warning('กรุณาเลือกประเภทรายงาน!!');
        return;
    }
    $("#report_type").removeClass("border border-danger");
    if($("#report_type").val() == "1"){
        if($("#fileReport").val() == ""){
            $("#file_name").addClass("border border-danger");
            toastr.warning('กรุณาเลือกไฟล์!!');
            return;
        }
        $("#file_name").removeClass("border border-danger");
    }else if($("#report_type").val() == "2"){
        if($("#fileReport").val() == ""){
            toastr.warning('กรุณาเลือกไฟล์!!');
            return;
        }
    }else if($("#report_type").val() == "3"){
        if($("#fileReport").val() == ""){
            $("#fileReport").addClass("border border-danger");
            toastr.warning('กรุณาเพิ่ม URL!!');
            return;
        }
        $("#fileReport").removeClass("border border-danger");
    }
    $.ajax({
        type: 'POST',
        url: 'report-get-add.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(result){
            if(result == "true"){
                toastr.success("เพิ่มไฟล์สำเร็จแล้ว!");
                reset_add_report();
            }else if(result == "fail"){
                toastr.error("เพิ่มไฟล์ไม่สำเร็จ กรุณาลองใหม่อีกครั้ง!");
            }else if(result == "fileyet"){
                toastr.warning("ชื่อไฟล์ซ้ำ กรุณาลองใหม่อีกครั้ง!");
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
function reset_add_report() {
    $("#report_name").val('');
    $("#report_type").val('0');
    $("#fileReport").val('');
    $("#ShowTypeInput").html('<div class="col-12 text-center"><p>กรุณาเลือกประเภทการอัปโหลด !</p></div>');
}
function readURL(input,value,show_position) {
    var fty = ["gif", "jpg", "jpeg", "png"];
    var permiss = 0;
    var file_type = value.split('.');
    file_type = file_type[file_type.length-1];
    if (jQuery.inArray( file_type , fty ) !== -1) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(show_position).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else if (value == "") {
        $(show_position).attr('src','img/NO_IMG.png');
        $(input).val("");
    } else {
        toastr.warning("อัพโหลดได้เฉพาะไฟล์นามสกุล (.gif .jpg .jpeg .png) เท่านั้น");
        $(show_position).attr('src','img/NO_IMG.png');
        $(input).val("");
        return false;
    }
}
