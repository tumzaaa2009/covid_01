<?php 
//defind variable
$Server="localhost"; //ip address ของ mysql sever
$User="root"; // mysql user
$Pass="1"; //mysql password
$DBName="r4"; // ชื่อฐานข้อมูล
$Port = '';
// ////////
$objconnect = mysqli_connect($Server,$User,$Pass) or die("GG");
// $objquery = mysqli_query($objconnect,"SET CHARACTER SET UTF8");
// print_r($_POST);
mysqli_select_db($objconnect,"r4");
date_default_timezone_set('Asia/Bangkok');  
$objquery = mysqli_query($objconnect,"SET CHARACTER SET UTF8");

?>


