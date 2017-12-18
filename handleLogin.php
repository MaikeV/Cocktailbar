<?php
    include("connection.php");

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

    if(!isset($_SESSION["login"]) || isset($_SESSION["login"]) && $_SESSION["login"] == 0){
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
