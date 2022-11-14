<?php 
session_start();
if (!isset($_SESSION['judul'])){
    header('Location: ../');
}
?>
<script>if ( window.history.replaceState ) {
 window.history.replaceState( null, null, window.location.href );
}
</script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" type="text/css" href="login.css">
 
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Anime yang di Request</p>
            <div class="input-group">
            judul anime : <?php echo($_SESSION['judul']); ?>
            </div>
            <div class="input-group">
            Banyak episode : <?php echo($_SESSION['episode']); ?>
            </div>
            <div class="input-group">
            rating anime : <?php echo($_SESSION['rating']); ?>
            </div>
            <div class="input-group">
            genre : <?php echo($_SESSION['genre']); ?>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Kembali</button>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                header("Location: ../");
            }
        ?> 
        </form>
    </div>
</body>
</html>