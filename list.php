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
        <ul class="article-list-vertical">
          <li>
              <a href="#" style="background: url('/images/colosseum.jpg')"> </a>
              <div>
                  <h2><a href="#"></a></h2>

              </div>
          </li>
            <?php
              //  $query = "SELECT * FROM t_cocktail";

                //$results = mysqli_query($connection,$query);

                $t_cocktail = new stdClass;
                $t_cocktail->Picture = '/images/colosseum.jpg';
                $t_cocktail->Name = 'bsar';
                $t_cocktail->Description = 'baaaar';


                        //while($t_cocktail = mysqli_fetch_object($results)) {

                          /*  echo "<tr>
                                    <td>$t_cocktail->Picture</td>
                                    <td>$t_cocktail->Name</td>
                                    <td>$t_cocktail->Description</td>
                                  </tr>";
*/
                echo "
                <li>
                    <a href='#' style='background: url(  $t_cocktail->Picture)'> </a>
                    <div>
                        <h2><a href='#'>$t_cocktail->Name</a></h2>
                        <p>  $t_cocktail->Description</p>
                        <a href='#' class='read-more'>Read more &rarr;</a>
                    </div>
                </li>";


                        //}
            ?>
          </ul>

    </body>
</html>
