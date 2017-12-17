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
        session_start();
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

                        $UN_ID[$a] = "SELECT UN_ID FROM t_unit where Description='$unit[$a]'";

                        $ingredientQuery = "INSERT INTO t_ingredient(Ingredient, UN_ID) VALUES('$ingredient[$a]', '$$UN_ID[$a]')";
                        $I_ID[$a] = "SELECT I_ID FROM t_ingredient WHERE Ingredient = '$ingredient[$a]' AND UN_ID = '$UN_ID[$a]'";
                    }

                    if ($alcohol == "Ja") {
                        $alcohol = 1;
                    } else {
                        $alcohol = 0;
                    }

                    $query = "INSERT INTO t_cocktail(Alcohol, Recipename, CocktailPic, Preparation) VALUES('$alcohol', '$name', '$picture', '$howTo')";

                    mysqli_query($connection, $query);

                    echo "Cocktail wurde erfolgreich gespeichert";
                    echo "<br><button onclick=\"location.href = 'main.php'\">Zur Startseite</button>";
                }

            } else if ($type = "newIngredient") {
                $name = $_POST["name"];
                $alcohol = $_POST["alcohol"];
                $allergenic = $_POST["allergenic"];

                $duplicate = "SELECT Ingredient FROM t_ingredient WHERE Ingredient = '$name'";
                $result = mysqli_query($connection, $duplicate);

                while ($row = $result->fetch_assoc()) {
                    echo $row['Ingredient'];
                }

                if($row['Ingredient'] != null) {
                    echo "Die Zutat existiert bereits";
                } else {
                    if ($alcohol == "Ja") {
                        $alcohol = 1;
                    } else {
                        $alcohol = 0;
                    }

                   // $query = "INSERT INTO t_user (Firstname, Lastname, Password, Username, Mail, Picture) VALUES ('$firstName', '$lastName', '$hash', '$userName', '$email', '$picture') ";
                    $queryShit = "INSERT INTO t_ingredient(Ingredient, Alcohol) VALUES ('$name', '$alcohol') ";
                    $Shit = mysqli_query($connection, $queryShit);
                    echo "$Shit";

                    if ($allergenic != "Keine") {
                        $I_ID = "SELECT I_ID FROM t_ingredient WHERE Ingredient = '$name'";
                        $A_ID = "SELECT A_ID FROM t_additive WHERE Allergenic = '$allergenic'";
                        $additiveQuery = "INSERT INTO t_has (A_ID, I_ID) VALUES ('$A_ID', '$I_ID')";

                        mysqli_query($connection, $additiveQuery);
                    }

                    echo "Die Zutat wurde erfolgreich gespeichert";
                }
            }
            else if($type == "login") {
                $userName = $_POST['userNameLogin'];
                $passwordLogin = $_POST['passwordLogin'];
                $dummy = $_POST["dummy"];
                $passwordsha = hash('sha256', $passwordLogin);
                $result = mysqli_query($connection, "SELECT Password FROM t_user WHERE username='$userName'");

                $varrow = "";

                while ($row = $result->fetch_assoc()) {
                    $varrow = $row['Password'];
                }

                $varpass = ($passwordsha);
                if(!isset(  $_SESSION["login"]) || isset(  $_SESSION["login"]) && $_SESSION["login"] == 0){
                  if ( $varrow == $varpass){
                      echo "Sie haben sich erfolgreich angemeldet";
                       $_SESSION['user'] = $userName;
                      
                        $_SESSION["login"] = 1;
                      echo "<script>
                        window.parent.location.reload();
                      </script>";

                  } else {
                      echo "Benutzername und Passwort stimmen nicht überein";
                      echo "<br><button onclick=\"location.href = 'login.php'\">Zurück</button>";
                  }
                }

            }
        ?>
    </body>
</html>
