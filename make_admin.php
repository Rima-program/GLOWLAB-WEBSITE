<?php
include("config.php");

$id = $_GET['id'];

mysqli_query($conn, "UPDATE users SET role='admin' WHERE id=$id");

header("Location: admin_users.php");
exit();
?>