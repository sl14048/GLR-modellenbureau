<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);
require '../config.php';

if (isset($_SESSION["email"])) {


    $query = "SELECT * FROM modellen
            WHERE email = '{$_SESSION["email"]}'";


    $result = $conn->query($query);

    $user = $result->fetch(PDO::FETCH_ASSOC);

$model_ID = $_GET["model_ID"];


try {

    $query = "SELECT 
modellen.*, GROUP_CONCAT(modellen_fotos.fotonaam SEPARATOR ',') AS fotonaam
FROM modellen LEFT JOIN modellen_fotos ON modellen_fotos.model_ID = modellen.model_ID
WHERE modellen.model_ID = $model_ID
GROUP BY modellen.model_ID;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $row = $result[0];
    $fotos = explode(',', $row['fotonaam']);


    $aantalRijen = count($result);



include "views_student/model_info_view.php";

}  catch (PDOException $e) {
    echo "<p>Fout</p>";
    echo "<p> Query: ", $query, "</p>";
    echo "<p> Foutmelding: ", $e->getMessage(), "</p>";
    exit;
}} else{
    header("Location: inlog_verwerk.php");
}
