<?php
session_start();

$id = $_GET['id'];

if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]++;
}

header("Location: panier.php");
exit();
?>