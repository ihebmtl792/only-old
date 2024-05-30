<?php
require_once "db/connection.php";
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (($key = array_search($id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['message'] = "Le produit a été supprimé";
        header('location:cart.php');
    }
} else {
    $_SESSION['message'] = "Le panier a été vidé";
    unset($_SESSION['cart']);
    header('location:cart.php');
}
