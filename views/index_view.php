<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLR Modellenbureau</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sequel" rel="stylesheet">
    <script src="js/info.js" defer></script>
</head>
<body>
<div class="bar">
    <a href="model_account_aanmaak_inlog/model_inlog.html" target="_blank">Inlog model</a> <br>
    <a href="student/login.html" target="_blank">Inlog student</a>
</div>
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
                <a href="info_model.php?model_ID=<?= $row['model_ID']?>">
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