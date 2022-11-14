<?php session_start();
    require "database.php";
    $belum = "javascript:alert('fitur tersebut belum tersdia mohon menunggu update lebih lanjut')";
    $ongoing = mysqli_query($conn, "SELECT * FROM ongoing ORDER BY id DESC;");
    $movie = mysqli_query($conn, "SELECT * FROM movie ORDER BY id DESC;");
    $completed = mysqli_query($conn, "SELECT * FROM completed ORDER BY id DESC;");
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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
            if (!isset($_SESSION['username'])) {
                $_SESSION['priv'] ='default';
            }
        ?>
    </head>
    <body class="body">
        <a class="gif" href="#menu"><img src= "menhera.gif"></a> 
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
                    echo("<a href='request'>../Request</a>");
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
            <img src="awal/oie_OyXVH1TPqSMu.png" alt="gambar"> 
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
        <form action = "anime" method = "GET">
            <div class="search-box">
                <input class = "search-txt" type="text" name ="cari" placeholder="Cari anime">
                <button type ="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <table border="0" width="90%" align="center">
            <tr>
                <td height="100px">
                    <div class="container-ongoing">
                            <div class="text">ONGOING</div>
                            <div class="more"><a href="ongoing">MORE</a></div>
                    </div>
                    <div class="content-ongoings">
                        <?php $i =0; while ($row = mysqli_fetch_assoc($ongoing)) :?>
                        <div class="content-ongoing"><a href="<?php echo($belum);?>">
                            <img src="gambar/ongoing/<?=$row['gambar']?>" alt="gambar"> <div class="isi"><?=$row["judul"]?></div>
                        </a></div><?php ; $i++; if ($i > 2): break;endif;endwhile;?>
                    </div>
                    <div class="content-ongoings">
                        <?php while ($row = mysqli_fetch_assoc($ongoing)) :?>
                            <div class="content-ongoing"><a href="<?php echo($belum);?>">
                                <img src="gambar/ongoing/<?=$row['gambar']?>" alt="gambar"> <div class="isi"><?=$row["judul"]?></div>
                            </a></div><?php ; $i++; if ($i > 5): break;endif;endwhile;?>
                    </div>
                    <div class="container">
                        <div class="text">COMPLETED</div>
                        <div class="more"><a href="completed">MORE</a></div>
                    </div>
                    <div class="content-ongoings">
                        <?php $i =0; while ($row = mysqli_fetch_assoc($completed)) :?>
                        <div class="content-ongoing"><a href="<?php echo($belum);?>">
                            <img src="gambar/completed/<?=$row['gambar']?>" alt="gambar"> <div class="isi"><?=$row["judul"]?></div>
                        </a></div><?php ; $i++; if ($i > 2): break;endif;endwhile;?>
                    </div>
                    <div class="content-ongoings">
                        <?php while ($row = mysqli_fetch_assoc($completed)) :?>
                        <div class="content-ongoing"><a href="<?php echo($belum);?>">
                            <img src="gambar/completed/<?=$row['gambar']?>" alt="gambar"> <div class="isi"><?=$row["judul"]?></div>
                        </a></div><?php ; $i++; if ($i > 5): break;endif;endwhile;?>
                    </div>
                    <div class="container">
                        <div class="text">MOVIE</div>
                        <div class="more"><a href="movie">MORE</a></div>
                    </div>
                    <div class="content-ongoings">
                        <?php $i =0; while ($row = mysqli_fetch_assoc($movie)) :?>
                        <div class="content-ongoing"><a href="<?php echo($belum);?>">
                            <img src="gambar/movie/<?=$row['gambar']?>" alt="gambar"> <div class="isi"><?=$row["judul"]?></div>
                        </a></div><?php ; $i++; if ($i > 2): break;endif;endwhile;?>
                    </div>
                    <div class="content-ongoings">
                        <?php while ($row = mysqli_fetch_assoc($movie)) :?>
                        <div class="content-ongoing"><a href="<?php echo($belum);?>">
                            <img src="gambar/movie/<?=$row['gambar']?>" alt="gambar"> <div class="isi"><?=$row["judul"]?></div>
                        </a></div><?php ; $i++; if ($i > 5): break;endif;endwhile;?>
                    </div>
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
