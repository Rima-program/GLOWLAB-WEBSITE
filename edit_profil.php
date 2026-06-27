<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$user = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE users SET
        first_name='$first_name',
        last_name='$last_name',
        email='$email'
        WHERE id=$user_id
    ");

    header("Location: profil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier profil - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="categorie.php">Catégories</a>
        <a href="profil.php">Profil</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
</header>

<div class="payment-box">
    <h1>Modifier mon profil</h1>

    <form method="POST">
        <label>Prénom</label>
        <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" required>

        <label>Nom</label>
        <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <button type="submit" name="submit">Enregistrer</button>
    </form>
</div>

</body>
</html>