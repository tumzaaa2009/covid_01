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
/*------------------------------------------------------JQuery-----------------------------------------------------------*/
$("#btn-container").click(function () { 
    switch ($("#btn-container").val()) {
        case "1":
            $("#container-set").removeClass("container");
            $("#container-set").addClass("container-fluid");
            $("#btn-container").html('<i class="fas fa-compress-arrows-alt"></i> ย่อ');
            $("#btn-container").val('2')
            break;
        case "2":
            $("#container-set").removeClass("container-fluid");
            $("#container-set").addClass("container");
            $("#btn-container").html('<i class="fas fa-expand-arrows-alt"></i> ขยาย');
            $("#btn-container").val('1')
            break;
    }
});
$("#start_date").change(function () { 
    //toastr.info($("#start_date").val());
    
});
$("#end_date").change(function () { 
    //toastr.info($("#end_date").val()); 
});
$("#reset").click(function () { 
    $("#patient_number").val("");
    $("#alerted_number").val("");
    $("#patient_ampur").val("0");
    $("#typeSearch").val("0");
    $("#start_date").val("");
    $("#end_date").val("");
    $('#viwePatient').prop('checked', true);
    $('#viweAlerted').prop('checked', true);
    $('#viweCircle').prop('checked', true);
    viweAll();
});
$("#sent").click(function () { 
    let patient_number =  $("#patient_number").val();
    let alerted_number =  $("#alerted_number").val();
    let ampur = $("#patient_ampur").val();
    let start = $("#start_date").val();
    let end = $("#end_date").val();
    let typeSearch = $("#typeSearch").val();
    var countPatient = 0;
    var countAlerted = 0;

    $("#start_date").removeClass("border border-danger");
    $("#end_date").removeClass("border border-danger");
    if(start != "" || end != ""){
        $("#start_date").removeClass("border border-danger");
        $("#end_date").removeClass("border border-danger");
        if(start == ""){
            $("#start_date").addClass("border border-danger");
            toastr.warning('เลือกช่วงเวลาเริ่มต้น');
            return;
        }
        if(end == ""){
            $("#end_date").addClass("border border-danger");
            toastr.warning('เลือกช่วงเวลาสิ้นสุด');
            return;
        }
        if(start > end){
            $("#start_date").addClass("border border-danger");
            $("#end_date").addClass("border border-danger");
            toastr.warning('เลือกช่วงเวลาเริ่มต้น > เลือกช่วงเวลาสิ้นสุด');
            return;
        }
    }
    if(typeSearch == '0' || typeSearch == '1'){
        $.ajax({
            type: "POST",
            url: "get-map.php",
            data: {btnGeojson:"02",number:patient_number,ampur:ampur,start:start,end:end},
            success: function (result) {
                let objPatient = jQuery.parseJSON(result);
                DeletePatients();
                DeleteCircles();
                //console.log(objHospital);
                $.each(objPatient, function(i, item){
                    if(item.properties.patient_timeing == "01"){
                        var urlIcon = "img/red_0.png";
                    }else if(item.properties.patient_timeing == "02"){
                        var urlIcon = "img/yellow_0.png";
                    }else if(item.properties.patient_timeing == "03"){
                        var urlIcon = "img/green_0.png";
                    }
                    MarkerPatient = new google.maps.Marker({
                        position: new google.maps.LatLng(item.properties.lat, item.properties.lng),
                        icon: {
                            url: urlIcon,
                            labelOrigin: new google.maps.Point(11, 12),
                        },
                        map: MyMap,
                        label: {
                            text: item.properties.patient_number,
                            color: '#031BFD',
                            fontSize: '14px',
                            fontWeight: "bold"
                        },
                        title: "ผู้ป่วยยืนยันรายที่ "+item.properties.patient_number,
                    });
                    CirclePatient = new google.maps.Circle({
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.05,
                        map: MyMap,
                        center: new google.maps.LatLng(item.properties.lat, item.properties.lng),
                        radius: parseInt(item.properties.patient_rd)
                    });
            
                    info = new google.maps.InfoWindow();
                    google.maps.event.addListener(MarkerPatient, 'click', (function(MarkerPatient, i) {
                        return function() {
                            let text_info = "<table><tbody><tr><td class='text-danger'>ผู้ป่วยยืนยันลำดับที่ : </td><td>"+item.properties.patient_number+"</td></tr>"+
                                "<tr><td class='text-danger'>เพศ : </td><td>"+item.properties.patient_gender+"</td></tr>"+
                                "<tr><td class='text-danger'>อายุ : </td><td>"+item.properties.patient_old+" ปี</td></tr>"+
                                "<tr><td class='text-danger'>สัญชาติ : </td><td>"+item.properties.patient_nation+"</td></tr>"+
                                "<tr><td class='text-danger'>สถานะผู้ป่วย : </td><td>"+item.properties.patient_status+"</td></tr>"+
                                "<tr><td class='text-danger'>วันเริ่มป่วย : </td><td>"+item.properties.patient_date+"</td></tr>"+
                                "<tr><td class='text-danger'>ครบระยะ : </td><td>"+item.properties.Timeing+"</td></tr>"+
                                "<tr><td class='text-danger'>ผลการยืนยัน : </td><td>"+item.properties.Diagnose+"</td></tr>"+
                                "<tr><td class='text-danger'>ที่อยู่ : </td><td>"+item.properties.patient_add+"</td></tr>"+
                                "<tr><td class='text-danger'>ที่ทำงาน & โรงเรียน : </td><td>"+item.properties.patient_job+"</td></tr>"+
                                "<tr><td class='text-danger'>หมายเหตุ : </td><td>"+item.properties.patient_comment+"</td></tr>"+
                                "<tr><td class='text-danger'>รัศมีเเฝ้าระวัง : </td><td>"+item.properties.patient_rd+" เมตร</td></tr>"+
                            "</tbody></table>";

                            info.setContent(text_info);
                            info.open(MyMap, MarkerPatient);
                        }
                    })(MarkerPatient, i));
                    countPatient++;
                    Patients.push(MarkerPatient);
                    Circles.push(CirclePatient);
                });
                if($("#viwePatient").prop("checked") == false){
                    for (var i = 0; i < Patients.length; i++) {
                        if (Patients[i].getVisible()) {
                            Patients[i].setVisible(false);
                        }
                    }
                }
                if($("#viweCircle").prop("checked") == false){
                    for (var i = 0; i < Circles.length; i++) {
                        if (Circles[i].getVisible()) {
                            Circles[i].setVisible(false);
                        }
                    }
                }
                toastr.success("พบผู้ป่วยยืนยันทั้งหมด "+countPatient+" คน");
            }
        });
    }
    /*-----------------------ALERTED----------------------------*/
    if(typeSearch == '0' || typeSearch == '2'){
        $.ajax({
            type: "POST",
            url: "get-map.php",
            data: {btnGeojson:"03",number:alerted_number,ampur:ampur,start:start,end:end},
            success: function (result) {
                let objAlerted = jQuery.parseJSON(result);
                DeleteAlerteds();
                //console.log(objHospital);
                $.each(objAlerted, function(i, item){
                    MarkerAlerted = new google.maps.Marker({
                        position: new google.maps.LatLng(item.properties.lat, item.properties.lng),
                        icon: {
                            url: "img/blue_0.png",
                            labelOrigin: new google.maps.Point(11, 12),
                        },
                        map: MyMap,
                        label: {
                            text: item.properties.alerted_number,
                            color: '#031BFD',
                            fontSize: '14px',
                            fontWeight: "bold"
                        },
                        title: "ผู้ป่วยสงสัยรายที่ "+item.properties.alerted_number,
                    });
            
                    info = new google.maps.InfoWindow();
                    google.maps.event.addListener(MarkerAlerted, 'click', (function(MarkerAlerted, i) {
                        return function() {
                            let text_info = "<table><tbody><tr><td class='text-danger'>ผู้ป่วยสงสัยลำดับที่ : </td><td>"+item.properties.alerted_number+"</td></tr>"+
                                "<tr><td class='text-danger'>เพศ : </td><td>"+item.properties.alerted_gender+"</td></tr>"+
                                "<tr><td class='text-danger'>อายุ : </td><td>"+item.properties.alerted_old+" ปี</td></tr>"+
                                "<tr><td class='text-danger'>สัญชาติ : </td><td>"+item.properties.alerted_nation+"</td></tr>"+
                                "<tr><td class='text-danger'>สถานะผู้ป่วยสงสัย : </td><td>"+item.properties.alerted_status+"</td></tr>"+
                                "<tr><td class='text-danger'>วันเริ่มป่วย : </td><td>"+item.properties.alerted_date+"</td></tr>"+
                                "<tr><td class='text-danger'>ครบระยะ : </td><td>"+item.properties.Timeing+"</td></tr>"+
                                "<tr><td class='text-danger'>ผลการยืนยัน : </td><td>"+item.properties.Diagnose+"</td></tr>"+
                                "<tr><td class='text-danger'>ที่อยู่ : </td><td>"+item.properties.alerted_add+"</td></tr>"+
                                "<tr><td class='text-danger'>ที่ทำงาน & โรงเรียน : </td><td>"+item.properties.alerted_job+"</td></tr>"+
                                "<tr><td class='text-danger'>หมายเหตุ : </td><td>"+item.properties.alerted_comment+"</td></tr>"+
                                "<tr><td class='text-danger'>รัศมีเเฝ้าระวัง : </td><td>"+item.properties.alerted_rd+" เมตร</td></tr>"+
                            "</tbody></table>";

                            info.setContent(text_info);
                            info.open(MyMap, MarkerAlerted);
                        }
                    })(MarkerAlerted, i));
                    countAlerted++;
                    Alerteds.push(MarkerAlerted);
                });
                if($("#viweAlerted").prop("checked") == false){
                    for (var i = 0; i < Alerteds.length; i++) {
                        if (Alerteds[i].getVisible()) {
                            Alerteds[i].setVisible(false);
                        }
                    }
                }
                toastr.success("พบผู้ป่วยสงสัยทั้งหมด "+countAlerted+" คน");
            }
        });
    }
    //toastr.success("พบผู้ป่วยยืนยันทั้งหมด "+countPatient+" คน<br>"+" พบผู้ป่วยสงสัยทั้งหมด "+countAlerted+" คน");
    if(typeSearch == '0' || typeSearch == '1'){
        $.ajax({
            type: "POST",
            url: "get-main.php",
            data: {btnMapMain:"02",number:patient_number,ampur:ampur,start:start,end:end},
            success: function (result) {
                $("#table-detail-map").html(result);
                $('#dataTable').DataTable({
                    searching: true,
                    paging: true,
                    info: true,
                    responsive: true,
                });
            }
        });
    }
    if(typeSearch == '0' || typeSearch == '2'){
        $.ajax({
            type: "POST",
            url: "get-main.php",
            data: {btnMapMain:"04",number:alerted_number,ampur:ampur,start:start,end:end},
            success: function (result) {
                $("#table-detail-map-2").html(result);
                $('#dataTable-2').DataTable({
                    searching: true,
                    paging: true,
                    info: true,
                    responsive: true,
                });
            }
        });
    }
});
/*------------------------------------------------------Function-----------------------------------------------------------*/
function DeletePatients() {
    //Loop through all the markers and remove
    for (var i = 0; i < Patients.length; i++) {
        Patients[i].setMap(null);
    }
    Patients = [];
};
function DeleteCircles() {
    //Loop through all the markers and remove
    for (var i = 0; i < Circles.length; i++) {
        Circles[i].setMap(null);
    }
    Circles = [];
};
function DeleteAlerteds() {
    //Loop through all the markers and remove
    for (var i = 0; i < Alerteds.length; i++) {
        Alerteds[i].setMap(null);
    }
    Alerteds = [];
};
function map_get_table_detail() {
    $.ajax({
        type: "POST",
        url: "get-main.php",
         data: {btnMapMain:"01"},
        success: function (result) {
            $("#table-detail-map").html(result);
            $('#dataTable').DataTable({
                searching: true,
                paging: true,
                info: true,
                responsive: true,
            });
        }
    });
}
function map_get_table_detail_2() {
    $.ajax({
        type: "POST",
        url: "get-main.php",
         data: {btnMapMain:"03"},
        success: function (result) {
            $("#table-detail-map-2").html(result);
            $('#dataTable-2').DataTable({
                searching: true,
                paging: true,
                info: true,
                responsive: true,
            });
        }
    });
}
function map_summary() {
    $.ajax({
        type: "POST",
        url: "get-main.php",
         data: {btnMapMain:"05"},
        success: function (result) {
            $("#table-detail-map-3").html(result);
            $('#dataTable-summary').DataTable({
                searching: true,
                paging: false,
                info: true,
                responsive: true,
            });
        }
    });
}
function viweAll() {
    for (var i = 0; i < Patients.length; i++) {
        if (!Patients[i].getVisible()) {
            Patients[i].setVisible(true);
        }
    }
    for (var i = 0; i < Alerteds.length; i++) {
        if (!Alerteds[i].getVisible()) {
            Alerteds[i].setVisible(true);
        }
    }
    for (var i = 0; i < Circles.length; i++) {
        if (!Circles[i].getVisible()) {
            Circles[i].setVisible(true);
        }
    }
}
function viweSet(checkbox,type) {
    switch (type) {
        case "01":
            if(checkbox.checked == true){
                for (var i = 0; i < Patients.length; i++) {
                    if (!Patients[i].getVisible()) {
                        Patients[i].setVisible(true);
                    }
                }
            }else{
                for (var i = 0; i < Patients.length; i++) {
                    if (Patients[i].getVisible()) {
                        Patients[i].setVisible(false);
                    }
                }
            }
            break;
        case "02":
            if(checkbox.checked == true){
                for (var i = 0; i < Alerteds.length; i++) {
                    if (!Alerteds[i].getVisible()) {
                        Alerteds[i].setVisible(true);
                    }
                }
            }else{
                for (var i = 0; i < Alerteds.length; i++) {
                    if (Alerteds[i].getVisible()) {
                        Alerteds[i].setVisible(false);
                    }
                }
            }
            break;
        case "03":
            if(checkbox.checked == true){
                for (var i = 0; i < Circles.length; i++) {
                    if (!Circles[i].getVisible()) {
                        Circles[i].setVisible(true);
                    }
                }
            }else{
                for (var i = 0; i < Circles.length; i++) {
                    if (Circles[i].getVisible()) {
                        Circles[i].setVisible(false);
                    }
                }
            }
            break;
        default:
            for (var i = 0; i < Patients.length; i++) {
                if (!Patients[i].getVisible()) {
                    Patients[i].setVisible(true);
                }
            }
            for (var i = 0; i < Alerteds.length; i++) {
                if (!Alerteds[i].getVisible()) {
                    Alerteds[i].setVisible(true);
                }
            }
            for (var i = 0; i < Circles.length; i++) {
                if (!Circles[i].getVisible()) {
                    Circles[i].setVisible(true);
                }
            }
            break;
    }
}