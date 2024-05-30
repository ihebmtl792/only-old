<?php
require_once "../db/connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($conn,"DELETE FROM `orders` WHERE id = '$id'");
    header('location:../home.php');

}else{
    $id = $_GET['idu'];
    $select = mysqli_query($conn,"DELETE FROM `orders` WHERE id = '$id'");
    header('location:../home_livreur.php');
}

?>