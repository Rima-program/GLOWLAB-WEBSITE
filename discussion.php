<?php
session_start();
include("config.php");

$product_id = $_GET['product_id'];
$receiver_id = $_GET['receiver_id'];
$user_id = $_SESSION['user_id'];

$messages = mysqli_query($conn, "
    SELECT * FROM messages
    WHERE product_id=$product_id
    AND (
        (sender_id=$user_id AND receiver_id=$receiver_id)
        OR
        (sender_id=$receiver_id AND receiver_id=$user_id)
    )
    ORDER BY created_at ASC
");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Discussion - GlowLab</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="navbar">
    <div class="logo"><a href="index.php">GLOWLAB</a></div>
</header>

<div class="payment-box">
    <h1>Discussion</h1>

    <?php while($msg = mysqli_fetch_assoc($messages)) { ?>
        <p>
            <strong>
                <?php echo $msg['sender_id'] == $user_id ? "Moi" : "Utilisateur"; ?> :
            </strong>
            <?php echo $msg['message']; ?>
        </p>
    <?php } ?>

    <form action="send_message.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="receiver_id" value="<?php echo $receiver_id; ?>">

        <textarea name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>

</body>
</html>