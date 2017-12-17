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
        <table>
            <tbody>
            <?php
                $query = "SELECT * FROM t_cocktail";

                $results = mysqli_query($connection,$query);

                        while($t_cocktail = mysqli_fetch_object($results)) {
                            echo "<tr>
                                    <td>$t_cocktail->Picture</td>
                                    <td>$t_cocktail->Name</td>
                                    <td>$t_cocktail->Description</td>
                                  </tr>";
                        }
            ?>
            </tbody>
        </table>

    </body>
</html>
