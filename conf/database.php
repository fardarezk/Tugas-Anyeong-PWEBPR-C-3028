<?php 
require_once 'env.php';

// $serverName = "localhost";
// $userName = "root";
// $password = "";
// $dbname = "anyeongdb";

$app_name = $_ENV['APP_NAME'];
$url = $_ENV['BASEURL'];
$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASS'];
$database = $_ENV['DB_NAME'];

try {
  $con = new mysqli($host, $username, $password, $database);
} catch (\Throwable $e) {

  header('Location: '.$url.'/views/errors/500.php?message="'.$e.'"');
}