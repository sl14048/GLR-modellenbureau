<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLR Modellenbureau</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sequel" rel="stylesheet">
    <script src="js/info.js" defer></script>
</head>
<body>
<div class="bar">
    <a href="model/model_inlog_verwerk.php" target="_blank">Inlog model</a> <br>
    <a href="model/model_aanmaak_verwerk.php">meld aan model</a>
</div>
<?php if (isset($email)): ?>
    <a href="uitlog.php" class="log">Log out</a>
<?php else: ?>
    <a href="student/login_verwerk.php" target="_blank">Inlog student</a>
<?php endif; ?>

<?php     if ($email["email"] == 'admin@admin.nl') : ?>
    <br> <a href="admin.php" class="admin">admin pagina</a>
<?php endif; ?>
<div class="hero">
    <div class="herotitle">
        <h1>Fotografie <br> Modellenbureau</h1>
        <a href="#mensen"><button>🡻</button></a>
    </div>
</div>
<section id="mensen">

    <?php
    if ($aantalRijen >0) { ?>
        <div class="card-wrapper">
            <?php foreach ($result as $row) { ?>
                <a href="student/info_model.php?model_ID=<?= $row['model_ID']?>">
                    <div class="card">
                <?php
                $fotos = explode(',', $row['fotonaam']);
                foreach ($fotos as $foto): ?>
                        <img src="media/<?=$foto?>" alt="Avatar" class="doubleimg">
                <?php endforeach; ?>
                        <div class="container">
                            <h4><?= $row['naam']?></h4>
                            <p><?= $row['contact']?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    <?php }else {?>
        <p>Geen resultaten</p> <?php } ?>
</section>
</body>
</html>