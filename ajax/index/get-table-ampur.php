<?php
    session_start();
    include("../../include/connect.php");
    include("../../include/func.php");
    date_default_timezone_set("Asia/Bangkok");

    $PickDate = $_POST["PickDate"];

    $sql_ampur = "SELECT * 
        FROM campur_covid
        ORDER BY ampurcodefull ASC";
    $rs_ampur = $db_saraburi->prepare($sql_ampur);
    $rs_ampur->execute();
    $results_ampur = $rs_ampur->fetchAll();
    $columnAmpurName = array();
    $columnAmpurId = array();
    foreach($results_ampur as $row_ampur) {
        array_push($columnAmpurId, $row_ampur["ampurcodefull"]);
        array_push($columnAmpurName, $row_ampur["ampurname"]);
    }
    $cnt_ampur = count($columnAmpurId);

    $sql_cv_type = "SELECT * 
        FROM covid_type
        ORDER BY covid_type_id ASC";
    $rs_cv_type = $db_saraburi->prepare($sql_cv_type);
    $rs_cv_type->execute();
    $results_cv_type = $rs_cv_type->fetchAll();
    $columnTypeName = array();
    $columnTypeId = array();
    foreach($results_cv_type as $row_cv_type) {
        array_push($columnTypeId, $row_cv_type["covid_type_id"]);
        array_push($columnTypeName, $row_cv_type["covid_type_name"]);
    }
    $cnt_cv_type = count($columnTypeId);

    $sql = "SELECT cad.*,cah.cv_head_date
	FROM covid_amount_detail cad
    LEFT JOIN covid_amount_head cah ON cad.cv_head_id = cah.cv_head_id
    WHERE cah.cv_head_date = '$PickDate' 
    ORDER BY cad.cv_detail_type ASC,cad.cv_detail_ampur ASC";
    $rs = $db_saraburi->prepare($sql);
    $rs->execute();
    $result = $rs->fetchAll();
    $list = array();
    $cnt_fetch = 1;
    foreach($result as $row) {
        if($cnt_fetch == 1){
			$temp_warehouse_id = $row['cv_detail_type'];
		}
		if($row['cv_detail_type'] != $temp_cv_detail_type){
			$list[$row['cv_detail_type']] = array();
            $list[$row['cv_detail_type']]['cv_detail_type'] = $row['cv_detail_type'];
            $list[$row['cv_detail_type']][$row['cv_detail_ampur']] = $row['cv_detail_amount'];
		}else{
            $list[$row['cv_detail_type']][$row['cv_detail_ampur']] = $row['cv_detail_amount'];
        }
		$temp_cv_detail_type = $row['cv_detail_type'];
		$cnt_fetch++;
    }
    $SumRow = array();
    $SumCol = array();
?>

            <table class="table table-striped table-bordered table-hover" id="table_report">
                <thead class="bg-table-in-page">
                    <tr>
                        <th class="text-center" style="width: 40%;">อำเภอ</th>
                        <?php for ($i = 0; $i < $cnt_cv_type; $i++) { ?>
                            <th class="text-center" style="width: 12%;"><?php echo $columnTypeName[$i]; ?></th>
                        <?php } ?>
                        <th class="text-center" style="width: 12%;">รวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $cnt_ampur; $i++) { ?>
                        <tr id="report_1">
                            <td><?php echo $columnAmpurName[$i]; ?></td>
                            <?php for ($j = 0; $j < $cnt_cv_type; $j++) { ?>
                                <?php
                                    if($columnTypeId[$j] == 1){
                                        $texy_color = "text-danger";
                                    }elseif($columnTypeId[$j] == 2){
                                        $texy_color = "text-warning";
                                    }elseif($columnTypeId[$j] == 3){
                                        $texy_color = "text-success";
                                    }else{
                                        $texy_color = "";
                                    }
                                ?>
                                <td class="text-center <?php echo $texy_color;?>"><?php echo $list[$columnTypeId[$j]][$columnAmpurId[$i]];?></td>
                                <?php $SumRow[$columnAmpurId[$i]] = $SumRow[$columnAmpurId[$i]] + $list[$columnTypeId[$j]][$columnAmpurId[$i]];?>
                                <?php $SumCol[$columnTypeId[$j]] = $SumCol[$columnTypeId[$j]] + $list[$columnTypeId[$j]][$columnAmpurId[$i]];?>
                            <?php } ?>
                            <td class="text-center"><?php echo $SumRow[$columnAmpurId[$i]]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot  class="bg-table-in-page">
                    <tr>
                        <th class="text-center">รวม</th>
                        <?php for ($i = 0; $i < $cnt_cv_type; $i++) { ?>
                            <th class="text-center"><?php echo $SumCol[$columnTypeId[$i]]; ?></th>
                        <?php } ?>
                        <th class="text-center"><?php echo array_sum($SumCol); ?></th>
                    </tr>
                </tfoot>
            </table>