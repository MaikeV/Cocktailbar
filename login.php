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
        <div class="login">
            <form action="SaveEntry.php" method="post">
                <h1>Anmelden</h1>

                <label>Benutzername:</label>
                <input placeholder="Benutzername" name="userNameLogin" type="text" required><br>

                <label>Passwort:</label>
                <input placeholder="Passwort" name="passwordLogin" type="password" required><br>

                <input type="hidden" name="type" value="login">

                <button type="submit">Login</button>
                <button type="button" onclick="location.href = 'index.php'">Zurück</button>
            </form>
        </div>
    </body>
</html>