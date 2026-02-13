<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLR Modellenbureau</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sequel" rel="stylesheet">

</head>
<body>
<?php if (isset($email)): ?>
    <a href="uitlog.php" class="log"><img src="media/logout.png" alt="loguit icoon" id="loguit"></a>
<?php else: ?>
    <a href="student/login_verwerk.php" target="_blank">Inlog student</a>
<?php endif; ?>

<?php   if ($email["email"] == 'admin@admin.nl') : ?>
    <br> <a href="admin.php?filter=model" class="admin"><img src="media/admin.png" alt="admin icon" class="admin"></a>
<?php else: ?>
<?php endif; ?>

<div class="hero">
    <div class="herotitle">
        <h1>Fotografie</h1>
        <h2>Modellenbureau</h2>
        <a href="#mensen"><button>🡻</button></a>

    </div>
</div>
<section id="mensen">
    <a href="download/Quitclaim_voorbeeld.pdf" download id="quitclaim"> Download je quickclaim </a>
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