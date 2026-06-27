<?php
include("config.php");

$category = isset($_GET['category']) ? $_GET['category'] : 'Nettoyants';

$sql = "SELECT * FROM products WHERE category='$category'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catégories - GlowLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="categorie.css?v=<?php echo time(); ?>">
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

<div class="container">

    <aside class="sidebar">
        <h3>Catégories</h3>

        <a href="categorie.php?category=Nettoyants">Nettoyants</a>
        <a href="categorie.php?category=Crèmes hydratantes">Crèmes hydratantes</a>
        <a href="categorie.php?category=Toniques">Toniques</a>
        <a href="categorie.php?category=Masques visage">Masques visage</a>
        <a href="categorie.php?category=Traitements">Traitements</a>
        <a href="categorie.php?category=Soins lèvres %26 yeux">Soins lèvres & yeux</a>
        <a href="categorie.php?category=Exfoliants">Exfoliants</a>
        <a href="categorie.php?category=Crèmes solaires">Crèmes solaires</a>
    </aside>

    <main class="content">

        <h2><?php echo $category; ?></h2>

        <div class="products-grid">

            <?php while($product = mysqli_fetch_assoc($result)) { ?>

                <div class="product-card">

                    <a href="product.php?id=<?php echo $product['id']; ?>">
                        <div class="product-image">
                            <img class="img1" src="images/<?php echo $product['image1']; ?>">
                            <img class="img2" src="images/<?php echo $product['image2']; ?>">
                        </div>
                    </a>

                    <h3><?php echo $product['name']; ?></h3>

                    <p><?php echo $product['description']; ?></p>

                    <span class="price">
                        <?php echo $product['price']; ?> €
                    </span>

                    <form action="add_to_cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="cart-btn">Ajouter au panier</button>
                    </form>

                </div>

            <?php } ?>

        </div>

    </main>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>