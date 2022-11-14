<?php session_start();
    require "../database.php";
    $belum = "javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut')";
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
        $bruhs =  "judul";
    }
    $ongoing = mysqli_query($conn, "SELECT * FROM ongoing UNION SELECT * FROM movie UNION SELECT * FROM completed ORDER BY $bruhs $bruh;");
    $ongoings = mysqli_query($conn, "SELECT * FROM ongoing UNION SELECT * FROM movie UNION SELECT * FROM completed ORDER BY $bruhs $bruh;");
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
        <link rel="stylesheet" href="../cssabdullah.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
            if (!isset($_SESSION['username'])) {
                $_SESSION['priv'] ='default';
            }
        ?>
    </head>
    <body class="body">
        <a class="gif" href="#menu"><img src= "../menhera.gif"></a> 
        <header class="menu" id="menu">
            <ul>
                <?php if($_SESSION['priv'] == 'admin'){
                    echo("<a href=");
                    echo('"');
                    echo("../");echo('"');
                    echo(">Home</a><a href=");echo('"');
                    echo("../anime");echo('"');
                    echo(">Daftar Anime</a><a href=");echo('"');
                    echo("../movie");echo('"');
                    echo(">Movie</a><a href=");echo('"');
                    echo("../ongoing");echo('"');
                    echo(">Ongoing</a>");
                    echo("<a href='../animeRequest'>Request member</a>");
                    echo("<a href='../database'>Database</a>");
                }
                elseif ($_SESSION['priv'] == 'user'){
                    echo("<a href='../request'>../Request</a>");
                }
                ?>
                <a href='../about/'>About Me</a>
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
        <center><select class="input-group" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
            <option value="" disabled selected>Sort...</option>
            <option value="?orderby=ASC&by=judul">A-Z</option>
            <option value="?orderby=DESC&by=judul">Z-A</option>
            <option value="?orderby=DESC&by=id">Terbaru</option>
            <option value="?orderby=ASC&by=id">Terlama</option>
        </select></center>
        <table border="0" width="90%" align="center">
            <tr>
                <td><?php $is =0; while ($row = mysqli_fetch_assoc($ongoings)) : if($is ==0||$is%3 ==0):?>
                    <div class="content-ongoings">
                        <?php $i =0; while ($row = mysqli_fetch_assoc($ongoing)){
                        echo('<div class="content-ongoing"><a href="');
                        echo($belum);
                        echo('"><img src="../gambar/');
                        echo($row["section"]);
                        echo('/');
                        echo($row["gambar"]);
                        echo('" alt="gambar"> <div class="isi">');
                        echo($row["judul"]);
                        echo('</div></a></div>'); $i++; if ($i > 2){ break;}}?>
                    </div><?php endif; $is++;endwhile;?>
                </td>
            </tr>

        </table>
        <footer>
            <div class="footer-content">
                <h3>aexon JP</h3>
                <p>Situs Anime terpercaya untuk anda, telah hadir!!!</p>
                <ul class="socials">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>copyright &copy;2022 AexonJP. designed by <span>B2-K1</span></p>
            </div>
        </footer>
    </body>
</HTML>
