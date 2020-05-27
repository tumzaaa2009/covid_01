
<?php
include_once ('../../include/connect.php');
include('../../include/func.php');

$St_date = $_REQUEST['param2'];

 if ($St_date==0) {
 
 }else{ 
 ?>

<html>

	<title>Line Chart</title>

	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>

 <script src="lib/chart.js/Chart.js"></script>
   <script src="lib/chart.js/utils.js"></script>
<body>
<?php 
$sql  = "SELECT cah.crvmedr4_head_id,cah.crvmedr4_head_date,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 1 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Surgical_Mask,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 2 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Cover_all,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 3 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS N95,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 4 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Favipiravir_Stock
FROM covid_amount_head_medecine_r4 cah where cah.crvmedr4_head_date = '$St_date'
ORDER BY crvmedr4_head_id ASC ";


$db_r4->exec("set names utf8");
    $rs_date = $db_r4->prepare($sql);
    $rs_date->execute();
   $result_date = $rs_date->fetchAll(); 
   $num_static = 0;  
  
  	$list_date = array();

    $Surgical_Mask =array();

  	$Cover_all = array();

  	$N95 = array();

    $Favipiravir_Stock=array();




  	
  	

   foreach ($result_date as $rs_value) {
 
 $list_date[$num_static]= thai_date_fullmonth(strtotime($rs_value['crvmedr4_head_date']));

 $Surgical_Mask[$num_static] = $rs_value["Surgical_Mask"];
	
  $Cover_all[$num_static] = $rs_value["Cover_all"];

 $N95[$num_static]	= $rs_value["N95"];

 $Favipiravir_Stock[$num_static] = $rs_value["Favipiravir_Stock"];


     		

	$num_static++;
        	

   }

// echo json_encode($list_date) ;
 

?>
<!-- chartjs -->
<section class="mychart-covid">
    <div class="container-fluid" align="center">
        <div style="width: 50%;height: 50%;">
            <canvas id="myChart"  style="background-color: white;"></canvas>

        </div>
    </div>
</section>

	

<!-- TABLE -->
<section id="table_chart">
    

<div class="col-12" align="center"> <p>
<h2 style="color: #c2b7b1;" class="mt-5" >ตารางแสดงประเภทของการติดเชื้อ Covid-19</h2></p></div>


          <div class="container-fluid"  >  	
        <table class="table table-bordered" style="background-color: white;">
      
        	<thead>
        		<tr>
        			<th>อันดับ</th>
        			<th>วันที่</th>
        			<th>Surgical Mask</th>
        			<th>Cover all</th>
        			<th>N95</th>
        			<th>Favipiravir Stock</th>

        		</tr>
        	</thead>
        	<tbody>

        		<?php 
        		$sql_table  = "SELECT cah.crvmedr4_head_id,cah.crvmedr4_head_date,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 1 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Surgical_Mask,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 2 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Cover_all,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 3 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS N95,
        (SELECT SUM(cad.cvmedr4_detail_amount) FROM covid_amount_detail_medecine_r4 cad WHERE cad.cvmedr4_detail_type = 4 AND cah.crvmedr4_head_id = cad.cvmedr4_head_id) AS Favipiravir_Stock
FROM covid_amount_head_medecine_r4 cah where cah.crvmedr4_head_date = '$St_date'
ORDER BY crvmedr4_head_id ASC ";

$db_r4->exec("set names utf8");
    $rs_table = $db_r4->prepare($sql_table);
    $rs_table->execute();
   $result_table = $rs_table->fetchAll(); 
$numorder = 1;



$SumEmergency= 0 ;
        		foreach ($result_table as $valuetable){ 



        			?>
        		
        		<tr>
        			<td><?=$numorder?></td>
        			<td><?=thai_date_fullmonth(strtotime($valuetable['crvmedr4_head_date']))?></td>
        						<td><?=$valuetable['Surgical_Mask']?></td>
        						<td><?=$valuetable['Cover_all']?></td>
        						<td><?=$valuetable['N95']?></td>
        						<td><?=$valuetable['Favipiravir_Stock']?></td>
        		</tr>
        			<?php $numorder++;} ?>
        	</tbody>


        </table>
        </div>  
             
       
	</section>

<!-- แสดงแผนที่ -->
 <section id="GETMAP">
                <div class="container-fluid" id="container-set">
                    <div class="section-header">
                        <h5  style="color: #c2b7b1;" class="mt-5 col-12" align="center"> แผนที่แสดงรายการข้อมูลยา และ เวชภัณฑ์ </h5>
                        <span class="section-divider"></span>
                    </div>
                    <div class="row more-features-name">
                      
                        <div class="col-lg-12">
                            <div id="map" class="wow fadeIn"></div>
                            <div class="row wow fadeInUp mt-3 mb-0">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 clients-img pl-5 pl-lg-5 pl-md-5 pl-sm-5">
                                    <img src="img/red_1.png" alt=""><span> : Surgical Mask</span>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 clients-img pl-5 pl-lg-5 pl-md-5 pl-sm-5">
                                    <img src="img/yellow_1.png" alt=""><span> : Cover all</span>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 clients-img pl-5 pl-lg-5 pl-md-5 pl-sm-5">
                                    <img src="img/green_1.png" alt=""><span> : N95</span>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 clients-img pl-5 pl-lg-5 pl-md-5 pl-sm-5">
                                    <img src="img/black_1.png" alt=""><span> : Favipiravir Stock</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<? }?> 
	<script>


function getRandomColorHex() {
    var hex = "0123456789ABCDEF",
        color = "#";
    for (var i = 1; i <= 6; i++) {
      color += hex[Math.floor(Math.random() * 16)];
    }
    return color;
  }

	
		var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels:<?=json_encode($list_date)?>,
        datasets: [
       		   {
					label: 'Surgical Mask',
					backgroundColor: getRandomColorHex(),
					borderColor:  getRandomColorHex(),
					data:<?=json_encode($Surgical_Mask)?>,
					fill: false,
				}, 
				   {
					label: 'Cover all',
					backgroundColor: getRandomColorHex(),
					borderColor:  getRandomColorHex(),
					data:<?=json_encode($Cover_all)?>,
					fill: false,
				}, 
				        {
					label: 'N95',
					backgroundColor: getRandomColorHex(),
					borderColor:  getRandomColorHex(),
					data:<?=json_encode($N95)?>,
					fill: false,
				}, 
				        {
					label: 'Favipiravir Stock',
					backgroundColor: getRandomColorHex(),
					borderColor:  getRandomColorHex(),
					data:<?=json_encode($Favipiravir_Stock)?>,
					fill: false,
				}, 
				     
			
				]
			},

    // Configuration options go here
		options: {
				responsive: true,
					legend: {
					position: 'right',
				},
				title: {
					display: true,
					text: 'แผนภูมิแสดงจำนวนผู้ป่วยโควิด'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'วันที่'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'จำนวนประชากร'
						}
					}]
				}
			}
});

	</script>
    <script>
         $(document).ready(function(){
       
                //$('#PickDate').select2();
                get_GeoJsonSaraburi();
                LoadTableAmpur();
   
            });
            var MyMap;
            var SumMarker;
            var Marker = [];
            function myMap() {
                MyMap = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 14.424766687092593, lng:100.52428124453127},
                    zoom: 9,
                });
    
            }
            function get_GeoJsonSaraburi() {
                let PickDate = $("#PickDate").val();
                let stdate = "<?=$St_date?>";
                let endate = "<?=$End_date?>";
                $.ajax({
                    type: "POST",
                    url: "ajax/map/get-map-medecine.php",
                    data: { btnGeojson: "01", PickDate:stdate,Enddate:endate },
                    dataType: "json",
                    success: function(result) {
                        MyMap.data.forEach(function(feature) {
                            MyMap.data.remove(feature);
                        });
                        
                        MyMap.data.addGeoJson(result);
                        MyMap.data.setStyle(function(feature) {
                            var color = feature.getProperty('color');
                            return {
                                fillColor: color,
                                fillOpacity: 0.3,
                                strokeWeight: 2,
                                strokeColor: "#000",
                            };
                        });
                        DeleteSumMarker();
                        MyMap.data.forEach(function(feature) {
                            if(feature.getProperty('SumConfirm') > 0){
                                SumMarker = new google.maps.Marker({
                                    position: new google.maps.LatLng(feature.getProperty('lat_confirm'), feature.getProperty('lon_confirm')),
                                    icon: {
                                        url: "img/red_1.png",
                                        labelOrigin: new google.maps.Point(12, 13),
                                        //size: new google.maps.Size(32,32),
                                        //anchor: new google.maps.Point(16,32)
                                    },
                                    map: MyMap,
                                    label: {
                                        text: feature.getProperty('SumConfirm'),
                                        color: '#031BFD',
                                        fontSize: '14px',
                                        fontWeight: "bold"
                                    },
                                    title: 'Surgical Mask',
                                });
                                Marker.push(SumMarker);
                            }
                            if(feature.getProperty('SumWait') > 0){
                                SumMarker = new google.maps.Marker({
                                    position: new google.maps.LatLng(feature.getProperty('lat_wait'), feature.getProperty('lot_wait')),
                                    icon: {
                                        url: "img/yellow_1.png",
                                        labelOrigin: new google.maps.Point(12, 13),
                                        //size: new google.maps.Size(32,32),
                                        //anchor: new google.maps.Point(16,32)
                                    },
                                    map: MyMap,
                                    label: {
                                        text: feature.getProperty('SumWait'),
                                        color: '#031BFD',
                                        fontSize: '14px',
                                        fontWeight: "bold"
                                    },
                                    title: 'Cover all',
                                });
                                Marker.push(SumMarker);
                            }
                            if(feature.getProperty('SumNotFound') > 0){
                                SumMarker = new google.maps.Marker({
                                    position: new google.maps.LatLng(feature.getProperty('lat_notfound'), feature.getProperty('lot_notfound')),
                                    icon: {
                                        url: "img/green_1.png",
                                        labelOrigin: new google.maps.Point(12, 13),
                                        //size: new google.maps.Size(32,32),
                                        //anchor: new google.maps.Point(16,32)
                                    },
                                    map: MyMap,
                                    label: {
                                        text: feature.getProperty('SumNotFound'),
                                        color: '#031BFD',
                                        fontSize: '14px',
                                        fontWeight: "bold"
                                    },
                                    title: 'N95',
                                });
                                Marker.push(SumMarker);
                            }
                            if(feature.getProperty('SumDeath') > 0){
                                SumMarker = new google.maps.Marker({
                                    position: new google.maps.LatLng(feature.getProperty('lat_daeth'), feature.getProperty('lot_daeth')),
                                    icon: {
                                        url: "img/black_1.png",
                                        labelOrigin: new google.maps.Point(12, 13),
                                        //size: new google.maps.Size(32,32),
                                        //anchor: new google.maps.Point(16,32)
                                    },
                                    map: MyMap,
                                    label: {
                                        text: feature.getProperty('SumDeath'),
                                        color: '#fff',
                                        fontSize: '14px',
                                        fontWeight: "bold"
                                    },
                                    title: 'Favipiravir Stock',
                                });
                                Marker.push(SumMarker);
                            }
                            SumMarker = new google.maps.Marker({
                                position: new google.maps.LatLng(feature.getProperty('lat_ampurname'), feature.getProperty('lot_ampurname')),
                                icon: {
                                    url: "img/tran_1.png",
                                    labelOrigin: new google.maps.Point(15, 12),
                                    //size: new google.maps.Size(32,32),
                                    //anchor: new google.maps.Point(16,32)
                                },
                                map: MyMap,
                                label: {
                                    text: feature.getProperty('ampurname'),
                                    color: '#000',
                                    fontSize: '14px',
                                    fontWeight: "bold"
                                },
                                title: 'ชื่ออำเภอ',
                            });
                            Marker.push(SumMarker);
                        });
                    }
                });
            }
            function DeleteSumMarker() {
                for (var i = 0; i < this.Marker.length; i++) {
                    this.Marker[i].setMap(null);
                }
                this.Marker = [];
            };
            function LoadTableAmpur() {
                let PickDate = $("#PickDate").val();
                $.ajax({
                    beforeSend: function(){
                        $("#TableCovidAmpur").hide();
                        //$("#Loading-1").show();
                    },
                    type: "POST",
                    url: "ajax/index/get-table-ampur.php",
                    data: {PickDate : PickDate},
                    dataType: "html",
                    success: function (response) {
                        $("#TableCovidAmpur").html(response);
                        $("#Loading-1").hide();
                        $("#TableCovidAmpur").show(1000);
                    
                    }
                });
            }
        </script>
             <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZFR0XkzirjAzUpXl8a3qCFarD7P7mNf8&callback=myMap" type="text/javascript"></script>
</body>

</html>
