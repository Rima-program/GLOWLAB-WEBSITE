<?php
session_start();
include("config.php");

$total = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier - GlowLab</title>
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
        <a href="login.php">Connexion</a>
    </nav>
</header>

<div class="cart-page">

    <h1>Votre panier</h1>

    <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) { ?>

        <p class="empty-cart">Votre panier est vide.</p>

    <?php } else { ?>

        <div class="cart-layout">

            <div class="cart-items">

                <?php foreach ($_SESSION['cart'] as $id => $quantity) {

                    $sql = "SELECT * FROM products WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    $product = mysqli_fetch_assoc($result);

                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                ?>

                <div class="cart-item">

                    <img src="images/<?php echo $product['image1']; ?>" alt="Produit">

                    <div class="cart-info">
                        <h3><?php echo $product['name']; ?></h3>

                        <p><?php echo $product['description']; ?></p>

                        <p>Prix : <?php echo $product['price']; ?> €</p>

                        <div class="cart-quantity">
                            <a href="decrease_cart.php?id=<?php echo $id; ?>">-</a>
                            <span><?php echo $quantity; ?></span>
                            <a href="increase_cart.php?id=<?php echo $id; ?>">+</a>
                        </div>

                        <p>Sous-total : <?php echo number_format($subtotal, 2); ?> €</p>
                    </div>

                    <a class="remove" href="remove_from_cart.php?id=<?php echo $id; ?>">
                        Supprimer
                    </a>

                </div>

                <?php } ?>

            </div>

            <div class="cart-summary">
                <h2>Résumé</h2>

                <p>Total</p>

                <h3><?php echo number_format($total, 2); ?> €</h3>

                <a href="paiement.php" class="checkout-btn">
                    Acheter
                </a>
            </div>

        </div>

    <?php } ?>

</div>
<footer>
    <div class="footer-section">
        <h3>GLOWLAB</h3>
        <p>Votre destination pour les soins coréens.</p>
    </div>

    <div class="footer-section">
        <h4>Navigation</h4>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="panier.php">Panier</a>
    </div>

    <div class="footer-section">
        <h4>Aide</h4>
        <a href="#">Livraison</a>
        <a href="#">Retours</a>
        <a href="#">Contact</a>
    </div>
</footer>

<div class="copyright">
    © 2026 GlowLab. Tous droits réservés.
</div>
</body>
</html>