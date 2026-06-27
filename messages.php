<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "
SELECT 
    m.product_id,
    p.name,
    p.image1,
    CASE
        WHEN m.sender_id = $user_id THEN m.receiver_id
        ELSE m.sender_id
    END AS other_user
FROM messages m
JOIN products p ON m.product_id = p.id
WHERE m.sender_id = $user_id OR m.receiver_id = $user_id
GROUP BY m.product_id, other_user
ORDER BY MAX(m.created_at) DESC
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messages - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="index.php">GLOWLAB</a>
    </div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="panier.php">Panier</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
</header>

<div class="cart-page">

    <h1>Mes discussions</h1>

    <?php if(mysqli_num_rows($result) == 0) { ?>

        <p class="empty-cart">Aucune discussion pour le moment.</p>

    <?php } ?>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="cart-item">

            <img src="images/<?php echo $row['image1']; ?>" alt="Produit">

            <div class="cart-info">
                <h3><?php echo $row['name']; ?></h3>

                <a href="discussion.php?product_id=<?php echo $row['product_id']; ?>&receiver_id=<?php echo $row['other_user']; ?>" class="checkout-btn">
                    Ouvrir la discussion
                </a>
            </div>

        </div>

    <?php } ?>

</div>

</body>
</html>