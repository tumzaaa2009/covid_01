function get_GeoJsonSaraburi() {
    let PickDate = $("#PickDate").val();
    $.ajax({
        type: "POST",
        url: "ajax/map/get-map.php",
        data: { btnGeojson: "01", PickDate: PickDate },
        dataType: "json",
        success: function(result) {
            MyGeoJson = MyMap.data.addGeoJson(result);
            MyMap.data.setStyle(function(feature) {
                var color = feature.getProperty('color');
                return {
                    fillColor: color,
                    //fillColor: "#FFFFFF",
                    //fillOpacity: .01,
                    strokeWeight: 2,
                    strokeColor: "#000",
                };
            });
        }
    });
}