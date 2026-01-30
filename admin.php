<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require 'config.php';

//whatdafukku

if (isset($_SESSION["email"])) {
    $query = "SELECT * FROM fotograaf
            WHERE email = '{$_SESSION["email"]}'";

    $result = $conn->query($query);

    $email = $result->fetch(PDO::FETCH_ASSOC);

    if ($email["email"] == 'admin@admin.nl') {



        if (isset($_POST['filter'])) {
            if ($_POST['filter'] == 'model') {
                try {

                    $query = "SELECT 
            *,GROUP_CONCAT(modellen_fotos.fotonaam SEPARATOR ',') AS fotonaam
            FROM modellen LEFT JOIN modellen_fotos ON modellen_fotos.model_ID = modellen.model_ID
            WHERE modellen.status = ('in behandeling') 
            GROUP BY modellen.model_ID;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();


                    $result = $stmt->fetchAll();
                    $aantalRijen = count($result);

                    include 'views/admin_view.php';
                } catch (PDOException $e) {
                    echo "<p>Fout</p>";
                    echo "<p> Query: ", $query, "</p>";
                    echo "<p> Foutmelding: ", $e->getMessage(), "</p>";
                    exit;
                }
            }elseif ($_POST['filter'] == 'fotograaf') {
                try {

                    $query = "SELECT * FROM fotograaf WHERE status = ('in behandeling')";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();


                    $result = $stmt->fetchAll();
                    $aantalRijen = count($result);

                    include 'views/admin_view.php';
                } catch (PDOException $e) {
                    echo "<p>Fout</p>";
                    echo "<p> Query: ", $query, "</p>";
                    echo "<p> Foutmelding: ", $e->getMessage(), "</p>";
                    exit;}
            }
        }
} else {
    header("Location: index.php");

}} else{
    header("Location: inlog_verwerk.php");
}