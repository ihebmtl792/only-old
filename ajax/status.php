<?php 
require_once "../db/connection.php";


if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['status'])){
    $status = $_POST['status'];   
}

$select = mysqli_query($conn,"UPDATE `livreur` SET `status`='$status' WHERE id = '$id'");






?>