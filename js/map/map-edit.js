$("#patient_ampur").change(function() {
    if($("#patient_ampur").val() == "0"){
        $("#patient_tambon").val("0");
        $("#patient_tambon").prop('disabled', 'disabled');
        $("#patient_village").val("0");
        $("#patient_village").prop('disabled', 'disabled');
    } else {
        //toastr.info($("#patient_ampur").val());
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
/*------------------------------------------EDIT FUNCTION--------------------------------------------------------*/
$("#form-map-edit").on('submit', function(e){
    e.preventDefault();
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
        url: 'map-get-edit.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(result){
            if(result == "true"){
                toastr.success('แก้ไขข้อมูลสำเร็จแล้ว!');
            }else if(result == "fail1"){
                toastr.warning('ไม่มีการเปลี่ยนแปลงข้อมูล กรุณาลองใหม่อีกครั้ง!');
            }else if(result == "fail2"){
                toastr.warning('แก้ไขข้อมูลไม่สำเร็จแล้ว กรุณาลองใหม่อีกครั้ง!');
            }else {
                toastr.error('กรุณาลองใหม่อีกครั้ง!');
            }
        }
    });
});
/*----------------------------------------------------Function--------------------------------------------------------*/
function get_Patient() {
    var patient_id = $("#patient_id").val();
    $.ajax({
        type: "POST",
        url: "map-get-edit.php",
         data: {btnMapMain:"01",patient_id:patient_id},
        success: function (result) {
            var patient_obj = jQuery.parseJSON(result);
            if(patient_obj != '') {
                $.each(patient_obj, function(key, inval) {
                    $("#patient_number").val(inval["patient_number"]);
                    $("#patient_gender").val(inval["patient_gender"]);
                    $("#patient_old").val(inval["patient_old"]);
                    $("#patient_nation").val(inval["patient_nation"]);
                    $("#patient_status").val(inval["patient_status"]);
                    $("#patient_date").val(inval["patient_date"]);
                    $("#patient_timeing").val(inval["patient_timeing"]);
                    $("#patient_diagnose").val(inval["patient_diagnose"]);
        
                    $("#patient_ampur").val(inval["patient_add2"].substring(0, 4));
                    //window.alert(inval["patient_add2"].substring(0, 4));
                    get_Tambon_Edit(inval["patient_add2"]);
                    get_Village_Edit(inval["patient_add2"]);

                    //$("#patient_tambon").val(inval["patient_tambon"]);
                    //$("#patient_village").val(inval["patient_village"]);

                    $("#patient_add").val(inval["patient_add"]);
                    $("#patient_job").val(inval["patient_job"]);
                    $("#patient_comment").val(inval["patient_comment"]);

                    $("#latitude").val(inval["lat"]);
                    $("#longitude").val(inval["lon"]);
                    $("#patient_rd").val(inval["patient_rd"]);

                    let editLatlng = new google.maps.LatLng(inval["lat"],inval["lon"]);
                    let icon = Patient_marker.getIcon();
                    let Label = Patient_marker.getLabel();
                    if(inval["patient_timeing"] == "01"){
                        icon.url = "img/red_0.png";
                    }else if(inval["patient_timeing"] == "02"){
                        icon.url = "img/yellow_0.png";
                    }else if(inval["patient_timeing"] == "03"){
                        icon.url = "img/green_0.png";
                    }
                    Label.text = inval["patient_number"];
                    Patient_marker.setLabel(Label);
                    Patient_marker.setIcon(icon);
                    Patient_marker.setPosition(editLatlng);
                    Patient_circle.setRadius(parseInt(inval["patient_rd"]));
                    Patient_circle.setCenter(editLatlng);
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}