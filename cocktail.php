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
    <div class="create">
        <form action="SaveEntry.php" method="post">
            <label for="CName">Name:</label>
            <input type="text" name="CName" title="CocktailName" placeholder="Name" required>

            <label for="CPicture">Foto:</label>
            <input type="file" name="CPicture">

            <div class="ingredients">
                <input type="button" class="btnLine" onClick="addRow('ingredientTable')" value="+" />
                <input type="button" class="btnLine" onClick="removeRow('ingredientTable')" value="-" />

                <table>
                    <thead>
                        <tr>
                            <td><label>Zutat</label></td>
                            <td><label>Menge</label></td>
                            <td><label>Einheit</label></td>
                        </tr>
                    </thead>
                    <tbody id="ingredientTable">
                    <tr>
                        <td><input type="text" title="ingredient" name="ingredient[]" required></td>
                        <td><input type="number" title="amount" name="amount[]" required></td>
                        <td><select title="unit" name="unit[]">

                        <?php
                                $query = "SELECT * FROM t_unit";
                                $units = mysqli_query($connection, $query);

                                while($t_unit = mysqli_fetch_object($units)) {
                                    echo "<option>$t_unit->Description</option>";
                                }

                                echo   "</select></td>";
                         ?>
                    </tr>
                    </tbody>
                </table>
                <fieldset>
                    <p>Cocktail enthält Alkohol</p>
                    <label for="true">Ja</label>
                    <input type="radio" id="true" name="rbtnAlc" value="Ja" checked>
                    <label for="false">Nein</label>
                    <input type="radio" id="false" name="rbtnAlc" value="Nein">
                </fieldset>
                <label for="taRecipe"></label>
                <textarea placeholder="Zubereitung" name="taRecipe" id="taRecipe"></textarea>
            </div>
            <input type="hidden" name="type" value="newCocktail">

            <button type="submit">Speichern</button>
        </form>
    </div>
</body>
</html>