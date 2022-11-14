<?php 
session_start();
if ($_SESSION['priv'] != 'admin') {
    header("Location: ../");
    
}
$section = '';
$id ='';
$section =$_GET['section'];
$id =$_GET['id'];
require "../database.php";
$tempat = mysqli_query($conn, "SELECT `id`, `judul`, `gambar` FROM `$section` WHERE id = $id");
                while($row = mysqli_fetch_assoc($tempat)):
                    $judul= $row['judul'];
                    $temps = $row['gambar'];
                endwhile;
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
        <form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 1.2rem; font-weight: 800;">Data anime yang dipilih</p>
            <p>Pada section : <?php echo $section?></p>
            <p>Judul : <?php echo $judul?></p>
            <br>
            <p class="login-text" style="font-size: 1rem; font-weight: 800;">Data baru untuk anime yang dipilih</p>
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
                $judul = $_POST['judul'];
                $gambar = $_FILES['gambar']['name'];
                $temp = $_FILES['gambar']['tmp_name'];
                    if(move_uploaded_file($temp, '../gambar/'.$section.'/' .$temps)){
                        $query = mysqli_query($conn, "UPDATE `$section` SET `id`='$id',`judul`='$judul',`gambar`='$temps' WHERE id = $id");
                        if($query){
                            echo "<script>alert('berhasil mengubah data');document.location.href = '.';</script>";
                        }
                        else{
                            echo error_log($query);
                        }
                    }
                    else{
                        echo "<script>alert('terdapat kesalahan ketika mengubah data');document.location.href = '.';</script>";
                    }
            }
        ?> 
        <br><center>Tidak jadi mengubah data? <a href="edit.php">Kembali</a> </center>
        </form>
    </div>
</body>
</html>