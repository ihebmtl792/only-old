<?php 
require_once "../db/connection.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['status'])){
    $status = $_POST['status'];   
}
$email = $_SESSION['email'];

$select = mysqli_query($conn,"UPDATE `orders` SET `status`='$status' WHERE id = '$id'");
$select = mysqli_query($conn,"UPDATE `livreur` SET `status`='2' WHERE email = '$email'");





?>