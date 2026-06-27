<?php
session_start();
include("config.php");

if (!isset($_GET['id'])) {
    header("Location: categorie.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    echo "Produit introuvable";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?> - GlowLab</title>
    <link rel="stylesheet" href="product.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="index.php">GLOWLAB</a>
    </div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="messages.php">Messages</a>
        <a href="login.php">Connexion</a>
    </nav>
</header>

<div class="breadcrumb">
    Accueil > <?php echo $product['category']; ?> > <?php echo $product['name']; ?>
</div>

<section class="product-container">

    <div class="thumbs">
        <img src="images/<?php echo $product['image1']; ?>" onclick="changeImage(this.src)">
        <img src="images/<?php echo $product['image2']; ?>" onclick="changeImage(this.src)">
        <img src="images/<?php echo $product['image3']; ?>" onclick="changeImage(this.src)">
        <img src="images/<?php echo $product['image4']; ?>" onclick="changeImage(this.src)">
        <img src="images/<?php echo $product['image5']; ?>" onclick="changeImage(this.src)">
    </div>

    <div class="main-image">
        <img id="mainProductImage" src="images/<?php echo $product['image1']; ?>">
    </div>

    <div class="product-info">

        <p class="brand-name"><?php echo $product['category']; ?></p>

        <h2><?php echo $product['name']; ?></h2>

        <div class="stars">
            ★★★★★ <span>1867 avis</span>
        </div>

        <p class="short-desc">
            Illumine · Hydrate · Protège
        </p>

        <hr>

        <p class="description">
            <?php echo $product['description']; ?>
        </p>

        <div class="price">
            <?php echo $product['price']; ?> €
        </div>

        <p class="size">Taille : 30ml</p>

        <form action="add_to_cart.php" method="POST">

            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

            <div class="quantity-box">
                <button type="button" onclick="decreaseQty()">-</button>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <button type="button" onclick="increaseQty()">+</button>
            </div>

            <button type="submit" class="cart-btn">
                AJOUTER AU PANIER
            </button>

        </form>

        <div class="product-actions">

            <a href="add_favori.php?id=<?php echo $product['id']; ?>" class="secondary-btn">
                Ajouter aux favoris
            </a>

            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != $product['user_id']) { ?>

                <a href="discussion.php?product_id=<?php echo $product['id']; ?>&receiver_id=<?php echo $product['user_id']; ?>" class="secondary-btn">
    Contacter le vendeur
</a>

            <?php } ?>

        </div>

    </div>

</section>

<section class="details">

    <div class="tabs">
        <button onclick="showTab('descriptionTab')">Description</button>
        <button onclick="showTab('livraisonTab')">Livraison</button>
        <button onclick="showTab('avisTab')">Avis</button>
    </div>

    <div id="descriptionTab" class="tab-content active">
        <h3>Description :</h3>
        <p><?php echo $product['description']; ?></p>

        <h3>Conseils d'utilisation :</h3>
        <ul>
            <li>Appliquer sur une peau propre et sèche.</li>
            <li>Masser délicatement jusqu'à absorption.</li>
            <li>Utiliser matin et soir selon les besoins.</li>
        </ul>

        <h3>Ingrédients :</h3>
        <p>
            Formule inspirée des soins coréens, conçue pour aider la peau à retrouver éclat,
            douceur et confort.
        </p>
    </div>

    <div id="livraisonTab" class="tab-content">
        <h3>Livraison :</h3>
        <p>
            Livraison standard estimée entre 2 et 5 jours ouvrés.
            Les frais de livraison sont calculés lors du paiement.
        </p>
    </div>

    <div id="avisTab" class="tab-content">
        <h3>Avis clients :</h3>
        <p>★★★★★ Très bon produit, idéal pour une routine skincare coréenne.</p>
        <p>★★★★☆ Texture agréable et résultat visible après quelques utilisations.</p>
    </div>

</section>

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

<script>
function changeImage(src) {
    document.getElementById("mainProductImage").src = src;
}

function increaseQty(){
    let qty = document.getElementById("quantity");
    qty.value = parseInt(qty.value) + 1;
}

function decreaseQty(){
    let qty = document.getElementById("quantity");
    if(parseInt(qty.value) > 1){
        qty.value = parseInt(qty.value) - 1;
    }
}

function showTab(tabId) {
    let tabs = document.querySelectorAll(".tab-content");
    tabs.forEach(tab => tab.classList.remove("active"));

    document.getElementById(tabId).classList.add("active");
}
</script>


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