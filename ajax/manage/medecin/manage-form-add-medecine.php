<?php
    session_start();
  include("../../../include/connect.php");
    include("../../../include/func.php");   
    date_default_timezone_set("Asia/Bangkok");

    date_default_timezone_set("Asia/Bangkok");

    $sql_ampur = "SELECT * 
        FROM campur_covid_r4
        ORDER BY ampurcode_r4full_r4 ASC";
    $rs_ampur = $db_r4->prepare($sql_ampur);
    $rs_ampur->execute();
    $results_ampur = $rs_ampur->fetchAll();
    $columnAmpurName = array();
    $columnAmpurId = array();
    foreach($results_ampur as $row_ampur) {
        array_push($columnAmpurId, $row_ampur["ampurcode_r4full_r4"]);
        
     array_push($columnAmpurName, $row_ampur["ampurname_r4"]);


    }
    $cnt_ampur = count($columnAmpurId);

    $sql_cv_type = "SELECT * 
        FROM covid_type_medecine
        ORDER BY covid_typeMedecine_id ASC";
    $rs_cv_type = $db_r4->prepare($sql_cv_type);
    $rs_cv_type->execute();
    $results_cv_type = $rs_cv_type->fetchAll();
    $columnTypeName = array();
    $columnTypeId = array();
    foreach($results_cv_type as $row_cv_type) {
        array_push($columnTypeId, $row_cv_type["covid_typeMedecine_id"]);
        array_push($columnTypeName, $row_cv_type["covid_typeMedecine_name"]);
    }
    $cnt_cv_type = count($columnTypeId);

?>
    <div class="container">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <form id="map_add" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 mb-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"> วันที่ข้อมูล</div>
                        </div>
                        <input type="date" class="form-control" id="cv_head_date" name="cv_head_date" value="<?php echo date("Y-m-d");?>">
                    </div>
                </div>
            </div>
            <input type="hidden" name="SumCol" id="SumCol" value="<?php echo $cnt_cv_type; ?>">
            <input type="hidden" name="SumRow" id="SumRow" value="<?php echo $cnt_ampur; ?>">
            <table class="table table-hover" id="table_report">
                <thead>
                    <tr>
                        <th class="text-center">รายการ</th>
                        <?php for ($i = 0; $i < $cnt_cv_type; $i++) { ?>
                            <th class="text-center"><?php echo $columnTypeName[$i]; ?></th>
                        <?php } ?>
                        <th class="text-center">รวม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $cnt_ampur; $i++) { ?>
                        <tr id="report_1">
                            <td><?php echo "จ.".$columnAmpurName[$i]; ?></td>
                            <?php for ($j = 0; $j < $cnt_cv_type; $j++) { ?>
                                <td><input type="number" style="text-align:right;" class="form-control" name="<?php echo $columnTypeId[$j]; ?>[]" id="amount<?php echo $j . "-" . $i; ?>" data-col="<?php echo $j; ?>" data-row="<?php echo $i; ?>" value="0" onchange="processQuantity(this)"></td><!--onchange="processQuantity(this)"-->
                            <?php } ?>
                            <td class="text-center"><input type="text" class="form-control" id="SumRow<?php echo $i; ?>" style="text-align:right;" value="0" readonly></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">รวม</th>
                        <?php for ($i = 0; $i < $cnt_cv_type; $i++) { ?>
                            <th class="text-center"><input type="text" class="form-control" id="SumCol<?php echo $i; ?>" style="text-align:right;" value="0" readonly></th>
                        <?php } ?>
                        <th class="text-center"><input type="text" class="form-control" id="SumAll" style="text-align:right;" value="0" readonly></th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-4 text-center">
                    <button type="button" class="btn btn-success" onclick="MapDataAdd();">บันทึกข้อมุล</button>
                    <button type="button" class="btn btn-white" onclick="Back();">ย้อนกลับ</button>
                </div>
            </div>
        </form>
    </div>
</div>