<?php
session_start();
require("config.php");
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$resultaat = "";
if (strlen($email)>0 && strlen($wachtwoord)>0) {
    $wachtwoord = sha1($wachtwoord);


    $query = "SELECT * from fotograaf WHERE email= :nm AND wachtwoord= :ww";


    $stmt = $conn->prepare($query);
    $stmt->execute([
        'nm' => $email,
        'ww' => $wachtwoord
    ]);

    if ($stmt->rowCount()) {
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit();
    }else {

        $resultaat = "Inlog incorrect";
        include 'inlog_verwerk.php';
//        header('Location: inlog_verwerk.php?resultaat=inlogincorrect');
    }
}