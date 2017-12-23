<html>
<?php
include 'connection.php';
session_start();
$_SESSION['user'];
$_SESSION["login"];
?>
<head>
    <meta charset="UTF-8">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cocktailbar.nocache.css">
    <script src="cocktail.js"></script>
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="article-list-vertical.css">
    <title>Title</title>
</head>
    <body>
        <div class="backgroundDiv">

          <form action='displayCocktail.php' method='post'>
            <div class="row">
                <div class="col-lg-12">
                  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
              </div>
              <div class="dropdown-stuff">
                <span>Filter</span>
                <div class="dropdown-content">
                  <a class="dropdown-c-item">Recipename</a>
                  <a class="dropdown-c-item">Rating</a>
                </div>
              </div>
              <span onClick='onStarClick(1)' class="fa fa-star"></span>
              <span onClick=onStarClick(2) class="fa fa-star"></span>
              <span onClick=onStarClick(3) class="fa fa-star"></span>
              <span onClick=onStarClick(4) class="fa fa-star"></span>
              <span onClick=onStarClick(5) class="fa fa-star"></span>
          </form>


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

                                                    <button type='submit' onclick='' content='$t_cocktail->C_ID' class='read-more'>Mehr dazu...</button>
                                                </div>
                                    </li>
                                </form>";
                        }
                    }
                ?>
              </ul>
        </div>
    </body>

    <script>

        function onStarClick( i){

          var stars = document.getElementsByClassName("fa-star");
          for(var x =0; x < 5; x++){
            if(x  >= i){
              stars[x].className = "fa fa-star";
            } else {
              stars[x].className = "fa fa-star checked";
            }
          }
          postStuff(i);
        }


        function postStuff(rating){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("POST", "displayCocktail.php", true);
          xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xmlhttp.send("rating=" + rating);
        }

    </script>
</html>
