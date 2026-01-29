<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jhonsona Persona <!--PHP--> - Info</title>
    <link rel="stylesheet" href="css/info.css">
    <script src="js/info.js" defer></script>
</head>
<body>

<section class="profile-section">
    <a href="index.php" class="back-btn">Terug</a>

    <button class="nav-arrow left" onclick="plusSlides(-1)"><</button>
    <button class="nav-arrow right" onclick="plusSlides(1)">></button>

    <div class="profile-card">
        <?php if ($aantalRijen >0) { ?>
        <?php foreach ($result as $row) { ?>
        <h1 class="model-name"><?= $row['naam']?></h1>

        <div class="slideshow-container">
                <?php foreach ($fotos as $foto): ?>
                    <div class="mySlides fade"><img src="media/<?=$foto?>"></div>
                <?php endforeach; ?>
            </div>


        <div class="dot-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <div class="profile-info">
            <button class="collapsible">Contact</button>
            <div class="content"><p>Telefoon: +31 6 1234 5678</p></div>
        </div>
        <?php } ?>
    </div>
    <?php }else {?>
        <p>Geen resultaten</p> <?php } ?>
</section>

</body>
</html>