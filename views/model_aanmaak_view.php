<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inlog model</title>
    <link rel="stylesheet" href="css/model_account_aanmaak.css">

</head>
<body>

<div class="bubble_big"></div>

<div class="inlog_container">

    <p class="login"></p>

    <form action="" class="inlog_form_2">

        <div class="input_container_2">

            <!-- naam -->

            <input type="text" class="input_tekst_2" placeholder="naam*" required name="naam">

            <!-- wachtwoord -->

            <input type="text" class="input_tekst_2" placeholder="wachtwoord*" required name="wachtwoord">


            <input type="text" class="input_tekst_2" placeholder="e-mail*" required name="email">


            <input type="text" class="input_tekst_2" placeholder="contact mogelijkheid*" required name="contact">

            <!-- profiel foto -->
            <label for="">profiel foto (max 3)</label> <br>
            <input class="file_upload" type="file" multiple required name="fotonaam">
            <br>
            <input class="inlog_submit" type="submit">

        </div>
    </form>
</div>
</body>
</html>