<?php
session_start();



if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);




$conn = mysqli_connect("localhost","root","","food");


?>