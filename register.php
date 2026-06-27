<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - GlowLab</title>
    <link rel="stylesheet" href="register.css?v=<?php echo time(); ?>">
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
<div class="page">

    <div class="brand">
                
            </div>

    <div class="right-side">
        <div class="form-box">
           <p class="subtitle">Créez votre compte GlowLab et débutez votre aventure beauté.</p>

            <form action="register_process.php" method="POST">

                <label>PRENOM</label>
                <input type="text" name="first_name" required>

                <label>NOM</label>
                <input type="text" name="last_name" required>

                <label>EMAIL</label>
                <input type="email" name="email" required>

                <label>MOT DE PASSE</label>
                <input type="password" name="password" required>

                <label>CONFIRMER MOT DE PASSE</label>
                <input type="password" name="confirm_password" required>

                <button type="submit">CREER UN COMPTE</button>

                <div class="or">
                    <span></span>
                    <p>OU</p>
                    <span></span>
                </div>

                <p class="login-text">
                    
                    <a href="login.php">SE CONNECTER</a>
                </p>

            </form>
        </div>
    </div>

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