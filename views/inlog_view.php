<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fotograaf login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="card">
    <div class="login-box">
        <h2>Login</h2>
        <p class="red"><?= $resultaat?></p>
        <form action="inlog.php" method="post">
            <input type="email" placeholder="email" required name="email">
            <input type="password" placeholder="Wachtwoord" required name="wachtwoord">
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</div>

</body>
</html>