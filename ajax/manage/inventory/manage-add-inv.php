<?php
    session_start();
  include("../../../include/connect.php");
    include("../../../include/func.php");
    date_default_timezone_set("Asia/Bangkok");

    $sql_cv_type = "SELECT * 
        FROM covid_type_inventory
        ORDER BY covid_typeInventory_id ASC";
    $rs_cv_type = $db_r4->prepare($sql_cv_type);
    $rs_cv_type->execute();
    $results_cv_type = $rs_cv_type->fetchAll();
    $columnTypeId = array();
    foreach ($results_cv_type as $row_cv_type) {
        array_push($columnTypeId, $row_cv_type["covid_typeInventory_id"]);
    }
    $cnt_cv_type = count($columnTypeId);

    $cv_head_date = $_POST["cv_head_date"];
    $SumCol = $_POST['SumCol'];
    $SumRow = $_POST['SumRow'];

    $temp_array = array();
    for ($i = 0; $i < $SumCol; $i++) {
        $j = 1;
        foreach ($_POST[$columnTypeId[$i]] as $key => $value) {
            $temp_array[$j][$columnTypeId[$i]] = $value;
            $j++;
        }
    }
    $cv_head_id = generateRandomString(20);
    $sql_head = "INSERT INTO covid_amount_head_inventory_r4 (crvinventoryr4_head_id, crvinventoryr4_head_date)
    VALUES ('".$cv_head_id."', '".$cv_head_date."')";
    $resultSQL = $db_r4->exec($sql_head);

    if($resultSQL == "1"){

        for ($i = 0; $i < $SumCol; $i++) {
            $ampur_code = 1;
            for ($j = 1; $j <= $SumRow; $j++) {
                if ($temp_array[$j][$columnTypeId[$i]] != "") {
                    $temp_amount = $temp_array[$j][$columnTypeId[$i]];
                } else {
                    $temp_amount = 0;
                }
                $sql_insert_detail = "INSERT INTO covid_amount_detail_inventoryr4 SET
                cvinvenr4_head_id = '$cv_head_id',
                cvinvenr4_detail_ampur = '" . $ampur_code . "',
                cvinvenr4_detail_amount = $temp_amount,
                cvinvenr4_detail_type = '" . $columnTypeId[$i] . "'";
                $db_r4->exec($sql_insert_detail);
                $ampur_code++;
            }
        }
        $result = 1;
    }else{
        $result = 0;
    }
    $arr['result'] = $result;
    echo json_encode($arr);
?>
