<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="login.nocache.css">
        <title>Cocktailbar</title>
    </head>
    <body>
        <form action="SaveEntry.php" class="login">
            <h1>Neuen Account anlegen</h1>

            <label>Vorname:</label>
            <input placeholder="Vorname" name="fName" type="text" required><br>

            <label>Nachname:</label>
            <input placeholder="Nachname" name="lName" type="text" required><br>

            <label>E-Mail:</label>
            <input placeholder="E-Mail" name="email" type="email" required><br>

            <label>Benutzername:</label>
            <input placeholder="Benutzername" name="userName" type="text" required><br>

            <label>Passwort:</label>
            <input placeholder="Passwort" name="password" type="password" required><br>

            <label>Passwort bestätigen:</label>
            <input placeholder="Passwort bestätigen" name="reenterPassword" required><br>

            <button type="submit">Registrieren</button>
        </form>
        <?php

        ?>
    </body>
</html>