<?php
session_start();
include("config.php");

$sender_id = $_SESSION['user_id'];
$receiver_id = $_POST['receiver_id'];
$product_id = $_POST['product_id'];
$message = $_POST['message'];

mysqli_query($conn, "
    INSERT INTO messages(product_id, sender_id, receiver_id, message)
    VALUES($product_id, $sender_id, $receiver_id, '$message')
");

header("Location: discussion.php?product_id=$product_id&receiver_id=$receiver_id");
exit();
?>