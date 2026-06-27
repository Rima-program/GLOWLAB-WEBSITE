<?php
session_start();
include("config.php");

$total = 0;

if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $id => $quantity){
        $sql = "SELECT * FROM products WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

        $total += $product['price'] * $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement - GlowLab</title>
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

<div class="payment-box">
    <h1>Paiement</h1>

    <h2>Total : <?php echo number_format($total, 2); ?> €</h2>

    <form>
        <label>Nom sur la carte</label>
        <input type="text" placeholder="Nom complet">

        <label>Numéro de carte</label>
        <input type="text" placeholder="1234 5678 9012 3456">

        <label>Date d'expiration</label>
        <input type="text" placeholder="MM/AA">

        <label>CVV</label>
        <input type="text" placeholder="123">

        <button type="button">Payer maintenant</button>
    </form>
</div>

</body>
</html>