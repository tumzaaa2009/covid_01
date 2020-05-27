<?php
    session_start();
     include("../../../include/connect.php");
    include("../../../include/func.php");    
    date_default_timezone_set("Asia/Bangkok");
    date_default_timezone_set("Asia/Bangkok");

    $cv_head_id = $_POST["cv_head_id"];

    $sql_head='DELETE FROM covid_amount_head_medecine_r4 WHERE crvmedr4_head_id="'.$cv_head_id.'"';
    $sql_detail='DELETE FROM covid_amount_detail_medecine_r4 WHERE cvmedr4_head_id="'.$cv_head_id.'"';

    if($db_r4->exec($sql_head) >= "1"){
        if($db_r4->exec($sql_detail) >= "1"){
            $result = 1;
        } else {
            $result = 0;
        }
    } else {
        $result = 0;
    }
    $arr['result'] = $result;
    echo json_encode($arr);
?>

