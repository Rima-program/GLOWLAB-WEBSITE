<?php
session_start();
include("config.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';

if($search != ''){
    $products = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY id DESC");
} else {
    $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
}
?>
<?php


$sql = "SELECT * FROM products WHERE id IN (4, 16, 24, 34, 44, 54, 64, 74)";
$result = mysqli_query($conn, $sql);
?>
<?php
$bestSellers = mysqli_query($conn,
"SELECT * FROM products WHERE id IN (4,16,24,34,44,54,64,74)");

$newProducts = mysqli_query($conn,
"SELECT * FROM products
WHERE id NOT IN (4,16,24,34,44,54,64,74)
ORDER BY id DESC
LIMIT 8");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GlowLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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

        <div class="dropdown">
            <a href="#">Mon compte ▾</a>

            <div class="dropdown-content">
                <a href="profil.php">Mon profil</a>
                <a href="messages.php">Messages</a>
                <a href="favoris.php">Mes favoris</a>
                <a href="create_product.php">Créer une annonce</a>
                <a href="mes_annonces.php">Mes annonces</a>
                <a href="logout.php">Déconnexion</a>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
    <a href="admin_users.php">Administration</a>
<?php } ?>
            </div>

        </div>
        <a href="panier.php">Panier</a>
    </nav>

    <form action="search.php" method="GET" class="search-form">
    <input type="text" name="search" placeholder="Rechercher une annonce...">
    <button type="submit">Rechercher</button>
</form>
</header>



<section class="slider">

    <div class="slide active" style="background-image:url('images/slide1.jpg')">
        <div class="slide-text">
            
            <a href="categorie.php" class="btn">Votre éclat commence ici</a>
        </div>
    </div>

    <div class="slide" style="background-image:url('images/slide')">
        <div class="slide-text">
            <a href="create_product.php" class="btn">Creer une annonce</a>
        </div>
    </div>

    <div class="slide" style="background-image:url('images/slide3')">
        <div class="slide-text">
    
            
            <a href="categorie.php" class="btn">Hydratation intense</a>
        </div>
    </div>

    <div class="slide" style="background-image:url('images/slide4.jpg')">
        <div class="slide-text">
            
            <a href="categorie.php" class="btn">Routine GlowLab</a>
        </div>
    </div>

</section>

<section class="products-section">
    <h2>Dernières annonces</h2>

    <div class="products-grid">
        <?php while($product = mysqli_fetch_assoc($products)) { ?>

        <div class="product-card">
            <a href="product.php?id=<?php echo $product['id']; ?>">
                <img src="images/<?php echo $product['image1']; ?>">
            </a>

            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['price']; ?> €</p>
        </div>

        <?php } ?>
    </div>
</section>
<?php
$bestSellers = mysqli_query($conn,
"SELECT * FROM products
WHERE id IN (4,16,24,34,44,54,64,74)");
?>

<section class="products-section" id="best-sellers">
    <h2>Meilleures ventes</h2>

    <div class="products-grid">
      <?php while($product = mysqli_fetch_assoc($bestSellers)) { ?>

<div class="product-card">
    <a href="product.php?id=<?php echo $product['id']; ?>">
        <img src="images/<?php echo $product['image1']; ?>" alt="<?php echo $product['name']; ?>">
    </a>

    <h3><?php echo $product['name']; ?></h3>
    <p><?php echo $product['description']; ?></p>
    <span><?php echo $product['price']; ?> €</span>
</div>

<?php } ?>
    </div>
</section>



<script>
let slides = document.querySelectorAll(".slide");
let current = 0;

setInterval(() => {

    slides[current].classList.remove("active");

    current++;

    if(current >= slides.length){
        current = 0;
    }

    slides[current].classList.add("active");

},4000);
</script>
<section class="video-section">

    <div class="video-text">

        <h2>Découvrez GlowLab</h2>

        <p>
            Découvrez notre sélection de soins coréens conçus pour
            hydrater, protéger et révéler l'éclat naturel de votre peau.
        </p>

        <a href="categorie.php" class="btn">
            Découvrir les produits
        </a>

    </div>

    <div class="video-box">

        <video autoplay muted loop controls>
            <source src="images/glowlab-video.mp4" type="video/mp4">
        </video>

    </div>

</section>
<?php
$newProducts = mysqli_query($conn,
"SELECT * FROM products ORDER BY id DESC LIMIT 8");
?>

<section class="products-section">

    <h2>Nouveautés</h2>

    <div class="products-grid">

        <?php while($product = mysqli_fetch_assoc($newProducts)) { ?>

            <div class="product-card">

                <a href="product.php?id=<?php echo $product['id']; ?>">
                    <img src="images/<?php echo $product['image1']; ?>">
                </a>

                <h3><?php echo $product['name']; ?></h3>

                <span><?php echo $product['price']; ?> €</span>

            </div>

        <?php } ?>

    </div>

</section>

<footer>

    <div class="footer-section">
        <h3>GLOWLAB</h3>
        <p>Votre destination pour les soins et la beauté coréens.</p>
    </div>

    <div class="footer-section">
        <h4>Navigation</h4>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="panier.php">Panier</a>
    </div>

    <div class="footer-section">
        <h4>Informations</h4>
        <a href="#">Livraison</a>
        <a href="#">Retours</a>
        <a href="#">FAQ</a>
    </div>

    <div class="footer-section">
        <h4>Contact</h4>
        <p>contact@glowlab.fr</p>
        <p>Paris, France</p>
    </div>

</footer>

<div class="copyright">
    © 2026 GlowLab. Tous droits réservés.
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>