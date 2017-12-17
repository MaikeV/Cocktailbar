<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
    session_start();
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
                        <?php

                          if(  isset($_SESSION["login"]) && $_SESSION["login"] == 1){
                            echo "<a type='submit' class='navBarItem navButton' href='logout.php' target='display'>Ausloggen</a>
                            <a type='submit' class='navBarItem navButton' href='cocktail.php' target='display'>Neuen Cocktail erstellen</a>";
                          } else {
                            echo "<a type='submit' class='navBarItem navButton' href='login.php' target='display'>Einloggen</a>
                            <a type='submit' class='navBarItem navButton' href='register.php' target='display'>Registrieren</a>
                            <a type='submit' class='navBarItem navButton' href='cocktail.php' target='display'>Neuen Cocktail erstellen</a>";
                          }
                          
                         ?>




                        <a type="submit" class="navBarItem navButton" href="list.php" target="display">Cocktails</a>
                        <input class="search navBarItem navBarRight" type="search" title="Search" placeholder="Suchen">
                    </div>
                </div>
            </div>
        </form>
        <iframe src="main.php" class="frame" name="display"></iframe>
    </body>

</html>
