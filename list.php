<html>
<?php
include 'connection.php';
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
            <ul class="article-list-vertical">
                <?php
                    $results = mysqli_query($connection, "SELECT * FROM t_cocktail");

                    while($t_cocktail = mysqli_fetch_object($results)) {
                        if(isset($t_cocktail->C_ID) && isset($t_cocktail->Recipename) && isset($t_cocktail->Recipe)) {
                            echo "
                                <form action='displayCocktail.php' method='post'>
                                    <li>";
                                        if(isset($t_cocktail->CocktailPic) && $t_cocktail->CocktailPic != null) {
                                            $picture = "images/".$t_cocktail->CocktailPic;
                                            echo "<a name='picture' style = 'background: url($picture)'> </a >";
                                        } else {
                                            echo "<a name='picture' style=\"background-image: url('images/placeholder.png')\"></a>";
                                        }
                                            echo "   
                                                <div>
                                                    <h2 name='name'>$t_cocktail->Recipename</h2>
                                                    <p name='howTo'>$t_cocktail->Recipe</p>
                                                    <p hidden name='C_ID'>$t_cocktail->C_ID</p>
                                                   
                                                    <button type='submit' content='$t_cocktail->C_ID' class='read-more'>Mehr dazu...</button>
                                                </div>
                                    </li>
                                </form>";
                        }
                    }
                ?>
              </ul>
        </div>
    </body>
</html>
