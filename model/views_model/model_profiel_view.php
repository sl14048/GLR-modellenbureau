<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>model info</title>
    <link rel="stylesheet" href="../css/info.css">
    <link rel="stylesheet" href="../css/persona.css">
    <script src="../js/info.js" defer></script>
</head>
<body>
<!-- link homepage/glr logo -->
<a href=""><img src="" alt=""></a>
<button class="but"><a href="uitlog_model.php" class="log">Log out</a></button>

<button class="nav-arrow left" onclick="plusSlides(-1)"><</button>
<button class="nav-arrow right" onclick="plusSlides(1)">></button>
    <?php if ($aantalRijen >0) { ?>
    <?php foreach ($result as $row) { ?>
<!-- inhoud container -->
    <div class="inhoud_container">

        <!-- images 3 -->
        <div class="fotos_container">
            <div class="slideshow-container">
                <?php foreach ($fotos as $foto): ?>
                    <div class="mySlides fade"><img src="../media/<?=$foto?>"></div>
                <?php endforeach; ?>
            </div>

            <div class="info_container">

                <!-- database naam -->
                <h1 class="model_naam"><?= $row['naam']?></h1>

                <!-- student e-mail  -->
                <p class="info_label">Studenten mail </p>
                <!-- database email -->
                <p class="info_data"><?= $row['email']?></p>

                <!-- contact mogelijkheid -->
                <p class="info_label">Contact mogelijkheid</p>
                <!-- database contact  -->
                <p class="info_data"><?= $row['contact']?></p>

            </div>

            <!-- status -->
            <div class="status_container">
                <!-- aanvraag aanpassen -->
                <p class="info_label">Aanvraag status</p>

                <!-- database aanvraag status  -->
                <p class="info_data"><?= $row['status']?></p>

                <!-- aanvraag status knop -->
            </div>

            <?php } ?>
        </div>
        <?php }else {?>
            <p>Geen resultaten</p> <?php } ?>
</body>
</html>
