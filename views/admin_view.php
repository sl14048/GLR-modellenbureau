<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin goedkeuring</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/sequel" rel="stylesheet">
</head>
<body>
<a href="index.php">Terug</a>
<form action="admin.php" method="post">
    <button type="submit" name="filter" value="model" class="filter">modellen</button>
    <button type="submit" name="filter" value="fotograaf" class="filter">fotograaf</button>

</form>

<?php
if (isset($_POST['filter'])) {
//model filter
if ($_POST['filter'] == 'model') {
if ($aantalRijen >0) { ?>
    <style> body {background: #8FE507FF;}.card{color: #8FE507}.filter:nth-child(1){background-color: black; color: white}</style>
    <div class="card-wrapper">
        <?php foreach ($result as $row) {?>
<!--            <a href="student/info_model.php?model_ID=--><?php //= $row['model_ID']?><!--">-->
                <div class="card">
                    <?php
                    $fotos = explode(',', $row['fotonaam']);
                    foreach ($fotos as $foto): ?>
                        <img src="media/<?=$foto?>" alt="Avatar" class="doubleimg">
                    <?php endforeach; ?>
                    <div class="container">
                        <h4><?= $row['naam']?></h4>
                        <p><?= $row['contact']?></p>
                        <a href="check.php?model_ID=<?= $row['model_ID']?>&status=goedgekeurd&filter=model" class="check">✓</a> <a href="check.php?model_ID=<?= $row['model_ID']?>&status=afgekeurd&filter=model" class="check">X</a>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
<?php }  else {?>
<p>Geen resultaten</p>
<?php }

//fotograaf filter
}elseif ($_POST['filter'] == 'fotograaf'){
    if ($aantalRijen >0) { ?>
        <style>.filter:nth-child(2){background-color: black; color: white}</style>
    <div class="card-wrapper">
        <?php foreach ($result as $row) {?>
            <div class="card">
                <div class="container">
                    <h4><?= $row['email']?></h4>
                    <a href="check.php?email=<?= $row['email']?>&status=goedgekeurd&filter=fotograaf" class="check">✓</a> <a href="check.php?email=<?= $row['email']?>&status=afgekeurd&filter=fotograaf"class="check">X</a>
                </div>
            </div>
            </a>
        <?php } ?>
    </div>
<?php }}}  else {?>
    <p>Geen resultaten</p>
    <?php } ?>
</body>
</html>