<?php 
session_start();
if (isset($_SESSION['username'])) {
    header("Location: ../");
}
require "../database.php";
$isi = mysqli_query($conn, "SELECT `id`, `username`, `password`, `priv` FROM `akun`");
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <?php
            // $username = array('aexon' , 'user');
            // $password = array('123', 'user');
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $mu = false;
                while($row = mysqli_fetch_assoc($isi)):
                if(password_verify($_POST['password'], $row['password']) && $_POST['username'] == $row['username']){
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["priv"] = $row['priv'];
                    echo "<script>alert('Anda berhasil login, selamat datang kawan')document.location.href = '../';</script>";
                    header ("Location: ../");
                }
                endwhile;
                if($mu == false) {
                    echo("<p class='login-register-text'>username atau password anda salah.</p>");
                }
            }
            elseif (isset($_SESSION['username'])){
                header("Location: ../");
            }
        ?> 
        </form>
        <br><center>apakah anda belum mempunyai akun? <a href="register.php" style="text-decoration:none">Daftar</a></center>
        <br><center>ingin kembali? <a href="../" style="text-decoration:none">Kembali</a></center>
    </div>
</body>
</html>