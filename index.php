<?php
require_once 'include/headder.php';
require_once 'include/func.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css" media="screen">
  
</style>

</head>
<body>
<main id="main">
	 <!-- ======= สื่อประชาสัมพัน COMEINGSOON ======= -->
    <section id="about" class="about">
      <div class="container">
  <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h2>สื่อประชาสัมพันนะกสดวกสดวกสดวกสดวสกดวสกวดสกวดสกสดว</h2>
          <h2>sdsdsd</h2>
          <p>Check out our beautifull portfolio</p>
        </div>
        <div class="row justify-content-between">
          <div class="portfolio-wrap">
            <img src="img/0012.jpg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up"><i class="fas fa-newspaper"></i> รายงานสถานการณ์ Covid-19</h3>
            <p data-aos="fade-up" data-aos-delay="100">
             ประจำวันที่ ............
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Corporis voluptates sit</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Ullamco laboris nisi</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- End About Section -->
    <hr>

<!-- ==========COVID-19 =============-->
   <section id="covid-19" class="faq section-bg" >
      <div class="container-fluid">
        <div class="section-title aos-init aos-animate" data-aos="fade-up">
          <h1 style="color: #c2b7b1;">รายงานภาพรวมเขตสุขภาพที่ 4</h1>
        </div>
        <ul class="faq-list" >
     <li data-aos="fade-up" data-aos-delay="300" class="aos-init aos-animate">
            <a data-toggle="collapse" href="#fa1" class="collapsed">รายงานสถานการณ์ Covid-19<i class="fas fa-biohazard"></i></a>
            <div id="fa1" class="collapse" data-parent=".faq-list">

        <div class="section-title aos-init aos-animate mt-3" data-aos="fade-up">
          <h2>รายงานสถานการณ์ COVID</h2>
          <p>             <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                            <div class="row">
         
                                <?php
                                    $sql_date = "SELECT * 
                                    FROM covid_amount_head_r4 
                                    ORDER BY cvr4_head_date DESC";
                                    $db_r4->exec("set names utf8");
                                    $rs_date = $db_r4->prepare($sql_date);
                                    $rs_date->execute();
                                    $result_date = $rs_date->fetchAll();
                                ?>
                                <div class="col">
                                    <div class="form-group">
                                      <h4 class="py-1">ระบุวันที่</h4>
                                        <select id="PickDate_Start_date" name="PickDate_Star" class="form-control"  onchange="covid_date()" style=" text-align-last:center"> 
                                          <option value="0" selected="true" >-------ระบุวันที่รายงาน-------</option>
                                            <?php foreach($result_date as $row_date){ ?>

                                                <option value="<?php echo $row_date["cvr4_head_date"]; ?>"><?php echo thai_date_fullmonth(strtotime($row_date['cvr4_head_date']));?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
               
              <!--                <div class="col-2 " style="margin-top: 42px;"> <button type="submit" class="btn btn-primary" id="submit" value="1" onclick="covid_date()">Submit</button></div> -->
             
                            </div>
                   
                       
                        </div> 
                      </p>
        </div>

              <p>

           <div id="chartjs"> </div>
          

              </p>
            </div>
          </li>



      <!--------------------------------------------------------------------------------- MEDECINE --------------------------------------------------------------------------------->
 <li data-aos="fade-up" data-aos-delay="300" class="aos-init aos-animate">
           <a data-toggle="collapse" href="#fa2" class="collapsed"> รายงานสถานการณ์ ข้อมูลยา และ เวชภัณฑ์<i class="fas fa-pills"></i> </a>
            <div id="fa2" class="collapse" data-parent=".faq-list">


        <div class="section-title aos-init aos-animate mt-3">
          <h2> รายงานสถานการณ์ ข้อมูลยา และ เวชภัณฑ์ </h2>
          <p>            
           <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                               <?php
                                    $sql_medecine = "SELECT * 
                                    FROM covid_amount_head_medecine_r4 
                                    ORDER BY crvmedr4_head_date DESC";
                                    $db_r4->exec("set names utf8");
                                    $rs_medecine = $db_r4->prepare($sql_medecine);
                                    $rs_medecine->execute();
                                    $result_medecine = $rs_medecine->fetchAll();
                                ?>
                                      <h4 class="py-1">ระบุวันที่</h4>
                                        <select id="PickDate_Start_date_medecine" name="PickDate_Start_date_medecine" class="form-control"style=" text-align-last:center" onchange="covid_medecine()"> 
                                          <option value="0" selected="true" >-------ระบุวันที่รายงาน-------</option>
                                            <?php foreach($result_medecine as $row_date_medecine){ ?>
                                                <option value="<?php echo $row_date_medecine["crvmedr4_head_date"]; ?>"><?php echo thai_date_fullmonth(strtotime($row_date_medecine['crvmedr4_head_date']));?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
           
                            </div>
                        </div> 
                      </p>
         </div>
              <p>

           <div id="chartjs-medecine"> </div>
              </p>
            </div>
          </li>
<!-- ----------------------------------------------------ครุภัณ------------------------------------------------------------------------------------------------------- -->
 <li data-aos="fade-up" data-aos-delay="300" class="aos-init aos-animate">
           <a data-toggle="collapse" href="#fa3" class="collapsed"> รายงานสถานการณ์ ข้อมูลตึก และ ครุภัณฑ์<i class="fa fa-building" aria-hidden="true"></i> </a>
            <div id="fa3" class="collapse" data-parent=".faq-list">


        <div class="section-title aos-init aos-animate mt-3">
          <h2> รายงานสถานการณ์ ข้อมูลตึก และ ครุภัณฑ์ </h2>
          <p>            
           <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                               <?php
                                    $sql_inv = "SELECT * 
                                    FROM covid_amount_head_inventory_r4 
                                    ORDER BY crvinventoryr4_head_date DESC";
                                    $db_r4->exec("set names utf8");
                                    $rs_inv= $db_r4->prepare($sql_inv);
                                    $rs_inv->execute();
                                    $result_inv = $rs_inv->fetchAll();
                                ?>
                                      <h4 class="py-1">ระบุวันที่</h4>
                                        <select id="PickDate_Start_date_inventory" name="PickDate_Start_date_inventory" class="form-control"style=" text-align-last:center" onchange="covid_inv()"> 
                                          <option value="0" selected="true" >-------ระบุวันที่รายงาน-------</option>
                                            <?php foreach($result_inv as $rv_inv){ ?>
                                                <option value="<?php echo $rv_inv["crvinventoryr4_head_date"]; ?>"><?php echo thai_date_fullmonth(strtotime($rv_inv['crvinventoryr4_head_date']));?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
           
                            </div>
                        </div> 
                      </p>
         </div>
              <p>

           <div id="chartjs-inv"> </div>
              </p>
            </div>
          </li>
        </ul>

      </div>
    </section>
 

</main>
<?php require_once 'include/headder_footter.php'; ?>
</body>
 <script src="lib/chart.js/Chart.js"></script>
   <script src="lib/chart.js/utils.js"></script>
  <!-- ผู้ป่วย  -->
<script>

  function covid_date(){ 
// let submit = document.getElementById("submit").value;
let PickDate_Start_date = document.getElementById("PickDate_Start_date").value;
// let PickDate_End_date = document.getElementById("PickDate_End_date").value;
    $.ajax({
      url: 'ajax/chartjs/chartjs-covit.php',
      type: 'POST',
      data: {param2:PickDate_Start_date},           
       success: function (result) {
                        $("#chartjs").html(result);
             
                    }
    })
   }

</script>
<!-- ยาและเวชภัณ -->
<script>
  function covid_medecine(){ 

 let PickDate_Start_date_medecine = document.getElementById("PickDate_Start_date_medecine").value;
console.log(PickDate_Start_date_medecine);
     $.ajax({
       url: 'ajax/chartjs/chartjs-medecine.php',
      type: 'POST',
      data: {param2:PickDate_Start_date_medecine},           
       success: function (result) {
                        $("#chartjs-medecine").html(result);
             
                     }
    })
    }

</script>
<!-- ครุภัณ -->
<script>
  function covid_inv(){ 

 let PickDate_Start_date_inventory = document.getElementById("PickDate_Start_date_inventory").value;
console.log(PickDate_Start_date_inventory);
     $.ajax({
       url: 'ajax/chartjs/chartjs-inv.php',
      type: 'POST',
      data: {param2:PickDate_Start_date_inventory},           
       success: function (result) {
                        $("#chartjs-inv").html(result);
             
                     }
    })
    }


</script>
</html>