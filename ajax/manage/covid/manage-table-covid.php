<?php
    session_start();
     include("../../../include/connect.php");
    include("../../../include/func.php");    date_default_timezone_set("Asia/Bangkok");

/*----------------------------------------------------------REPORT-MAIN.PHP------------------------------------------------------*/
    if($_REQUEST["btnReportMain"] == "01"){

        $title = 'การเฝ้าระวังโรคโควิด 19 (COVID-19)';
        $sql = "SELECT cah.cvr4_head_id,cah.cvr4_head_date,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 1 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumStandard,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 2 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumNotFound,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 3 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumTotal,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 4 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumNEWConfirm,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 5 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumAnalasis,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 6 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumHome,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 7 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumCure,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 8 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumComa,
        (SELECT SUM(cad.cvr4_detail_amount) FROM covid_amount_detail_r4 cad WHERE cad.cvr4_detail_type = 9 AND cah.cvr4_head_id = cad.cvr4_head_id) AS SumDeath
   
FROM covid_amount_head_r4 cah
ORDER BY cvr4_head_date DESC

";
        //echo $sql;        
        $rs = $db_r4->prepare($sql);
        $rs->execute();
        //echo $id;
        //echo $rs1->rowCount();
        $results = $rs->fetchAll();
        $i = 1;
        ?>
         <div class="col" >
            <div class="btn-group" style="float:left;">
                <button type="button" class="btn btn-success" id="report-add" onclick="window.location.assign('covit_add.php');"> เพิ่มรายงาน </button>
            </div>
            <h5 style="text-align : right;"><i class="fas fa-table m-b-20"></i> <?php echo $title; ?></h5>
            <div class="table-responsive-sm">
                <!-- Header Table-->
                <table class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%">
                    <thead class="bg-table-in-page">
						<tr>	
                            <th class="text-center">วันที่อัปโหลด</th>
                            <th class="text-center">ผู้ป่วยเข้าเกณฑ์สอบสวนโรค</th>
                            <th class="text-center">ตรวจไม่พบเชื้อCovid-19</th>
                            <th class="text-center">ผู้ป่วยยืนยันสะสม</th>
                            <th class="text-center">ผู้ป่วยยืนยันรายใหม่</th>
                            <th class="text-center">รอผลการตรวจ</th>
                            <th class="text-center">กลับบ้าน</th>
                            <th class="text-center">รักษาอยู่ รพ.</th>
                            <th class="text-center">อาการรุนแรง</th>
                            <th class="text-center">เสียชีวิต</th>
                            <th class="text-center" style="width: 25px;">แก้ไข</th>
                            <th class="text-center" style="width: 25px;">ลบ</th>
						</tr>
					</thead>
                    <tbody>
                    <?php
                    foreach($results as $row) {
                    ?>
                        <tr>
                       <td class="text-center"><? if($row['cvr4_head_date'] != ""){ echo thai_date_fullmonth(strtotime($row['cvr4_head_date'])); }else{ echo "ไม่ระบุ"; }?></td>
                            <td class="text-center"><? echo $row["SumStandard"]?></td>
                            <td class="text-center text-danger"><? echo $row['SumNotFound'];?></td>
                             <td class="text-center text-warning"><? echo $row['SumTotal'];?></td>
                            <td class="text-center text-warning"><? echo $row['SumNEWConfirm'];?></td>
                            <td class="text-center text-success"><? echo $row['SumAnalasis'];?></td>
                            <td class="text-center text-dark"><? echo $row['SumHome'];?></td>
                                  <td class="text-center text-dark"><? echo $row['SumCure'];?></td>
                                        <td class="text-center text-dark"><? echo $row['SumComa'];?></td>
                                              <td class="text-center text-dark"><? echo $row['SumDeath'];?></td>
                            <td class="text-center"><!--<a href="report-edit.php?report_id=<? echo $row['report_id'];?>" target="_blank" ><i class="fas fa-file-signature"></i></a>--></td>
                            <td class="text-center"><a href="javascript:void(0);" onclick="delete_map('<?php echo $row['cvr4_head_id'];?>','<?php echo $row['cvr4_head_date'];?>')"><i class="far fa-trash-alt text-danger"></i></a></td>
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

    }

?>