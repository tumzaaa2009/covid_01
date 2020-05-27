$("#patient_ampur").change(function() {
    if($("#patient_ampur").val() == "0"){
        $("#patient_tambon").val("0");
        $("#patient_tambon").prop('disabled', 'disabled');
        $("#patient_village").val("0");
        $("#patient_village").prop('disabled', 'disabled');
    } else {
        $("#patient_tambon").removeAttr("disabled");
        $("#patient_village").val("0");
        $("#patient_village").prop('disabled', 'disabled');
        get_Tambon();
    }
});
$("#patient_tambon").change(function() {
    if($("#patient_tambon").val() == "0"){
        $("#patient_village").val("0");
        $("#patient_village").prop('disabled', 'disabled');
    } else {
        $("#patient_village").removeAttr("disabled");
        get_Village();
    }
});
$("#patient_number").change(function() {
    let Label = Patient_marker.getLabel();
    if($("#patient_number").val() == ""){
        Label.text = " ";
    } else {
        Label.text = $("#patient_number").val();
    }
     //Label.color =  '#031BFD';
    //Label.fontSize = '14px';
    //Label.fontWeight ="bold";
    Patient_marker.setLabel(Label);
});
$("#back").click(function () { 
    window.location.assign("map-main.php");
});
/*------------------------------------------ADD FUNCTION--------------------------------------------------------*/
$("#form-map-add").on('submit', function(e){
    e.preventDefault();
    /*------------------------SET 0---------------------------------*/
    if($("#patient_number").val() == ""){
        $("#patient_number").addClass("border border-danger");
        toastr.warning('กรุณาเลือกลำดับผู้ป่วยยืนยัน!!');
        return;
    }
    $("#patient_number").removeClass("border border-danger");
    /*------------------------SET 1---------------------------------*/
    if($("#patient_timeing").val() == "0"){
        $("#patient_timeing").addClass("border border-danger");
        toastr.warning('กรุณาเลือกครบระยะเวลา!!');
        return;
    }
    $("#patient_timeing").removeClass("border border-danger");

    if($("#patient_diagnose").val() == "0"){
        $("#patient_diagnose").addClass("border border-danger");
        toastr.warning('กรุณาเลือกผลการยืนยัน!!');
        return;
    }
    $("#patient_diagnose").removeClass("border border-danger");
    /*------------------------SET 2---------------------------------*/
    if($("#patient_ampur").val() == "0"){
        $("#patient_ampur").addClass("border border-danger");
        toastr.warning('กรุณาเลือกอำเภอ!!');
        return;
    }
    $("#patient_ampur").removeClass("border border-danger");

    if($("#patient_tambon").val() == "0"){
        $("#patient_tambon").addClass("border border-danger");
        toastr.warning('กรุณาเลือกตำบล!!');
        return;
    }
    $("#patient_tambon").removeClass("border border-danger");

    if($("#patient_village").val() == "0"){
        $("#patient_village").addClass("border border-danger");
        toastr.warning('กรุณาเลือกหมู่บ้าน!!');
        return;
    }
    $("#patient_village").removeClass("border border-danger");
    /*------------------------SET 3---------------------------------*/
    if($("#latitude").val() == "" || $("#longitude").val() == ""){
        $("#latitude").addClass("border border-danger");
        $("#longitude").addClass("border border-danger");
        toastr.warning('กรุณาเพิ่มตำแหน่งเฝ้าระวัง!!');
        return;
    }
    $("#latitude").removeClass("border border-danger");
    $("#longitude").removeClass("border border-danger");
    $.ajax({
        type: 'POST',
        url: 'map-get-add.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(result){
            if(result == "true"){
                toastr.success('เพิ่มข้อมูลสำเร็จแล้ว!');
                reset_ADD();
            } else if(result == "fail1"){
                toastr.warning('เพิ่มข้อมูลไม่สำเร็จแล้ว กรุณาลองใหม่อีกครั้ง! [1]');
            } else if(result == "fail2"){
                toastr.warning('เพิ่มข้อมูลไม่สำเร็จแล้ว กรุณาลองใหม่อีกครั้ง! [2]');
            } else {
                toastr.error('กรุณาลองใหม่อีกครั้ง!');
            }
        }
    });
});
/*----------------------------------------------------Function--------------------------------------------------------*/
function reset_ADD() {
    $("#patient_gender").val("0");
    $("#patient_old").val("");
    $("#patient_nation").val("0");
    $("#patient_status").val("0");
    $("#patient_date").val("");
    $("#patient_timeing").val("0");
    $("#patient_diagnose").val("0");
    $("#patient_ampur").val("0");
    $("#patient_add").val("");
    $("#patient_job").val("");
    $("#patient_comment").val("");

    $("#latitude").val("");
    $("#longitude").val("");
    $("#patient_rd").val("0");

    $("#patient_tambon").val("0");
    $("#patient_tambon").prop('disabled', 'disabled');
    $("#patient_village").val("0");
    $("#patient_village").prop('disabled', 'disabled');

    let editLatlng = new google.maps.LatLng(14.521005610917983,100.91543197629255);
    let icon = Patient_marker.getIcon();
    icon.url = "img/green_0.png";
    Patient_marker.setIcon(icon);
    Patient_marker.setPosition(editLatlng);
    Patient_circle.setRadius(parseInt("0"));
    Patient_circle.setCenter(editLatlng);
    get_Number();
}
function get_Number() {
    $.ajax({
        type: "POST",
        url: "map-get-add.php",
         data: {btnMapMain:"01"},
        success: function (result) {
            $("#patient_number").val(result);
            let Label = Patient_marker.getLabel();
            Label.text = result;
            //Label.color =  '#031BFD';
            //Label.fontSize = '14px';
            //Label.fontWeight ="bold";
            Patient_marker.setLabel(Label);
        }
    });
}

