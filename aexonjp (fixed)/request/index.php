<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../");
}
require "../database.php"
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Anime yang ingin di Request</p>
            <div class="input-group">
                <input type="text" placeholder="Judul" name="judul" value="" required>
            </div>
            <div class="input-group">
            <input type="number" placeholder="Banyak episode" name="episode" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==15) return false;" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Rating (x.xx)" name="rating" pattern="[0-9]{1}.[0-9]{2}" value="" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Genre" name="genre" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Submit</button>
            </div>
            <br><center>Ingin kembali? <a href="../">kembali</a> </center>
            <?php
            if (isset($_POST['submit'])) {
                $judul = $_POST['judul'];
                $episode = $_POST['episode']; 
                $rating= $_POST['rating'];
                $genre = $_POST['genre'];
                $query = mysqli_query($conn, "INSERT INTO request VALUES (NULL,'$judul','$episode', '$rating', $genre)");
                echo("<script>alert('terima kasih sudah request anime')</script>");
            }
        ?> 
        </form>
    </div>
</body>
</html>