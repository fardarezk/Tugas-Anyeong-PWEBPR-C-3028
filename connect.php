<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "anyeongdb";

$con = mysqli_connect($serverName, $userName, $password, $dbname);
if (!$con){
    die("Koneksi Gagal". mysqli_connect_error());
}

?>