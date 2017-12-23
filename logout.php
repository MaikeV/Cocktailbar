<!DOCTYPE html>
<html lang="en">
<?php
    include 'connection.php';
?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cocktailbar.nocache.css">
        <title>Cocktailbar</title>
    </head>
    <body>
              <?php
                session_start();
                  $_SESSION['login'] = 0;
                  echo "<script>
                    window.parent.location.reload();
                  </script>";
              ?>
    </body>
</html>
