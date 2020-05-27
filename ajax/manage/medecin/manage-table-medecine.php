<?php
       session_start();
     include("../../../include/connect.php");
    include("../../../include/func.php");   
    date_default_timezone_set("Asia/Bangkok");

/*----------------------------------------------------------REPORT-MAIN.PHP------------------------------------------------------*/
    // if($_REQUEST["btnReportMain"] == "01"){

        $title = 'ข้อมูลยาและเภชภัณฑ์ ';
        $sql = "SELECT cah.crvmedr4_head_id,cah.crvmedr4_head_date,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 1 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Surgical_Mask,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 2 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Cover_all,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 3 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS N95,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 4 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Favipiravir_Stock
FROM covid_amount_head_medecine_r4 cah
ORDER BY crvmedr4_head_id DESC

";
        //echo $sql;        
        $rs = $db_r4->prepare($sql);
        $rs->execute();
        //echo $id;
        //echo $rs1->rowCount();
        $results = $rs->fetchAll();
        $i = 1;
        ?>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
            <div class="btn-group" style="float:left;">
                <button type="button" class="btn btn-success" id="report-add" onclick="window.location.assign('covit_add_medecine.php');"> เพิ่มรายงาน </button>
            </div>
            <h5 style="text-align : right;"><i class="fas fa-table m-b-20"></i> <?php echo $title; ?></h5>
            <div class="table-responsive-sm">
                <!-- Header Table-->
                <table class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%">
                    <thead class="bg-table-in-page">
						<tr>	
                            <th class="text-center">วันที่อัปโหลด</th>
                            <th class="text-center">Surgical Mask</th>
                            <th class="text-center">Cover All</th>
                            <th class="text-center">N5</th>
                            <th class="text-center">Favipiravir Stock</th>
                            <th class="text-center" style="width: 25px;">แก้ไข</th>
                            <th class="text-center" style="width: 25px;">ลบ</th>
						</tr>
					</thead>
                    <tbody>
                    <?php
                    foreach($results as $row) {
                    ?>
                        <tr>
                            <td class="text-center"><? if($row['crvmedr4_head_date'] != ""){ echo $row['crvmedr4_head_date']; }else{ echo "ไม่ระบุ"; }?></td>
                            <td class="text-center text-danger"><? echo $row['Surgical_Mask'];?></td>
                            <td class="text-center text-warning"><? echo $row['Cover_all'];?></td>
                            <td class="text-center text-success"><? echo $row['N95'];?></td>
                            <td class="text-center text-dark"><? echo $row['Favipiravir_Stock'];?></td>
                            <td class="text-center"><!--<a href="report-edit.php?report_id=<? echo $row['report_id'];?>" target="_blank" ><i class="fas fa-file-signature"></i></a>--></td>
                            <td class="text-center"><a href="javascript:void(0);" onclick="delete_map('<?php echo $row['crvmedr4_head_id'];?>','<?php echo $row['crvmedr4_head_date'];?>')"><i class="far fa-trash-alt text-danger"></i></a></td>
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