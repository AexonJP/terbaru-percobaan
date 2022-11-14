<?php
    session_start();
    
    
    if ($_SESSION['priv'] != 'admin'){
        header('Location: ../');
    }
    $section = '';
    $id ='';
    $section =$_GET['section'];
    $id =$_GET['id'];
    require '../database.php';
    $tempat = mysqli_query($conn, "SELECT * FROM `$section` WHERE id = $id");
    while($row = mysqli_fetch_assoc($tempat)):
        $temps = $row['gambar'];
        unlink("gambar/$section/$temps");
    endwhile;
    if($mulai = mysqli_query($conn, "DELETE FROM `$section` WHERE id = $id")){
        echo "<script>alert('data berhasil di hapus')
        document.location.href = '../database';</script>";
    }
    else{
        echo "<script>alert('data tidak berhasil di hapus')document.location.href = '../database';</script>";
    }
?>
