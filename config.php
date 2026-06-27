<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "glowlab"
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
