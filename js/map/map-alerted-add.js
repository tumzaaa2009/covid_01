$("#alerted_ampur").change(function() {
    if($("#alerted_ampur").val() == "0"){
        $("#alerted_tambon").val("0");
        $("#alerted_tambon").prop('disabled', 'disabled');
        $("#alerted_village").val("0");
        $("#alerted_village").prop('disabled', 'disabled');
    } else {
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
/*------------------------------------------ADD FUNCTION--------------------------------------------------------*/
$("#form-map-add").on('submit', function(e){
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
        url: 'map-alerted-add.php',
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
    $("#alerted_gender").val("0");
    $("#alerted_old").val("");
    $("#alerted_nation").val("0");
    $("#alerted_status").val("0");
    $("#alerted_date").val("");
    $("#alerted_timeing").val("0");
    $("#alerted_diagnose").val("0");
    $("#alerted_ampur").val("0");
    $("#alerted_add").val("");
    $("#alerted_job").val("");
    $("#alerted_comment").val("");

    $("#latitude").val("");
    $("#longitude").val("");
    $("#alerted_rd").val("0");

    $("#alerted_tambon").val("0");
    $("#alerted_tambon").prop('disabled', 'disabled');
    $("#alerted_village").val("0");
    $("#alerted_village").prop('disabled', 'disabled');

    let editLatlng = new google.maps.LatLng(14.521005610917983,100.91543197629255);
    Alerted_marker.setPosition(editLatlng);
    Alerted_circle.setRadius(parseInt("0"));
    Alerted_circle.setCenter(editLatlng);
    get_Number();
}
function get_Number() {
    $.ajax({
        type: "POST",
        url: "map-alerted-add.php",
         data: {btnMapMain:"01"},
        success: function (result) {
            $("#alerted_number").val(result);
            let Label = Alerted_marker.getLabel();
            Label.text = result;
            //Label.color =  '#031BFD';
            //Label.fontSize = '14px';
            //Label.fontWeight ="bold";
            Alerted_marker.setLabel(Label);
        }
    });
}

