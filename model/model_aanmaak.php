<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//require "config.php";
//
//$resultaat = "";
//$errors = "";
//$naam = $_POST["naam"];
//$wachtwoord = sha1($_POST["wachtwoord"]);
//$email = $_POST["email"];
//$contact = $_POST["contact"];
//$fotonaam = $_POST["fotonaam"];
//$model_ID = $conn->lastInsertId();;
//
//$target_dir = "media/";
//$image = basename($_FILES["fotonaam"]["name"]);
//$target_file = $target_dir . $image;
//$uploadOk = 0;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//if (!empty($_FILES["fotonaam"]["tmp_name"])) {
//    $check = getimagesize($_FILES["fotonaam"]["tmp_name"]);
//} else {
//    $check = false;
//}
//
//if($check !== false) {
//    $uploadOk = 1;
//} else {
//    $errors .= "File is not an image.";
//    $uploadOk = 0;
//}
//
//if (file_exists($target_file)) {
//    $errors .= "Sorry, file already exists.";
//    $uploadOk = 0;
//}
//if ($_FILES["fotonaam"]["size"] > 500000) {
//    $errors .= "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//    && $imageFileType != "gif" ) {
//    $errors .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $uploadOk = 0;
//}
//if ($uploadOk == 0) {
//    $errors .= "Sorry, your file was not uploaded.";
//}
//
//if (empty($errors)) {
//    try {
//
//        if ($uploadOk == 1) {
//            if (move_uploaded_file($_FILES["fotonaam"]["tmp_name"], $target_file)) {
//                echo "The file ". htmlspecialchars( basename( $_FILES["fotonaam"]["name"])). " has been uploaded.";
//            } else {
//                echo "Sorry, there was an error uploading your file.";
//            }
//        }
//
//    $query = "INSERT INTO modellen (naam,email,  wachtwoord, contact)";
//    $query .= "VALUES (:naam, :wachtwoord, :email, :contact)";
//
//
//    $stmt = $conn->prepare($query);
//
//    $stmt->execute([
//        'naam' => $naam,
//        'wachtwoord' => $wachtwoord,
//        'email' => $email,
//        'contact' => $contact
//    ]);
//
//        if (!empty($_FILES['images']['name'][0])) {
//
//            for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
//
//                $ext = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
//                $newName = uniqid('img_', true) . '.' . $ext;
//                $path = 'uploads/' . $newName;
//
//                if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $path)) {
//                    $stmt2 = $conn->prepare(
//                        "INSERT INTO modellen_fotos (model_ID, fotonaam) VALUES (:model_ID, :fotonaam)"
//                    );
//                    $stmt2->execute([
//                        'model_ID' => $model_ID,
//                        'fotonaam' => $fotonaam
//                    ]);
//                }
//            }
//        }
//
//
//    if ($stmt->rowCount() && $stmt2->rowCount()) {
//        header('Location: model_inlog_verwerk.php');
//    } else {
//        echo "fout bij toevoegen<br>";
//    }
//
//} catch (PDOException $e) {
//    echo "FOUT met voegen ): <br>";
//    echo "foutmelding: " . $e->getMessage();
//}
ini_set('display_errors', 1);
error_reporting(E_ALL);

require "../config.php";

$errors = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$naam = $_POST["naam"];
$wachtwoord = sha1($_POST["wachtwoord"]);
$email = $_POST["email"];
$contact = $_POST["contact"];


$target_dir = "../media/";
$image = basename($_FILES["fotonaam"]["name"]);
$target_file = $target_dir . $image;
$uploadOk = 0;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($_FILES["fotonaam"]["tmp_name"])) {
    $check = getimagesize($_FILES["fotonaam"]["tmp_name"]);
} else {
    $check = false;
}

if ($check !== false) {
    $uploadOk = 1;
} else {
    $errors .= "File is not an image.<br>";
    $uploadOk = 0;
}

if (file_exists($target_file)) {
    $errors .= "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

if ($_FILES["fotonaam"]["size"] > 500000) {
    $errors .= "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    $errors .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $errors .= "Sorry, your file was not uploaded.<br>";
}

if (empty($errors)) {
    try {
        $stmt = $conn->prepare("
            INSERT INTO modellen (naam, wachtwoord, email, contact)
            VALUES (:naam, :wachtwoord, :email, :contact)
        ");

        $stmt->execute([
            ':naam' => $naam,
            ':wachtwoord' => $wachtwoord,
            ':email' => $email,
            ':contact' => $contact
        ]);

        $model_ID = $conn->lastInsertId();


        if ($uploadOk == 1) {
            $newName = uniqid('img_', true) . '.' . $imageFileType;
            $target_file = $target_dir . $newName;

            if (move_uploaded_file($_FILES["fotonaam"]["tmp_name"], $target_file)) {

                $stmt2 = $conn->prepare("
                    INSERT INTO modellen_fotos (model_ID, fotonaam)
                    VALUES (:model_ID, :fotonaam)
                ");

                $stmt2->execute([
                    ':model_ID' => $model_ID,
                    ':fotonaam' => $newName
                ]);

                echo "File uploaded and data saved successfully!";
                header("Location: model_inlog_verwerk.php");
                exit;

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    } catch (PDOException $e) {
        echo "FOUT met toevoegen:<br>";
        echo $e->getMessage();
    }
} else {
    echo $errors;
}} else{
    echo "not posted";
}
