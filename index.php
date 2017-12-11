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
    <div id="topNav" class="topNav" style="position: fixed; top: 0">
        <div style="overflow:auto">
            <div class="navBar navLeft" style="width: 100%; overflow: hidden; height: 75px">
                <a type="submit" class="navBarItem navButton" href="index.php">Startseite</a>
                <a type="submit" class="navBarItem navButton" href="account.php">Mein Konto</a>
                <a type="submit" class="navBarItem navButton" href = "login.php">Einloggen</a>
                <a type="submit" class="navBarItem navButton" href = "register.php">Registrieren</a>
                <a type="submit" class="navBarItem navButton" href = "cocktail.php">Neuen Cocktail erstellen</a>
                <a type="submit" class="navBarItem navButton" href = "register.php">Meine Favoriten</a>
                <input class="search navBarItem navBarRight" type="search" title="Search" placeholder="Suchen">
            </div>
        </div>
    </div>
    <div class="newest">
        <div class="newest">
            <?php
                $query = "SELECT * FROM t_cocktail order by C_ID desc limit 5";
            ?>
        </div>
    </div>
    </body>
</html>