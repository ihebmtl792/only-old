<?php
require_once "../db/connection.php";
$select = mysqli_query($conn,"DELETE FROM `orders`");
header('location:../home_livreur.php');
?>