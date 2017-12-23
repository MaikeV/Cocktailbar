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

            <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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


                    if(isset($_SESSION["login"]) && $_SESSION["login"] == 1){

                      $UID = $_SESSION["U_ID"];
                      $rating = mysqli_query($connection, "SELECT Rating FROM t_rated WHERE C_ID = $C_ID AND U_ID = $UID");
                      $rating = $rating->fetch_assoc();
                      $rating = $rating['Rating'];

                      $OverallRating = 0;
                      $counter = 0;
                      $results = mysqli_query($connection, "SELECT Rating FROM t_rated WHERE C_ID = $C_ID");
                        while($t_rated = mysqli_fetch_object($results)) {
                          $OverallRating += $t_rated->Rating;
                          $counter++;
                        }
                        $OverallRating = $OverallRating / $counter;

                      echo "
                      <span onClick=onStarClick(1) class='fa fa-star'></span>
                      <span onClick=onStarClick(2) class='fa fa-star'></span>
                      <span onClick=onStarClick(3) class='fa fa-star'></span>
                      <span onClick=onStarClick(4) class='fa fa-star'></span>
                      <span onClick=onStarClick(5) class='fa fa-star'></span>

                      <br>
                      <p>Gesamt Rating: $OverallRating / 5 </p>";


                      echo "<script >

                        var stars = document.getElementsByClassName('fa-star');
                        for(var x =0; x < 5; x++){
                          if(x  >= $rating){
                            stars[x].className = 'fa fa-star';
                          } else {
                            stars[x].className = 'fa fa-star checked';
                          }
                        }

                        </script>";

                    }



            ?>

            <button type="button" onclick="location.href = 'list.php'">Zurück</button>
        </div>
    </body>

    <script>





        function onStarClick( i ){

          var cId = <?php print($C_ID);?>;
          var uId = <?php print($_SESSION["U_ID"]);?>;

          var stars = document.getElementsByClassName("fa-star");
          for(var x =0; x < 5; x++){
            if(x  >= i){
              stars[x].className = "fa fa-star";
            } else {
              stars[x].className = "fa fa-star checked";
            }
          }
              postStuff(i, uId , cId);


        }


        function postStuff(rating, uId , cId){
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("POST", "handleRating.php", true);
          xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xmlhttp.send("rating=" + rating  + "&cId=" + cId + "&uId=" + uId);
        }

    </script>

</html>
