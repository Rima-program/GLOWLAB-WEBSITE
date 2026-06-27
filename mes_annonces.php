<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM products WHERE user_id=$user_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes annonces</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="create_product.php">Créer annonce</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
</header>

<div class="cart-page">
    <h1>Mes annonces</h1>

    <div class="products-grid">
        <?php while($product = mysqli_fetch_assoc($result)) { ?>

        <div class="product-card">
            <img src="images/<?php echo $product['image1']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['price']; ?> €</p>

            <a href="edit_product.php?id=<?php echo $product['id']; ?>">Modifier</a>
            <a href="delete_product.php?id=<?php echo $product['id']; ?>">Supprimer</a>
        </div>

        <?php } ?>
    </div>
</div>

</body>
</html>