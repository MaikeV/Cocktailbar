<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cocktailbar.nocache.css">
        <title>Cocktailbar</title>
    </head>
    <body>
        <div class="backgroundDiv">
            <h1>Bitte melden Sie sich an.</h1>
            <button type="button" onclick="location.href = 'login.php'">Anmelden</button>
            <button type="button" onclick="location.href = 'register.php'">Registrieren</button>
        </div>
    </body>
</html>
