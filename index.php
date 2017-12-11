<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cocktailbar.nocache.css">
    <title>Cocktailbar</title>
</head>
    <body>
        <form action = "index.php" method="post">
            <div id="topNav" class="topNav" style="position: fixed; top: 0">
                <div style="overflow:auto">
                    <div class="navBar navLeft" style="width: 100%; overflow: hidden; height: 75px">
                        <a type="submit" class="navBarItem navButton" href="main.php" target="display">Startseite</a>
                        <a type="submit" class="navBarItem navButton" href="account.php" target="display">Mein Konto</a>
                        <a type="submit" class="navBarItem navButton" href="login.php" target="display">Einloggen</a>
                        <a type="submit" class="navBarItem navButton" href="register.php" target="display">Registrieren</a>
                        <a type="submit" class="navBarItem navButton" href="cocktail.php" target="display">Neuen Cocktail erstellen</a>
                        <a type="submit" class="navBarItem navButton" href="favourites.php" target="display">Meine Favoriten</a>
                        <input class="search navBarItem navBarRight" type="search" title="Search" placeholder="Suchen">
                    </div>
                </div>
            </div>
        </form>
        <iframe src="main.php" class="frame" name="display"></iframe>
    </body>
</html>