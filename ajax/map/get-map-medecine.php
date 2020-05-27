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
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad LEFT JOIN covid_amount_head_medecine_r4 cah ON cah.crvmedr4_head_id = cad.cvmedr4_head_id  
        WHERE cad.cvmedr4_detail_type = 1 AND cad.cvmedr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.crvmedr4_head_date ='$stdate') AS Surgical_Mask,

        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad LEFT JOIN covid_amount_head_medecine_r4 cah ON cah.crvmedr4_head_id = cad.cvmedr4_head_id  
        WHERE cad.cvmedr4_detail_type = 2 AND cad.cvmedr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.crvmedr4_head_date = '$stdate') AS Cover_all ,
        
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad LEFT JOIN covid_amount_head_medecine_r4 cah ON cah.crvmedr4_head_id = cad.cvmedr4_head_id 
        WHERE cad.cvmedr4_detail_type = 3 AND cad.cvmedr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.crvmedr4_head_date ='$stdate') AS N95,
        
         (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad LEFT JOIN covid_amount_head_medecine_r4 cah ON cah.crvmedr4_head_id = cad.cvmedr4_head_id  
        WHERE cad.cvmedr4_detail_type = 4 AND cad.cvmedr4_detail_ampur = cc.ampurcode_r4full_r4 AND cah.crvmedr4_head_date ='$stdate' ) AS Favipiravir_Stock
        
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

            $list[$row_data['ampurcode_r4full_r4']]['Surgical_Mask'] = $row_data['Surgical_Mask'];
            $list[$row_data['ampurcode_r4full_r4']]['Cover_all'] = $row_data['Cover_all'];
            $list[$row_data['ampurcode_r4full_r4']]['N95'] = $row_data['N95'];
            $list[$row_data['ampurcode_r4full_r4']]['Favipiravir_Stock'] = $row_data['Favipiravir_Stock'];
            //---
            //
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

                $temp_SumConfirm = $list[$row['id_area']]['Surgical_Mask'];
                $temp_SumWait = $list[$row['id_area']]['Cover_all'];
                $temp_SumNotFound = $list[$row['id_area']]['N95'];
                $temp_SumDeath = $list[$row['id_area']]['Favipiravir_Stock'];

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