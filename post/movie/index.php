<?php session_start();
    require "../database.php";
    if(isset($_GET['orderby'])){
        $bruh = $_GET['orderby'];
    }
    else{
        $bruh =  "DESC";
    }
    if(isset($_GET['by'])){
        $bruhs = $_GET['by'];
    }
    else{
        $bruhs =  "id";
    }
    $belum = "javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut')";
    $ongoing = mysqli_query($conn, "SELECT * FROM movie ORDER BY $bruhs $bruh;");
    $ongoings = mysqli_query($conn, "SELECT `judul` FROM movie ORDER BY $bruhs $bruh;");
 ?>

<!DOCTYPE HTML>
<HTML lang="en">
    <head >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Anime AexonJP</title>
        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
        <link rel="stylesheet" href="cssabdullah.css">
        <?php
            if (!isset($_SESSION['username'])) {
                $_SESSION['priv'] ='default';
            }
        ?>
    </head>
    <body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' ondragstart='return false' onselectstart='return false' style='-moz-user-select: none; cursor: default;' class="body">
        <a class="gif" href="#menu"><img src= "../menhera.gif"></a> 
        <header class="menu" id="menu">
            <ul>
                <?php if($_SESSION['priv'] == 'admin'){
                    echo("<a href=");
                    echo('"');
                    echo("javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut');");echo('"');
                    echo(">Home</a><a href=");echo('"');
                    echo("javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut');");echo('"');
                    echo(">Daftar Anime</a><a href=");echo('"');
                    echo("javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut');");echo('"');
                    echo(">Movie</a><a href=");echo('"');
                    echo("javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut');");echo('"');
                    echo(">Ongoing</a>");
                    echo("<a href='../database'>Database</a>");
                }
                elseif ($_SESSION['priv'] == 'user'){
                    echo("<a href='../request'>Request</a>");
                }
                ?>
                <a href='about/'>About Me</a>
                <?php
                if (isset($_SESSION['username'])) {
                    echo("<a class='login' href='../login/logout.php'>Logout</a>");
                    
                } else {
                    echo("<a class='login' href='../login/'>Login</a>");}
                    ?>
            </ul>
        </header>
        
        <header class="border">
            <a href="../">
            <img src="../awal/oie_OyXVH1TPqSMu.png" alt="gambar"> 
            </a>
        </header>
        <?php
                    if ($_SESSION['priv'] == 'user') {
                        echo("<div class='masuk'>SELAMAT DATANG MEMBER KU TERSAYANG</div>");
                    }
                    elseif ($_SESSION['priv'] == 'admin'){
                        echo("<div class='masuk'>SELAMAT DATANG WAHAI SEPUH TERTINGGI</div>");
                    }
                    ?>
        <table border="0" width="90%" align="center">
            <tr>
                <td><?php $is =0; while ($row = mysqli_fetch_assoc($ongoings)) : if($is ==0||$is%3 ==0):?>
                    <div class="content-ongoings">
                        <?php $i =0; while ($row = mysqli_fetch_assoc($ongoing)){
                        echo('<div class="content-ongoing"><a href="');
                        echo($belum);
                        echo('"><img src="../gambar/movie/');
                        echo($row["gambar"]);
                        echo('" alt="gambar"> <div class="isi">');
                        echo($row["judul"]);
                        echo('</div></a></div>'); $i++; if ($i > 2){ break;}}?>
                    </div><?php endif; $is++;endwhile;?>
                </td>
            </tr>

        </table>
        
    </body>
</HTML>
