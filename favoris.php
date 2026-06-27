<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT products.*
        FROM favoris
        JOIN products ON favoris.product_id = products.id
        WHERE favoris.user_id = $user_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes favoris - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="panier.php">Panier</a>
    </nav>
</header>

<div class="cart-page">
    <h1>Mes favoris</h1>

    <div class="products-grid">
        <?php while($product = mysqli_fetch_assoc($result)) { ?>

            <div class="product-card">
                <a href="product.php?id=<?php echo $product['id']; ?>">
                    <img src="images/<?php echo $product['image1']; ?>">
                </a>

                <h3><?php echo $product['name']; ?></h3>
                <p><?php echo $product['price']; ?> €</p>

                <a href="remove_favori.php?id=<?php echo $product['id']; ?>">
                    Retirer des favoris
                </a>
            </div>

        <?php } ?>
    </div>
</div>

</body>
</html>