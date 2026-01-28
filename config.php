<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "102460";
$password = "";
$dbname = "Beroeps_SDOK";



$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected";
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
