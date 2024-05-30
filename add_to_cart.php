<?php
require_once "db/connection.php";

if (!in_array($_GET['id'], $_SESSION['cart'])) {
    array_push($_SESSION['cart'], intval($_GET['id']));
    $_SESSION['message'] = 'Le produit a été ajouté au panier';
    header('location:cart.php');
} else { 
    header('location:cart.php');
}


