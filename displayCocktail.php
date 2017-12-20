<html>
<?php
include 'connection.php';
session_start();
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
                if(isset($_POST["name"]) AND !empty($_POST["name"]) && isset($_POST["howTo"]) AND !empty($_POST["howTo"]) && isset($_POST["C_ID"]) AND !empty($_POST["C_ID"])) {
                    $name = $_POST["name"];
                    $picture = $_POST["picture"];
                    $howTo = $_POST["howTo"];

                }
                $C_ID = $_POST["C_ID"];

                echo $C_ID;

                echo "<h1>$name</h1>
                    <img src='$picture' height='50' width='50'>
                    <p>$howTo</p>";
            ?>
        </div>
    </body>
</html>
