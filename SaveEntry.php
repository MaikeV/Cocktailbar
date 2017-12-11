<html>
<?php
    session_start();
    include("connection.php");
?>
    <head>
        <title>Cocktailbar</title>
        <link rel="stylesheet" href="cocktailbar.nocache.css">
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
        <?php
            $type = $_POST["type"];

            if($type == "newUser") {
                $firstName = $_POST["fName"];
                $lastName = $_POST["lName"];
                $email = $_POST["email"];
                $userName = $_POST["userName"];
                $picture = $_POST["picture"];
                $password = $_POST["password"];
                $reenteredPW = $_POST["reenterPassword"];

                if ($password == $reenteredPW) {
                    $hash = hash('sha256', $password); //Verschlüsseln Entschlüsseln
                    echo $hash;
                    $query = "INSERT INTO t_user (Firstname, Lastname, Password, Username, Mail, Picture) VALUES ('$firstName', '$lastName', '$hash', '$userName', '$email', '$picture') ";
                    mysqli_query($connection,$query);
                    echo "Herzlich Willkommen. Sie haben sich erfolgreich registriert";
                    session_start();
                    echo "<br><button onclick=\"location.href = 'index.php'\">Zur Startseite</button>
                          <button onclick=\"location.href = 'account.php'\">Mein Konto</button>";
                } else {
                    echo "Passwörter stimmen nicht überein";
                    echo "<br><button onclick=\"location.href = 'register.php'\">Zurück</button>";
                }
            }
        ?>
    </body>
</html>