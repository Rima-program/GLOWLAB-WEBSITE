<?php
include("config.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';

$result = mysqli_query($conn,
"SELECT * FROM products
WHERE name LIKE '%$search%'
ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
</header>

<h1 style="text-align:center; margin:50px;">
    Résultats pour : <?php echo $search; ?>
</h1>

<div class="products-grid" style="padding:50px;">

<?php while($product = mysqli_fetch_assoc($result)) { ?>

    <div class="product-card">
        <a href="product.php?id=<?php echo $product['id']; ?>">
            <img src="images/<?php echo $product['image1']; ?>">
        </a>

        <h3><?php echo $product['name']; ?></h3>
        <p><?php echo $product['price']; ?> €</p>
    </div>

<?php } ?>

</div>

</body>
</html>