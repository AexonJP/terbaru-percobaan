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
 
    <link rel="stylesheet" type="text/css" href="edit.css">
 
    <title>Login</title>
</head>
<body>
        <p style = 'font-size:20px; color :black'>Tidak jadi melakukan pengeditan data?<a href="../">kembali</a></p>
        <form action="cari.php" method="POST" class="form">
            <input type="text" id="judul" placeholder="Judul" name="judul" value="" required>
            <button id = "btn" name="gas">Cari</button>
        </form>
        <?php
            echo"<table border ='solid 1px'><th colspan='6'>FILE YANG DI REQUEST MEMBER</th><tr><td style= 'width :20px'>No</td><td style = 'width: 1800px'>Judul anime</td><td style= 'width:800px'>genre</td><td style = 'width: 200px'>Episode</td><td style = 'width: 120px'>rating</td><td style = 'width: 10px'>operator</td></tr>";
                $datas = mysqli_query($conn, "SELECT * FROM request");
                $no =1;
                 
                while ($row = mysqli_fetch_assoc($datas)) :
                    $judul = $row['judul'];
                    $id = $row['id'];
                    $episode = $row['episode'];
                    $rating = $row['rating'];
                    $genre = $row['genre'];
                    echo "<tr><td style = 'text-align : center'>$no</td> <td style = 'text-align : center'>$judul</td> <td style = 'text-align : center'>$episode</td> <td style = 'text-align : center'>$rating</td><td style = 'text-align : center'>$genre</td> <td style = 'text-align : center'><a href ='hapus.php?id=$id'>Hapus</a></td></tr>";
                    $no++;
            endwhile;
            echo"</table>";
        ?>
</body>
</html>