<?php
session_start();
include("config.php");

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
</header>

<div class="cart-page">
    <h1>Gestion des utilisateurs</h1>

    <?php while($user = mysqli_fetch_assoc($result)) { ?>
        <div class="cart-item">
            <div class="cart-info">
                <h3><?php echo $user['first_name'] . " " . $user['last_name']; ?></h3>
                <p><?php echo $user['email']; ?></p>
                <p>Rôle : <?php echo $user['role']; ?></p>
            </div>

            <a href="make_admin.php?id=<?php echo $user['id']; ?>">Promouvoir admin</a>
            <a href="delete_user.php?id=<?php echo $user['id']; ?>">Supprimer</a>
        </div>
    <?php } ?>
</div>

</body>
</html>