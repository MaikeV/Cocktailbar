<html>
    <?php
        include 'connection.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cocktailbar.nocache.css">
        <script src="cocktail.js"></script>
        <title>Title</title>
    </head>
    <body>
        <div class="backgroundDiv">
            <form action="SaveEntry.php" method="post">
                <label for="name">Name:
                    <input type="text" name="name" required>
                </label>
                <label for="alcohol">Enthält Alkohol:
                    <select name="alcohol">
                        <option>Ja</option>
                        <option>Nein</option>
                    </select>
                </label>
                <label for="allergenic">Enthält Allergene:
                    <select name="allergenic">
                        <?php

                        echo   "<option>Keine</option>";

                        $query = "SELECT * FROM t_additive";
                        $additives = mysqli_query($connection, $query);

                        while($t_additive = mysqli_fetch_object($additives)) {
                            echo "<option>$t_additive->Allergenic</option>";
                        }

                        echo   "</select></td>";
                        ?>
                </label>
                <input type="hidden" name="type" value="newIngredient">
                <button type="submit">Speichern</button>
                <button type="button" onclick="location.href = 'cocktail.php'">Zurück</button>
            </form>
        </div>
    </body>
</html>