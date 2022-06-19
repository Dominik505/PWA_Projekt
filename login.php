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
                <li><a href="login.php">Log in</a></li>
            </ul>
        </nav>
        </div>
    </header>

    <main>
        
        <div class="wrapper">
            <form name="register" action="" method="post">
                <label for="korisnicko_ime">Unesite korisnicko ime:</label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime"><br>
                <label for="lozinka">Unesite lozinku:</label>
                <input type="password" name="lozinka" id="lozinka"><br>
                <input type="submit" name="submit" value="Login">
            </form>
            <p>Nemate korisnicki racun? <a href="registracija.php"> Registrirajte se</a></p>
        </div>

        <?php
            session_start();
            
            include 'connect.php';

            if(isset($_POST['submit'])){
                
                $_SESSION['$username'] = $_POST['korisnicko_ime'];
                $_SESSION['$pass'] = $_POST['lozinka'];


                $korisnicko_ime = $_POST['korisnicko_ime'];

                $pass = "SELECT lozinka, razina FROM korisnik WHERE korisnicko_ime='$korisnicko_ime'";
                $result = mysqli_query($dbc, $pass);
                $row = mysqli_fetch_array($result);
                
                if(password_verify($_POST['lozinka'], $row['lozinka'])){
                    if($row['razina'] == 0){
                        echo "Uspjesno ste prijavljeni<br>";
                        echo "Nemate pristup administraciji!";
                    }else{
                        header('location:administracija.php');
                    }
                }else{
                    echo "Pogresna lozinka!";
                }
            }

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


