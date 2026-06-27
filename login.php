<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-GlowLab</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
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
    <div class="form-box">
        
            <div class="brand">
                
                
            </div>

            <p class="subtitle">Se connecter</p>
            <form action="login_process.php" method="POST">
                <label>Email</label>
                <input type="text" name="email" required>

                <label>Mot de passe</label>
                <input type="text" name="password" required>
                <button type="submit">Se connecter</button>
                <div class="or">
                    <span></span>
                    <p>OR</p>
                    <span></span>
                </div>

                <p class="register-text">
                    
                    <a href="register.php">Créer un compte</a>
                </p>

            </form>


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