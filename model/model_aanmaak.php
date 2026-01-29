<?php

require "config.php";
//maak image map
$map = "img";

//maak een thumbnail map
$tn_map = "thumbnails";
$bestand = $_FILES['afbeelding'];

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

    if (move_uploaded_file($bestand["tmp_name"],$map ."/". $bestand["name"]))
    {
        $resultaat .= $bestand["name"] . "staat nu in" . $map. "<br/>";

        $info = getimagesize($map. "/". $bestand["name"]);

        $origineel = imagecreatefromjpeg($map. "/". $bestand["name"]);

        $thumb = imagecreatetruecolor(100, 100);

        imagecopyresampled($thumb, $origineel, 0, 0, 0, 0, 100, 100, $info[0], $info[1]);

    } else {

        $resultaat = "er is iets fout gegaan bij het uploaden";
    }

    if(imagejpeg($thumb, $tn_map."/tn_". $bestand["name"], 100))
    {

        $resultaat .= "thumbnail gemaakt" .$tn_map. "/tn_". $bestand["name"] . "<br/>";

//        include("views/toevoegen_resultaat_view.php");

    }  else { $resultaat = "er is iets fout gegaan bij het thumbnail"; }

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