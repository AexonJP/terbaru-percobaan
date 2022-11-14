<?php 
session_start();
if ($_SESSION['priv'] != 'admin') {
    header("Location: ../");
    
}
$juduls = $_POST["judul"];
if($juduls == NULL){
    header("Location: edit.php");
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
 
    <link rel="stylesheet" type="text/css" href="edit.css">
 
    <title>Login</title>
</head>
<body>
        <p style = 'font-size:20px; color :black'>Tidak jadi melakukan pengeditan data?<a href="./">kembali</a></p>
        <form action="cari.php" method="POST" class="form">
            <input type="text" id="judul" placeholder="Judul" name="judul" value="" required>
            <button id = "btn" name="gas">Cari</button>
        </form>
        <?php
        $data = array('ongoing', 'completed', 'movie'); 
        for ($i = 0; $i<3;$i++){
            $ok = strtoupper($data[$i]);
            $section = $data[$i];
            echo"<table border ='solid 1px'><th colspan='6'>FILE PADA $ok</th><tr><td style= 'width :20px'>No</td><td style = 'width: 1800px'>Judul</td><td style = 'width: 200px'>Nama File</td><td style = 'width: 120px'>Waktu di tambahkan</td><td colspan= '2' style = 'width: 10px'>operator</td></tr>";
                $datas = mysqli_query($conn, "SELECT * FROM `$section` WHERE `judul` LIKE '%$juduls%'");
                $no =1;
                 
                while ($row = mysqli_fetch_assoc($datas)) :
                    $judul = $row['judul'];
                    $id = $row['id'];
                    $gambar = $row['gambar'];
                    $waktu = $row['waktu'];
                    echo "<tr><td style = 'text-align : center'>$no</td> <td style = 'text-align : center'>$judul</td> <td style = 'text-align : center'>$gambar</td> <td style = 'text-align : center'>$waktu</td><td style = 'text-align : center'><a href ='ubah.php?id=$id&section=$section'>Ubah</a></td> <td style = 'text-align : center'><a href ='hapus.php?id=$id&section=$section&gambar=$gambar'>Hapus</a></td></tr>";
                    $no++;
            endwhile;
            echo"</table>";
        }
        ?>
</body>
</html>