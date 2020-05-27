$("#alerted_ampur").change(function() {
    if($("#alerted_ampur").val() == "0"){
        $("#alerted_tambon").val("0");
        $("#alerted_tambon").prop('disabled', 'disabled');
        $("#alerted_village").val("0");
        $("#alerted_village").prop('disabled', 'disabled');
    } else {
        //toastr.info($("#alerted_ampur").val());
        $("#alerted_tambon").removeAttr("disabled");
        $("#alerted_village").val("0");
        $("#alerted_village").prop('disabled', 'disabled');
        get_Tambon();
    }
});
$("#alerted_tambon").change(function() {
    if($("#alerted_tambon").val() == "0"){
        $("#alerted_village").val("0");
        $("#alerted_village").prop('disabled', 'disabled');
    } else {
        $("#alerted_village").removeAttr("disabled");
        get_Village();
    }
});
$("#alerted_number").change(function() {
    let Label = Alerted_marker.getLabel();
    if($("#alerted_number").val() == ""){
        Label.text = " ";
    } else {
        Label.text = $("#alerted_number").val();
    }
     //Label.color =  '#031BFD';
    //Label.fontSize = '14px';
    //Label.fontWeight ="bold";
    Alerted_marker.setLabel(Label);
});
$("#back").click(function () { 
    window.location.assign("map-main-alerted.php");
});
/*------------------------------------------EDIT FUNCTION--------------------------------------------------------*/
$("#form-map-edit").on('submit', function(e){
    e.preventDefault();
    /*------------------------SET 1---------------------------------*/
    if($("#alerted_diagnose").val() == "0"){
        $("#alerted_diagnose").addClass("border border-danger");
        toastr.warning('กรุณาเลือกผลการยืนยัน!!');
        return;
    }
    $("#alerted_diagnose").removeClass("border border-danger");
    /*------------------------SET 2---------------------------------*/
    if($("#alerted_ampur").val() == "0"){
        $("#alerted_ampur").addClass("border border-danger");
        toastr.warning('กรุณาเลือกอำเภอ!!');
        return;
    }
    $("#alerted_ampur").removeClass("border border-danger");

    if($("#alerted_tambon").val() == "0"){
        $("#alerted_tambon").addClass("border border-danger");
        toastr.warning('กรุณาเลือกตำบล!!');
        return;
    }
    $("#alerted_tambon").removeClass("border border-danger");

    if($("#alerted_village").val() == "0"){
        $("#alerted_village").addClass("border border-danger");
        toastr.warning('กรุณาเลือกหมู่บ้าน!!');
        return;
    }
    $("#alerted_village").removeClass("border border-danger");
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
        url: 'map-alerted-edit.php',
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
function get_Alerted() {
    var alerted_id = $("#alerted_id").val();
    $.ajax({
        type: "POST",
        url: "map-alerted-edit.php",
         data: {btnMapMain:"01",alerted_id:alerted_id},
        success: function (result) {
            var alerted_obj = jQuery.parseJSON(result);
            if(alerted_obj != '') {
                $.each(alerted_obj, function(key, inval) {
                    $("#alerted_number").val(inval["alerted_number"]);
                    $("#alerted_gender").val(inval["alerted_gender"]);
                    $("#alerted_old").val(inval["alerted_old"]);
                    $("#alerted_nation").val(inval["alerted_nation"]);
                    $("#alerted_status").val(inval["alerted_status"]);
                    $("#alerted_date").val(inval["alerted_date"]);
                    $("#alerted_timeing").val(inval["alerted_timeing"]);
                    $("#alerted_diagnose").val(inval["alerted_diagnose"]);
        
                    $("#alerted_ampur").val(inval["alerted_add2"].substring(0, 4));
                    get_Tambon_Edit(inval["alerted_add2"]);
                    get_Village_Edit(inval["alerted_add2"]);

                    //$("#alerted_tambon").val(inval["alerted_tambon"]);
                    //$("#alerted_village").val(inval["alerted_village"]);

                    $("#alerted_add").val(inval["alerted_add"]);
                    $("#alerted_job").val(inval["alerted_job"]);
                    $("#alerted_comment").val(inval["alerted_comment"]);

                    $("#latitude").val(inval["lat"]);
                    $("#longitude").val(inval["lon"]);
                    $("#alerted_rd").val(inval["alerted_rd"]);

                    let editLatlng = new google.maps.LatLng(inval["lat"],inval["lon"]);
                    let Label = Alerted_marker.getLabel();
                    Label.text = inval["alerted_number"];
                    Alerted_marker.setLabel(Label);
                    Alerted_marker.setPosition(editLatlng);

                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}