<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "astar_investment";

// $db_host = "localhost";
// $db_user = "astarinv_astarinvest";
// $db_pass = "JohnCena2022";
// $db_name = "astarinv_astar_investment";


try {
    //create PDO connection 
    // $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // echo 'masuk';
} catch (PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
