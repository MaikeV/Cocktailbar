<html>
<?php
include 'connection.php';
session_start();
$_SESSION['user'];
$_SESSION["login"];
$_SESSION['C_ID'];

echo "<script>window.parent.scroll(0, 0);</script>"
?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cocktailbar.nocache.css">
        <script src="cocktail.js"></script>
        <link rel="stylesheet" href="article-list-vertical.css">
        <title>Title</title>
    </head>
    <body>
        <div class="backgroundDiv">

            <?php

                $C_ID = $_POST['C_ID'];

                $name = mysqli_query($connection, "SELECT Recipename FROM t_cocktail WHERE C_ID = $C_ID");
                $name = $name->fetch_assoc();
                $name = $name['Recipename'];

                $picture = mysqli_query($connection, "SELECT CocktailPic FROM t_cocktail WHERE C_ID = $C_ID");
                $picture = $picture->fetch_assoc();
                $picture = $picture['CocktailPic'];

                if(isset($picture) && $picture != null) {
                    $picture = "images/".$picture;
                } else {
                    $picture = "images/placeholder.png";
                }

                $howTo = mysqli_query($connection, "SELECT Recipe FROM t_cocktail WHERE C_ID = $C_ID");
                $howTo = $howTo->fetch_assoc();
                $howTo = $howTo['Recipe'];

                echo "<h1>$name</h1>
                    <img src='$picture' height='300' width='300'>
                    <p>$howTo</p>";
            ?>

            <button type="button" onclick="location.href = 'list.php'">Zurück</button>
        </div>
    </body>
</html>
