<?php
session_start();
require 'config.php';


if (isset($_SESSION["email"])) {
    $query = "SELECT * FROM fotograaf
            WHERE email = '{$_SESSION["email"]}'";

    $result = $conn->query($query);

    $email = $result->fetch(PDO::FETCH_ASSOC);

    try {

        $query = "SELECT 
*,GROUP_CONCAT(modellen_fotos.fotonaam SEPARATOR ',') AS fotonaam
FROM modellen LEFT JOIN modellen_fotos ON modellen_fotos.model_ID = modellen.model_ID
WHERE modellen.status NOT IN ('in behandeling','afgekeurd') 
GROUP BY modellen.model_ID;";
        $stmt = $conn->prepare($query);
        $stmt->execute();


        $result = $stmt->fetchAll();
        $aantalRijen = count($result);

        include 'views/index_view.php';
    } catch (PDOException $e) {
        echo "<p>Fout</p>";
        echo "<p> Query: ", $query, "</p>";
        echo "<p> Foutmelding: ", $e->getMessage(), "</p>";
        exit;
    }
} else {
    header("Location: inlog_verwerk.php");
}


