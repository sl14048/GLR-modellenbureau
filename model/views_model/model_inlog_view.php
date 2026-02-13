<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modellen Inlog</title>
    <link rel="stylesheet" href="../css/login.css">
    <script src="js/validate.js" defer></script>
</head>
<body>
<div class="card">
<div class="login-box2">
    <form action="model_inlog.php" method="get">
        <h2>login</h2>
        <p class="red"><?= $resultaat?></p>
        <div class="input_container">
            <input type="email" class="input_tekst" placeholder="e-mail*" name="email"><br>
            <input type="password" class="input_tekst" placeholder="wachtwoord*" name="wachtwoord">
            <input class="login-btn" type="submit">
        </div>
    </form>
</div>
</div>
</body>
</html>