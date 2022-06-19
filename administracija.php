<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projekt_pwa.css">
    <title>Document</title>
</head>
<body>



<header>
        <div class="wrapper">
        <nav>
            <ul>
                <li><img src="Slike/bbc.png" alt=""></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="kategorija.php?id=News">News</a></li>
                <li><a href="kategorija.php?id=Sport">Sport</a></li>
                <li><a href="unos.html">Unos</a></li>
                <li><a href="administracija.php">Administracija</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
        </div>
    </header>

    <main>
        
        <?php

            session_start();

            include 'connect.php';
            define ('PATH', 'Slike/');

            $query = "SELECT * FROM vijesti";
            $result = mysqli_query($dbc, $query);

            echo '<h1 class="wrapper">Dobrodosao '.$_SESSION['$username'].'</h1><br><hr>';

            while($row = mysqli_fetch_array($result)){


                echo '<div class="wrapper">';
                echo '<h3>Clanak '.$row['id'].'</h3>';
                echo 
                '<form name="forma_vijesti" action="" method="get" enctype="multipart/form-data">  
                    <label for="naslov">Unesite naslov vijesti</label>
                    <input type="text" name="naslov" id="naslov" value="'.$row['naslov'].'"><br>
                    <label for="sazetak">Unesite kratki sazetak</label><br>
                    <textarea name="sazetak" id="sazetak" cols="30" rows="10" value="">'.$row['sazetak'].'</textarea><br>
                    <label for="tekst">Unesite tekst clanka</label><br>
                    <textarea name="tekst" id="tekst" cols="30" rows="10">'.$row['tekst'].'</textarea><br>
                    <label for="kategorija">Odaberite kategoriju</label>
                    <select name="kategorija" id="kategorija">';
                    if($row['kategorija'] == "Sport"){
                        echo 
                        '<option value="Sport" selected>Sport</option>
                        <option value="News">News</option>';
                    }else{
                        echo 
                        '<option value="Sport">Sport</option>
                        <option value="News" selected>News</option>';
                    }
                    echo'
                    </select>
                    <br>
                    <label>Odaberite sliku</label>
                    <input type="file" name="slika"><br>
                    <img src="'.PATH.$row['slika'].'" width=100px><br>
                    <label for="arhiva">Zelite li arhivirati vijest</label> ';
                    if($row['arhiva'] == 0){
                        echo '<input type="checkbox" name="arhiva" id="arhiva"><br>';
                    }else{
                        echo '<input type="checkbox" name="arhiva" id="arhiva" checked><br>';
                    }
                    echo 
                    '<input type="hidden" name="id" value="'.$row['id'].'">
                    <input type="submit" name="update" value="Izmijeni">
                    <input type="submit" name="delete" value="Izbrisi">
                    </form>';
                echo '</div>';
                echo '<hr>';
            }

        
                
                
            $naslov = $_GET['naslov'];
            $sazetak = $_GET['sazetak'];
            $tekst = $_GET['tekst'];
            $kategorija = $_GET['kategorija'];
            $slika = $_GET['slika'];
            $date = date('d.m.Y');
            
            if (isset($_GET['arhiva'])){
                $arhiva = 1;
            }else{
                $arhiva = 0;
            }
            $id = $_GET['id'];


            if(isset($_GET['update'])){
                if($_GET['slika'] == ""){
                    $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', kategorija='$kategorija', datum='$date', arhiva='$arhiva', autor='".$_SESSION['$username']."' WHERE id='$id'";
                }else{
                    $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', kategorija='$kategorija', slika='$slika', datum='$date', arhiva='$arhiva', autor='admin' WHERE id='$id'";
                }
                $result = mysqli_query($dbc, $query);
            }

            if(isset($_GET['delete'])){
                $query = "DELETE FROM vijesti WHERE id=$id";
                $result = mysqli_query($dbc, $query);
            }
            

            mysqli_close($dbc);
        ?>

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


