<?php
session_start();
include("config.php");

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM products WHERE id=$id AND user_id=$user_id";
mysqli_query($conn, $sql);

header("Location: mes_annonces.php");
exit();
?>