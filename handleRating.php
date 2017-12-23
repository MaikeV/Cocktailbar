<?php
include 'connection.php';
session_start();


if (array_key_exists('rating', $_POST) && array_key_exists('cId', $_POST)  && array_key_exists('uId', $_POST)) {

    $rating = $_POST['rating'];
    $cId = ($_POST['cId']);
    $uId = ($_POST['uId']);


      $query = "DELETE FROM  t_rated WHERE U_ID = '$uId' AND C_ID = '$cId' ";
      mysqli_query($connection,$query);

    $query = "INSERT INTO t_rated (U_ID, C_ID, Rating) VALUES ('$uId', '$cId', '$rating') ";
    mysqli_query($connection,$query);

}



?>
