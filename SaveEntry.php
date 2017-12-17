<html>
<?php
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
                    session_start();
                    echo "<br><button onclick=\"location.href = 'main.php'\">Zur Startseite</button>
                          <button onclick=\"location.href = 'account.php'\">Mein Konto</button>";
                } else {
                    echo "Passwörter stimmen nicht überein";
                    echo "<br><button onclick=\"location.href = 'register.php'\">Zurück</button>";
                }
            } else if($type == "newCocktail") {
                if (isset($_POST) == true && empty($_POST) == false) {
                    $name = $_POST["CName"];
                    $picture = $_POST["CPicture"];
                    $ingredient = $_POST["ingredient"];
                    $amount = $_POST["amount"];
                    $unit = $_POST["unit"];
                    $alcohol = $_POST["rbtnAlc"];
                    $howTo = $_POST["taRecipe"];

                    foreach($ingredient as $a => $b) {

                        $unitQuery = "INSERT INTO t_unit(Description) VALUES('$unit[$a]')";
                        $UN_ID[$a] = "SELECT UN_ID FROM t_unit where Description='$unit[$a]'";

                        $ingredientQuery = "INSERT INTO t_ingredient(Ingredient, UN_ID) VALUES('$ingredient[$a]', '$$UN_ID[$a]')";
                        $I_ID[$a] = "SELECT I_ID FROM t_ingredient WHERE Ingredient = '$ingredient[$a]' AND UN_ID = '$UN_ID[$a]'";
                    }

                    $query = "INSERT INTO t_cocktail(Alcohol, Recipename, CocktailPic, Preparation) VALUES('$alcohol', '$name', '$picture', '$howTo')";

                    mysqli_query($connection, $query);

                    echo "Cocktail wurde erfolgreich gespeichert";
                    echo "<br><button onclick=\"location.href = 'main.php'\">Zur Startseite</button>";
                }

            } else if($type == "login") {
                $userName = $_POST['userNameLogin'];
                $passwordLogin = $_POST['passwordLogin'];
                $dummy = $_POST["dummy"];
                $passwordsha = hash('sha256', $passwordLogin);
                $result = mysqli_query($connection, "SELECT Password FROM t_user WHERE username='$userName'");

                while ($row = $result->fetch_assoc()) {
                    $varrow = $row['Password'];
                }

                $varpass = ($passwordsha);

                if ( $varrow == $varpass){
                    echo "Sie haben sich erfolgreich angemeldet";
                    session_start(array(session.name => $userName));
                    echo "<br><button onclick=\"location.href = 'list.php'\">Stöbern</button>";
                } else {
                    echo "Benutzername und Passwort stimmen nicht überein";
                    echo "<br><button onclick=\"location.href = 'login.php'\">Zurück</button>";
                }
            }
        ?>
    </body>
</html>