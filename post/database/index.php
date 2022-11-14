<?php 
session_start();
if ($_SESSION['priv'] != 'admin') {
    header("Location: ../");
    
}
require "../database.php"?>
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
        <form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Anime yang ingin di tambahkan</p>
            <div class="input-group">
                <label for="pilih">Pilih mau di mana<br></label>
                <select name="pilih" id="pilih" class="pilih" style="width: 100%; height:100%;">
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="movie">Movie</option>
                </select>
            </div>
            <div class="input-group">
            <label for="judul">Judul</label>
                <input type="text" id="judul" placeholder="Judul" name="judul" value="" required>
            </div>
            <div class="input-group">
                <label for="gambar">Gambar</label>
                <input id="gambar" type="file" placeholder="Gambar" name="gambar" value="" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Submit</button>
            </div>
            <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $waktu = date("Y-m-d H-i-s");
            if (isset($_POST['submit'])) {
                $pilih = $_POST['pilih'];
                $judul = $_POST['judul'];
                $gambar = $_FILES['gambar']['name'];
                $ekstensigmbrvalid = ["webp"];
                $ekstensigmbr = explode(".", $gambar);
                $ekstensigmbr = strtolower(end($ekstensigmbr));
                if(!in_array($ekstensigmbr, $ekstensigmbrvalid)){
                    echo "<p>Yang anda upload tidak berformat webp mohon di compress terlebih dahulu</p>";
                }
                else{
                    $temp = $_FILES['gambar']['tmp_name'];
                    $uniq = uniqid();
                    $baru = $uniq.".".$gambar;
                    if(move_uploaded_file($temp, '../gambar/' . $pilih . '/' .$baru)){
                        $query = mysqli_query($conn, "INSERT INTO `$pilih`(`id`, `judul`, `gambar`, `waktu`) VALUES (NULL,'$judul','$baru', '$waktu')");
                        if($query){
                            echo "<script>alert('berhasil menambahkan data')</script>";
                        }
                        else{
                            echo error_log($query);
                        }
                    }
                    else{
                        echo "<script>alert('terdapat kesalahan ketika menambahkan data')</script>";
                    }
                }
            }
        ?> 
        <br><center>Ingin mengubah database yang ada? <a href="edit.php">Ubah</a> </center>
        <br><center>Ingin kembali? <a href="../">kembali</a> </center>
        </form>
    </div>
</body>
</html>