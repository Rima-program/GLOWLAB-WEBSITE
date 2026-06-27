<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $etat = $_POST['etat'];
    $user_id = $_SESSION['user_id'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "images/" . $image);

    $sql = "INSERT INTO products
    (name, category, description, price, image, image1, image2, image3, image4, image5, etat, user_id)
    VALUES
    ('$name', '$category', '$description', '$price', '$image', '$image', '$image', '$image', '$image', '$image', '$etat', '$user_id')";

    mysqli_query($conn, $sql);

    header("Location: mes_annonces.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une annonce - GlowLab</title>
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
        <a href="mes_annonces.php">Mes annonces</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
</header>

<div class="payment-box">

    <h1>Créer une annonce</h1>

    <form method="POST" enctype="multipart/form-data">

        <label>Titre de l’annonce</label>
        <input type="text" name="name" required>

        <label>Catégorie</label>
        <select name="category" required>
            <option>Nettoyants</option>
            <option>Crèmes hydratantes</option>
            <option>Toniques</option>
            <option>Masques visage</option>
            <option>Traitements</option>
            <option>Soins lèvres & yeux</option>
            <option>Exfoliants</option>
            <option>Crèmes solaires</option>
        </select>

        <label>Prix</label>
        <input type="number" step="0.01" name="price" required>

        <label>État</label>
        <select name="etat" required>
            <option>Neuf</option>
            <option>Bon état</option>
            <option>Correct</option>
        </select>

        <label>Description</label>
        <textarea name="description" required></textarea>

        <label>Image de l’annonce</label>
        <input type="file" name="image" required>

        <button type="submit" name="submit">Publier l’annonce</button>

    </form>

</div>

</body>
</html>