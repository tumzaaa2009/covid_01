<?php
       session_start();
     include("../../../include/connect.php");
    include("../../../include/func.php");   
    date_default_timezone_set("Asia/Bangkok");

/*----------------------------------------------------------REPORT-MAIN.PHP------------------------------------------------------*/
    // if($_REQUEST["btnReportMain"] == "01"){

        $title = 'ข้อมูลตึก และ ครุภัณฑ์ ';
        $sql = "SELECT cah.crvinventoryr4_head_id,cah.crvinventoryr4_head_date,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 1 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS CohortWard,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 2 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS BedEmpty,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 3 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS Aiir,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 4 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS ModifiedAirr,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 5 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS icu_covid,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 6 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS Isolationroom,
        (SELECT SUM(cad.cvinvenr4_detail_amount) FROM covid_amount_detail_inventoryr4 cad WHERE cad.cvinvenr4_detail_type = 7 AND cah.crvinventoryr4_head_id = cad.cvinvenr4_head_id) AS Respirator
FROM covid_amount_head_inventory_r4 cah
ORDER BY cah.crvinventoryr4_head_date DESC

";
        //echo $sql;        
        $rs = $db_r4->prepare($sql);
        $rs->execute();
        //echo $id;
        //echo $rs1->rowCount();
        $results = $rs->fetchAll();
        $i = 1;
        ?>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " >
            <div class="btn-group" style="float:left;">
                <button type="button" class="btn btn-success" id="report-add" onclick="window.location.assign('covit_add_inv.php');"> เพิ่มรายงาน </button>
            </div>
            <h5 style="text-align : right;"><i class="fas fa-table m-b-20"></i> <?php echo $title; ?></h5>
            <div class="table-responsive-sm">
                <!-- Header Table-->
                <table class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%">
                    <thead class="bg-table-in-page">
						<tr>	
                            <th class="text-center">วันที่อัปโหลด</th>
                            <th class="text-center">จำนวนเตียงว่างใน Cohort ward</th>
                            <th class="text-center">จำนวนเตียงว่างใน รพ.สนาม</th>
                            <th class="text-center">AIIR ที่ว่าง</th>
                            <th class="text-center">Modified AIIR ที่ว่าง</th>
                            <th class="text-center">ICU for covid -19 ที่ว่าง</th>
                            <th class="text-center">Isolation room</th>
                             <th class="text-center">Respirator</th>
                            <th class="text-center" style="width: 25px;">แก้ไข</th>
                            <th class="text-center" style="width: 25px;">ลบ</th>
						</tr>
					</thead>
                    <tbody>
                    <?php
                    foreach($results as $row) {
                    ?>
                        <tr>
                            <td class="text-center"><? if($row['crvinventoryr4_head_date'] != ""){ echo $row['crvinventoryr4_head_date']; }else{ echo "ไม่ระบุ"; }?></td>
                            <td class="text-center text-danger"><? echo $row['CohortWard'];?></td>
                            <td class="text-center text-warning"><? echo $row['BedEmpty'];?></td>
                            <td class="text-center text-success"><? echo $row['Aiir'];?></td>
                            <td class="text-center text-dark"><? echo $row['ModifiedAirr'];?></td>
                              <td class="text-center text-danger"><? echo $row['icu_covid'];?></td>
                            <td class="text-center text-warning"><? echo $row['Isolationroom'];?></td>
                            <td class="text-center text-success"><? echo $row['Respirator'];?></td>
                                  <td class="text-center"><!--<a href="report-edit.php?report_id=<? echo $row['report_id'];?>" target="_blank" ><i class="fas fa-file-signature"></i></a>--></td>
                
                            <td class="text-center"><a href="javascript:void(0);" onclick="delete_map('<?php echo $row['crvinventoryr4_head_id'];?>','<?php echo $row['crvinventoryr4_head_date'];?>')"><i class="far fa-trash-alt text-danger"></i></a></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php

    // }

?>