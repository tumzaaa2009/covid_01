<?php
    session_start();
    include("../../include/connect.php");
    include("../../include/func.php");
    date_default_timezone_set("Asia/Bangkok");
/*----------------------------------------------------------GeoJson--------------------------------------------------------*/
  
    if($_REQUEST["btnGeojson"] == "01"){
$stdate=$_POST['PickDate'];
$endate=$_POST["Enddate"];
        $sql = "SELECT * FROM gis_area_r4  ORDER BY id_area ASC";
        $db_r4->exec("set names utf8");
        $rs = $db_r4->prepare($sql);
        $rs->execute();
        $results=$rs->fetchAll(PDO::FETCH_ASSOC);

        $sql_data = "SELECT cc.*,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad LEFT JOIN covid_amount_head_r4 cah ON cah.cvr4_head_id = cad.cvr4_head_id 
        WHERE cad.cvr4_detail_type = 2 AND cad.cvr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.cvr4_head_date ='$stdate') AS SumNotFound,

        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad LEFT JOIN covid_amount_head_r4 cah ON cah.cvr4_head_id = cad.cvr4_head_id 
        WHERE cad.cvr4_detail_type = 3 AND cad.cvr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.cvr4_head_date = '$stdate' ) AS SumConfirm ,
        
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad LEFT JOIN covid_amount_head_r4 cah ON cah.cvr4_head_id = cad.cvr4_head_id 
        WHERE cad.cvr4_detail_type = 5 AND cad.cvr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.cvr4_head_date ='$stdate') AS SumWait,
        
         (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad LEFT JOIN covid_amount_head_r4 cah ON cah.cvr4_head_id = cad.cvr4_head_id 
        WHERE cad.cvr4_detail_type = 9 AND cad.cvr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.cvr4_head_date ='$stdate' ) AS SumDeath
        
        FROM campur_covid_r4 cc
        ORDER BY cc.ampurcode_r4full_r4  ASC";
        $rs_data = $db_r4->prepare($sql_data);
        $rs_data->execute();
        $result_data = $rs_data->fetchAll();
        $list = array();
        $cnt_fetch = 1;
 foreach($result_data as $row_data) {
            $list[$row_data['ampurcode_r4full_r4']] = array();
            $list[$row_data['ampurcode_r4full_r4']]['ampurcode_r4full_r4'] = $row_data['ampurcode_r4full_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['ampurname_r4'] = $row_data['ampurname_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['SumConfirm'] = $row_data['SumConfirm'];
            $list[$row_data['ampurcode_r4full_r4']]['SumWait'] = $row_data['SumWait'];
            $list[$row_data['ampurcode_r4full_r4']]['SumNotFound'] = $row_data['SumNotFound'];
            $list[$row_data['ampurcode_r4full_r4']]['SumDeath'] = $row_data['SumDeath'];
            //---
            $list[$row_data['ampurcode_r4full_r4']]['ampurcolor_r4'] = $row_data['ampurcolor_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lat_confirm_r4'] = $row_data['lat_confirm_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lon_confirm_r4'] = $row_data['lon_confirm_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lat_wait_r4'] = $row_data['lat_wait_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lot_wait_r4'] = $row_data['lot_wait_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lat_notfound_r4'] = $row_data['lat_notfound_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lot_notfound_r4'] = $row_data['lot_notfound_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lat_daeth_r4'] = $row_data['lat_daeth_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lot_daeth_r4'] = $row_data['lot_daeth_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lat_ampurname_r4'] = $row_data['lat_ampurname_r4'];
            $list[$row_data['ampurcode_r4full_r4']]['lot_ampurname_r4'] = $row_data['lot_ampurname_r4'];

        }

        $geojson = array(
            'type'      => 'FeatureCollection',
            'features'  => array()
        ); 
        foreach($results as $row) {
            if($list[$row['id_area']]['ampurcode_r4full_r4'] == $row['id_area']){
                $temp_ampurcode_r4full_r4 = $list[$row['id_area']]['ampurcode_r4full_r4'];
                $temp_ampurname_r4 = $list[$row['id_area']]['ampurname_r4'];
                $temp_SumConfirm = $list[$row['id_area']]['SumConfirm'];
                $temp_SumWait = $list[$row['id_area']]['SumWait'];
                $temp_SumNotFound = $list[$row['id_area']]['SumNotFound'];
                $temp_SumDeath = $list[$row['id_area']]['SumDeath'];
                $temp_color = $list[$row['id_area']]['ampurcolor_r4'];
                
                $temp_lat_confirm_r4 = $list[$row['id_area']]['lat_confirm_r4'];
                $temp_lon_confirm_r4 = $list[$row['id_area']]['lon_confirm_r4'];
                $temp_lat_wait_r4 = $list[$row['id_area']]['lat_wait_r4'];
                $temp_lot_wait_r4 = $list[$row['id_area']]['lot_wait_r4'];
                $temp_lat_notfound_r4 = $list[$row['id_area']]['lat_notfound_r4'];
                $temp_lot_notfound_r4 = $list[$row['id_area']]['lot_notfound_r4'];
                $temp_lat_daeth_r4 = $list[$row['id_area']]['lat_daeth_r4'];
                $temp_lot_daeth_r4 = $list[$row['id_area']]['lot_daeth_r4'];
                $temp_lat_ampurname_r4 = $list[$row['id_area']]['lat_ampurname_r4'];
                $temp_lot_ampurname_r4 = $list[$row['id_area']]['lot_ampurname_r4'];


            }
            $feature = array(
           "type"=> "Feature",
                "properties"=> array(
                    "id" => $row['id_area'], 
                    "name"=> $row['areaname'],
                    "color"=> $temp_color,
                    "ampurcodefull"=> $temp_ampurcode_r4full_r4,
                    "ampurname"=> $temp_ampurname_r4,
                    "SumConfirm"=> $temp_SumConfirm,
                    "SumWait"=> $temp_SumWait,
                    "SumNotFound"=> $temp_SumNotFound,
                    "SumDeath"=> $temp_SumDeath,
                    "lat_confirm"=> $temp_lat_confirm_r4,
                    "lon_confirm"=> $temp_lon_confirm_r4,
                    "lat_wait"=> $temp_lat_wait_r4,
                    "lot_wait"=> $temp_lot_wait_r4,
                    "lat_notfound"=> $temp_lat_notfound_r4,
                    "lot_notfound"=> $temp_lot_notfound_r4,
                    "lat_daeth"=> $temp_lat_daeth_r4,
                    "lot_daeth"=> $temp_lot_daeth_r4,
                    "lat_ampurname"=> $temp_lat_ampurname_r4,
                    "lot_ampurname"=> $temp_lot_ampurname_r4
                ),
                "geometry"=> array(
                    "type"=> "Polygon",
                    "coordinates"=> json_decode($row['areacoordinates'], true),
                )
            );
            // Add feature array to feature collection array
            array_push($geojson['features'], $feature);
        }
        echo json_encode($geojson);
    }
    
?>