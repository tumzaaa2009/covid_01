<?php
    session_start();
    if(!isset($_SESSION['valid_covid_id'])){
        header("location: index.php");
    }
?>