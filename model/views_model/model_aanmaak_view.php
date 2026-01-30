<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inlog model</title>
    <link rel="stylesheet" href="../css/model_account_aanmaak.css">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>

<div class="bubble_big"></div>

<div class="inlog_container">

    <p class="login"></p>

    <form action="model_aanmaak.php" enctype="multipart/form-data" method="post">

        <div class="login-box2">
            <input type="text" class="" placeholder="naam*" required name="naam">
            <input type="password" class="" placeholder="wachtwoord*" required name="wachtwoord">
            <input type="email" class="" placeholder="e-mail*" required name="email">
            <input type="text" class="" placeholder="contact mogelijkheid*" required name="contact">
            <label for="">profiel foto (max 3)</label> <br>
            <input class="file_upload" type="file" multiple required name="fotonaam">
            <br>
            <input class="inlog_submit" type="submit">

        </div>
    </form>
</div>
</body>
</html>