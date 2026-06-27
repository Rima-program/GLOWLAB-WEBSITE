<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="profil.php">Profil</a>
        
    </nav>
</header>

<div class="payment-box">
    <h1>Mon profil</h1>

    <p><strong>Nom :</strong> <?php echo $user['first_name']; ?></p>
    <p><strong>Prénom :</strong> <?php echo $user['last_name']; ?></p>
    <p><strong>Email :</strong> <?php echo $user['email']; ?></p>

    <a href="edit_profil.php" class="checkout-btn">Modifier mon profil</a>
    <a href="logout.php" class="logout-btn">Déconnexion</a>
</div>

</body>
</html>