<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cocktailbar.nocache.css">
    <title>Cocktailbar - Startseite</title>
</head>
<body>
    <div class="backgroundDiv">

        <h1>Herzlich Willkommen auf Cocktailbar.de</h1>
            <?php
                $query = "SELECT * FROM t_cocktail order by C_ID desc limit 5";
            ?>

    </div>
</body>
</html>
