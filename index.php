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
    <?php
        $page = "main.php";
        echo "
            <form action = 'index.php' method='post'>
                <div id='topNav' class='topNav' style='position: fixed; top: 0'>
                    <div style='overflow:auto'>
                        <div class='navBar navLeft' style='width: 100%; overflow: hidden; height: 75px'>
                            <a type='submit' class='navBarItem navButton' id='page' >Startseite</a>
                            <a type='submit' class='navBarItem navButton' id='page'>Mein Konto</a>
                            <a type='submit' class='navBarItem navButton' id='page'>Einloggen</a>
                            <button type='submit' class='navBarItem navButton' id='page' value='Registrieren'>Registrieren</button>
                            <a type='submit' class='navBarItem navButton' id='page'>Neuen Cocktail erstellen</a>
                            <a type='submit' class='navBarItem navButton' id='page'>Meine Favoriten</a>
                            <input class='search navBarItem navBarRight' type='search' title='Search' placeholder='Suchen'>
                        </div>
                    </div>
                </div>
            </form>";
        $page = $_POST["page"];
        echo $page;

        switch ($page) {
            case "Startseite":
                $source = "main.php";
                break;
            case "Mein Konto":
                $source = "account.php";
                break;
            case "Einloggen":
                $source = "login.php";
                break;
            case "Registrieren":
                $source = "localhost/Cocktailbar/register.php";
                break;
            case "Neuen Cocktail erstellen":
                $source = "cocktail.php";
                break;
            case "Meine Favoriten":
                $source = "favourites.php";
                break;
            default:
                $source = "main.php";
                break;
        }

        echo "  <iframe src=$source class='frame'>
                
            </iframe>";
    ?>

    </body>

</html>