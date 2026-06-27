<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id AND user_id=$user_id");
$product = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $etat = $_POST['etat'];

    mysqli_query($conn, "UPDATE products SET
        name='$name',
        category='$category',
        description='$description',
        price='$price',
        etat='$etat'
        WHERE id=$id AND user_id=$user_id
    ");

    header("Location: mes_annonces.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier annonce</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
</header>

<div class="payment-box">
    <h1>Modifier l’annonce</h1>

    <form method="POST">
        <label>Titre</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>

        <label>Catégorie</label>
        <input type="text" name="category" value="<?php echo $product['category']; ?>" required>

        <label>Prix</label>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>

        <label>État</label>
        <select name="etat">
            <option <?php if($product['etat']=='Neuf') echo 'selected'; ?>>Neuf</option>
            <option <?php if($product['etat']=='Bon état') echo 'selected'; ?>>Bon état</option>
            <option <?php if($product['etat']=='Correct') echo 'selected'; ?>>Correct</option>
        </select>

        <label>Description</label>
        <textarea name="description"><?php echo $product['description']; ?></textarea>

        <button type="submit" name="submit">Enregistrer</button>
    </form>
</div>

</body>
</html>