function get_GeoJsonSaraburi(){
    $.ajax({
        type: "POST",
        url: "get-map.php",
        data: {btnGeojson:"01"},
        dataType: "json",
        success: function (result) {
            MyMap.data.addGeoJson(result);
            MyMap.data.setStyle({
                fillColor: "#FFFFFF",
                fillOpacity: .01,
                strokeWeight: 3,
                strokeColor: "#990000",
            });
        }
    });
}
/*--------------------------------------------------FUNCTION OTHER-------------------------------------------------------------*/
function get_Nation() {
    $.ajax({
        type: "POST",
        url: "map-get-add.php",
         data: {btnMapMain:"02"},
        success: function (result) {
            var obj = jQuery.parseJSON(result);
            $('#alerted_nation').empty();
            var alerted_nation = $('#alerted_nation');
            if(obj != '') {
                alerted_nation.append('<option value="0">- - - เลือก - - -</option>');
                $.each(obj, function(key, inval) {
                    alerted_nation.append('<option value='+inval["nationgroup_aec"]+'>'+inval["nationname_thai"]+'</option>');
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}
function get_Ampur() {
    $.ajax({
        type: "POST",
        url: "map-get-json.php",
         data: {btnJson:"ampur"},
        success: function (result) {
            var obj = jQuery.parseJSON(result);
            $('#alerted_ampur').empty();
            var alerted_ampur = $('#alerted_ampur');
            if(obj != '') {
                alerted_ampur.append('<option value="0">- - - เลือก - - -</option>');
                $.each(obj, function(key, inval) {
                    alerted_ampur.append('<option value='+inval["ampurcodefull"]+'>'+inval["ampurname"]+'</option>');
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}
function get_Tambon() {
    var amper = $("#alerted_ampur").val();
    $.ajax({
        type: "POST",
        url: "map-get-json.php",
         data: {btnJson:"tambon",amper:amper},
        success: function (result) {
            var obj = jQuery.parseJSON(result);
            $('#alerted_tambon').empty();
            var alerted_tambon = $('#alerted_tambon');
            if(obj != '') {
                alerted_tambon.append('<option value="0">- - - เลือก - - -</option>');
                $.each(obj, function(key, inval) {
                    alerted_tambon.append('<option value='+inval["tamboncodefull"]+'>'+inval["tambonname"]+'</option>');
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}
function get_Tambon_Edit(editCode) {
    let amper = editCode.substring(0, 4)
    $.ajax({
        type: "POST",
        url: "map-get-json.php",
         data: {btnJson:"tambon",amper:amper},
        success: function (result) {
            var obj = jQuery.parseJSON(result);
            $("#alerted_tambon").removeAttr("disabled");
            $('#alerted_tambon').empty();
            var alerted_tambon = $('#alerted_tambon');
            if(obj != '') {
                alerted_tambon.append('<option value="0">- - - เลือก - - -</option>');
                $.each(obj, function(key, inval) {
                    alerted_tambon.append('<option value='+inval["tamboncodefull"]+'>'+inval["tambonname"]+'</option>');
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
            $("#alerted_tambon").val(editCode.substring(0, 6));
        }
    });
}
function get_Village() {
    var tambon = $("#alerted_tambon").val();
    $.ajax({
        type: "POST",
        url: "map-get-json.php",
         data: {btnJson:"village",tambon:tambon},
        success: function (result) {
            var obj = jQuery.parseJSON(result);
            $('#alerted_village').empty();
            var alerted_village = $('#alerted_village');
            if(obj != '') {
                alerted_village.append('<option value="0">- - - เลือก - - -</option>');
                $.each(obj, function(key, inval) {
                    alerted_village.append('<option value='+inval["villagecodefull"]+'>'+inval["villagename"]+'</option>');
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
        }
    });
}
function get_Village_Edit(editCode) {
    let tambon = editCode.substring(0, 6)
    $.ajax({
        type: "POST",
        url: "map-get-json.php",
         data: {btnJson:"village",tambon:tambon},
        success: function (result) {
            var obj = jQuery.parseJSON(result);
            $("#alerted_village").removeAttr("disabled");
            $('#alerted_village').empty();
            var alerted_village = $('#alerted_village');
            if(obj != '') {
                alerted_village.append('<option value="0">- - - เลือก - - -</option>');
                $.each(obj, function(key, inval) {
                    alerted_village.append('<option value='+inval["villagecodefull"]+'>'+inval["villagename"]+'</option>');
                });
            } else {
                    window.alert('ไม่สามารถเชื่อมต่อเซิฟเวอร์ได้ กรุณาลองใหม่อีกครั้ง!!');
            }
            $("#alerted_village").val(editCode);

        }
    });
}