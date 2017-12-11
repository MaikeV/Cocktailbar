<html>
<?php
    include 'connection.php';
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cocktailbar.nocache.css">
    <title>Title</title>
</head>
<body>
    <div class="create">
        <label>Name</label>
        <input type="text" id="CName">
        <div class="ingredients">
            <table>
                <thead>
                    <tr>
                        <td><label>Zutat</label></td>
                        <td><label>Einheit</label></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="text" title="ingredient"></td>
                    <td><select title="unit">
                            <option></option> //tabelle db
                        </select></td>
                    <td><button class="btnLine">+</button></td>
                    <td><button class="btnLine">-</button></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>
</html>