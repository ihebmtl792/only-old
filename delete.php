<?php
require_once "db/connection.php";

if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    $delete = mysqli_query($conn,"DELETE FROM `foods` WHERE id = '$id'");
    header('location:add.php');
} elseif(isset($_GET['id2'])){
    $id2 = intval($_GET['id2']);
    $delete = mysqli_query($conn,"DELETE FROM `livreur` WHERE id = '$id2'");
    header('location:etat.php');
}

