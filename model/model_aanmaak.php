<?php

require "config.php";

$resultaat = "";
$errors = "";
$naam = $_POST["naam"];
$wachtwoord = sha1($_POST["wachtwoord"]);
$email = $_POST["email"];




try {

    $query = "INSERT INTO modellen (naam, wachtwoord, email)";
    $query .= "VALUES (:naam, :wachtwoord, :email)";


    $stmt = $conn->prepare($query);

    $stmt->execute([
        'naam' => $gebruikersnaam,
        'wachtwoord' => $wachtwoord,
        'email' => $email
    ]);



    if ($stmt->rowCount()) {
        header('Location: inlog_verwerk.php');
    } else {
        echo "fout bij toevoegen<br>";
    }

} catch (PDOException $e) {
    echo "FOUT met voegen ): <br>";
    echo "foutmelding: " . $e->getMessage();
}
;