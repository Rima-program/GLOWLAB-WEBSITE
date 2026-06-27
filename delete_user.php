<?php
include("config.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Location: admin_users.php");
exit();
?>