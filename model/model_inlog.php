<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require("../config.php");
$email = $_GET['email'];
$wachtwoord = $_GET['wachtwoord'];
$resultaat = "";
if (strlen($email)>0 && strlen($wachtwoord)>0) {
    $wachtwoord = sha1($wachtwoord);


    $query = "SELECT * from modellen WHERE email= :nm AND wachtwoord= :ww";


    $stmt = $conn->prepare($query);
    $stmt->execute([
        'nm' => $email,
        'ww' => $wachtwoord
    ]);

    if ($stmt->rowCount()) {
        $_SESSION['email'] = $email;
        header('Location: model_profiel.php');
        exit();
    }else {

        $resultaat = "Inlog incorrect";
        include 'model_inlog_verwerk.php';
//        header('Location: inlog_verwerk.php?resultaat=inlogincorrect');
    }
}