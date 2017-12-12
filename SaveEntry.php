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
                    $hash = hash('sha256', $password); //Verschlüsseln
                    $query = "INSERT INTO t_user (Firstname, Lastname, Password, Username, Mail, Picture) VALUES ('$firstName', '$lastName', '$hash', '$userName', '$email', '$picture') ";
                    mysqli_query($connection,$query);
                    echo "Herzlich Willkommen. Sie haben sich erfolgreich registriert";
                    echo "<br><button onclick=\"location.href = 'index.php'\">Zur Startseite</button>
                          <button onclick=\"location.href = 'account.php'\">Mein Konto</button>";
                } else {
                    echo "Passwörter stimmen nicht überein";
                    echo "<br><button onclick=\"location.href = 'register.php'\">Zurück</button>";
                }
            } else if($type == "newCocktail") {
                if (isset($_POST) == true && empty($_POST) == false) {
                    $name = $_POST["name"];
                    $picture = $_POST["CPicture"];
                    $ingredient = $_POST["ingredient"];
                    $amount = $_POST["amount"];
                    $unit = $_POST["unit"];

                    $query = "INSERT INTO t_cocktail(Recipename, CocktailPic) VALUES('$name', $picture)";
                    mysqli_query($connection, $query);

                    echo "Cocktail wurde erfolgreich gespeichert";
                    echo "<br><button onclick=\"location.href = 'index.php'\">Zur Startseite</button>";
                }

            } else if($type == "login") {
                $userName = $_POST['userNameLogin'];
                $passwordLogin = $_POST['passwordLogin'];
                $dummy = $_POST["dummy"];
                $passwordsha = hash('sha256', $passwordLogin);
                //$query = "SELECT Password FROM t_user WHERE Username='.$userName.'";
                $result = mysqli_query($connection, "SELECT Password FROM t_user WHERE username='$userName'");

                //echo $result;
                //mysqli_query($connection, $query);
                //$result = mysqli_query($connection, $query);
                //$array = array ($query);
                //$row = mysqli_fetch_array($query);
                //$sachen = implode(",", $array);
                while ($row = $result->fetch_assoc()) {
                    //echo ($row['Password']);
                    $varrow = $row['Password'];
                }

                //var_dump($varrow);
                //echo var_dump($row['Password']);
                $varpass = ($passwordsha);
                //$checkpw = substr("" . $row['Password'] . "", );
                //var_dump($varpass);
                //echo var_dump($varrow);

                //echo var_dump( "" . $row['Password'] . "");
                //$a = "string(0) \"\" string(64) \"\"";
                //$b = "\"";
                //$row1 = $a . $row['Password'] . $b;
                //echo $row1;

                //$line1 = ;
                //$password1 = ["Password"];
                //$checkpw = $row[];
                //echo var_dump($result);
                //echo var_dump($row);

                //echo $array;
                //echo $array[4];
                //echo $checkpw;
                if ( $varrow == $varpass){
                    echo "Sie haben sich erfolgreich angemeldet";
                } else {
                    echo "Benutzername und Passwort stimmen nicht überein";
                    //echo var_dump($passwordsha);
                }
            }

        ?>
    </body>
</html>