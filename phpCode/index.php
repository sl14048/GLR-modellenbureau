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
</head>
<body>
    <div class="bar">
      <a href="model_inlog/model_inlog.html">Inlog</a>
    </div>
    <div class="hero">
        <img src="../media/hero.jpg" alt="">
        <div class="herotitle">
            <h1>GLR Fotografie <br> Modellenbureau</h1>
            <a href="#mensen"><button>🡻</button></a>            
        </div>
    </div>
    <section id="mensen">


<!-- 1 -->
    <?php  if ($aantalRijen > 0){ ?>

        <div class="card-wrapper">

            <?php foreach ($resultaten as $row) { ?>
 <a href="info.html">
      <div class="card">
    <img src="media/grey.jpg" alt="Avatar">
    <div class="container">
      <h4><b><?=$naam ?></b></h4>
      <p><?=$werk ?></p>
    </div>
  </div>
   </a>
<?php }} ?>

</div>
    </section>
</body>
</html>