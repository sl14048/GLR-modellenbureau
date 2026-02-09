<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'config.php';

$status = $_GET['status'];
$filter = $_GET['filter'];
$model_ID = $_GET['model_ID'];
if (isset($_SESSION["email"])) {


    $query = "SELECT * FROM fotograaf WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->execute([':email' => $_SESSION["email"]]);
    $email = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($email["email"] == 'admin@admin.nl') {

        if (isset($_GET['filter'])) {
            if ($filter === 'model') {
                try {
                    $query = "UPDATE modellen 
                  SET status = :status 
                  WHERE model_ID = :model_ID";

                    $stmt = $conn->prepare($query);
                    $stmt->execute([
                        ':status'   => $status,
                        ':model_ID' => $model_ID
                    ]);

                    if ($stmt->rowCount() > 0) {
//                        echo "<p>Status aangepast</p>";
                        header("Location: admin.php?filter=model");
//                        include 'admin.php';
                    } else {
                        echo "<p>Status was al hetzelfde of model niet gevonden</p>";
                    }

                } catch (PDOException $e) {
                    echo "<p>Fout</p>";
                    echo "<p> Query: ", $query, "</p>";
                    echo "<p> Foutmelding: ", $e->getMessage(), "</p>";
                    exit;
                }
            }

            elseif ($filter == 'fotograaf') {
                try {
                echo "<p>Status is foto</p>";

                } catch (PDOException $e) {
                    echo "<p>Fout</p>";
                    echo "<p> Query: ", $query, "</p>";
                    echo "<p> Foutmelding: ", $e->getMessage(), "</p>";
                    exit;}
            }
        }else {
            echo "<p>filter</p>";
        }
    } else {
//        header("Location: index.php");
        echo "<p>Fout email</p>";

    }


    }else {
    echo "<p>Fout session</p>";
}


