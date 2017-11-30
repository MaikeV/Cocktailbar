<!DOCTYPE html>
<html lang="en">
    <?php
        include 'connection.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="login.nocache.css">
        <title>Cocktailbar</title>
    </head>
    <body>
        <div class="login">
            <form action="" class="login">
                <h1>Anmelden</h1>

                <label>Benutzername:</label>
                <input placeholder="Benutzername" name="userNameLogin" type="text" required><br>

                <label>Passwort:</label>
                <input placeholder="Passwort" name="passwordLogin" type="password" required><br>

                <button type="submit">Login</button>
                <button type="button" onclick="location.href = 'index.php'">Zurück</button>
            </form>
        </div>
    </body>
</html>