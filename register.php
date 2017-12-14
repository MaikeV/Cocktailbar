<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cocktailbar.nocache.css">
    <title>Title</title>
</head>
<body>
    <div class="register">
        <form action="SaveEntry.php" method="post">
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
            <input placeholder="Passwort" class="pw" name="password" type="password" required><br>

            <label>Passwort bestätigen:</label>
            <input placeholder="Passwort bestätigen" class="repw" name="reenterPassword" type="password" required><br>

            <label>Foto:</label>
            <input type="file" name="picture"><br>

            <input type="hidden" name="type" value="newUser">

            <button type="submit">Registrieren</button>
            <button type="button" onclick="location.href = 'main.php'">Zurück</button>
        </form>
    </div>
</body>
</html>