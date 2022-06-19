<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="projekt_pwa.css">
</head>
<body>
    <?php
        session_start();

        include 'connect.php';
        
        if (isset($_POST['submit'])){
            $naslov = $_POST['naslov'];
            $sazetak = $_POST['sazetak'];
            $tekst = $_POST['tekst'];
            $kategorija = $_POST['kategorija'];
            $slika = $_FILES['slika']['name'];
            $date = date('d.m.Y');
            if (isset($_POST['arhiva'])){
                $arhiva = 1;
            }else{
                $arhiva = 0;
            }
        }

        $target_dir = 'Slike/'.$slika;
        move_uploaded_file($_FILES['slika']['tmp_name'], $target_dir);

        $query = "INSERT INTO vijesti (naslov, sazetak, tekst, slika, kategorija, datum, arhiva, autor) VALUES ('$naslov', '$sazetak', '$tekst', '$slika', '$kategorija', '$date', '$arhiva', '".$_SESSION['$username']."')";

        $result = mysqli_query($dbc, $query) or die('Error querying database');

        mysqli_close($dbc);
    ?>

    
    <header>
        <div class="wrapper">
        <nav>
            <ul>
                <li><img src="Slike/bbc.png" alt=""></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="kategorija.php?id=News">News</a></li>
                <li><a href="kategorija.php?id=Sport">Sport</a></li>
                <li><a href="unos.html">Unos</a></li>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <main>
        <div class="sport">
            <div class="wrapper_sport">
                <h1><?php echo $kategorija;?></h1>
            </div>  
        </div>
        <div class="wrapper_sport">
            <h2><?php echo $naslov;?></h2>
            <section>
                <article>
                    <?php echo "<img src='Slike/$slika'>";?>
                    <p><?php echo $sazetak;?></p>
                </article>
            </section>
        </div>
    </main>

    <footer>
        <div class="wrapper">
            <br><br><hr><br>
            <div>
                <p>Copyright © 2022 BBC, The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
            </div>
        </div>
    </footer>
</body>
</html>