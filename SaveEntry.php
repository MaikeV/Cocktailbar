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
                    $userName = $_SESSION['user'];
                    $name = $_POST["CName"];
                    $picture = $_POST["CPicture"];
                    $ingredient = $_POST["ingredient"]; //array
                    $amount = $_POST["amount"];         //array
                    $unit = $_POST["unit"];             //array
                    $howTo = $_POST["taRecipe"];

                    $U_ID = mysqli_query($connection,"SELECT U_ID FROM t_user WHERE Username = '$userName'");

                        if ($U_ID = $U_ID->fetch_assoc()) {
                            $U_ID = $U_ID['U_ID'];
                        } else {
                            echo "UserID konnte nicht gefunden werden";
                        }
                    $query = "INSERT INTO t_cocktail(U_ID, Recipename, CocktailPic, Recipe) VALUES ('$U_ID', '$name', '$picture', '$howTo')";
                    mysqli_query($connection, $query);
                    $C_ID = mysqli_query($connection, "SELECT C_ID FROM t_cocktail order by C_ID desc limit 1");
                    $C_ID = $C_ID->fetch_assoc();
                    $C_ID = $C_ID['C_ID'];

                    for($index = 0; $index < count($ingredient); $index++) {
                        $I_ID = mysqli_query($connection, "SELECT I_ID FROM t_ingredient WHERE Ingredient = '$ingredient[$index]'");
                        if ($I_ID = $I_ID->fetch_assoc()) {
                            $I_ID = $I_ID['I_ID'];
                        } else {
                            echo "Ingredient ID konnte nicht gefunden werden";
                        }
                        $UN_ID = mysqli_query($connection, "SELECT UN_ID FROM t_unit WHERE Description = '$unit[$index]'");
                        if ($UN_ID = $UN_ID->fetch_assoc()) {
                            $UN_ID = $UN_ID['UN_ID'];
                        } else {
                            echo "Unit ID konnte nicht gefunden werden";
                        }
                        $quantity = $amount[$index];

                        mysqli_query($connection, "INSERT INTO t_contains (I_ID, C_ID, UN_ID, Quantity) VALUES ('$I_ID', '$C_ID', '$UN_ID', '$quantity')");
                    }

                    echo "Cocktail wurde erfolgreich gespeichert";
                    echo "<br><button onclick=\"location.href = 'main.php'\">Zur Startseite</button>";
                }

            } else if ($type == "newIngredient") {
                $name = $_POST["name"];
                $alcohol = $_POST["alcohol"];
                $allergenic = $_POST["allergenic"];

                $duplicate = "SELECT Ingredient FROM t_ingredient WHERE Ingredient = '$name'";
                $result = mysqli_query($connection, $duplicate);
                $row = $result->fetch_assoc();

                if($row['Ingredient'] != null) {
                    echo "Die Zutat existiert bereits";
                } else {
                    if ($alcohol == "Ja") {
                        $alcohol = 1;
                    } else {
                        $alcohol = 0;
                    }

                    $query = "INSERT INTO t_ingredient(Ingredient, Alcohol) VALUES ('$name', '$alcohol') ";
                    mysqli_query($connection, $query);

                    if ($allergenic != "Keine") {
                        $I_ID = "SELECT I_ID FROM t_ingredient WHERE Ingredient = '$name'";
                        $I_IDresult = mysqli_query($connection, $I_ID);
                        $I_IDrow = $I_IDresult->fetch_assoc();

                        $A_ID = "SELECT A_ID FROM t_additive WHERE Allergenic = '$allergenic'";
                        $A_IDresult = mysqli_query($connection, $A_ID);
                        $A_IDrow = $A_IDresult->fetch_assoc();

                        $A_ID = $A_IDrow['A_ID'];
                        $I_ID = $I_IDrow['I_ID'];
                        $additiveQuery = "INSERT INTO t_has (A_ID, I_ID) VALUES ('$A_ID', '$I_ID')";

                        mysqli_query($connection, $additiveQuery);
                    }

                    echo "Die Zutat wurde erfolgreich gespeichert";
                }
            }
        ?>
    </body>
</html>
