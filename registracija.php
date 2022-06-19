<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projekt_pwa.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="register.js"></script>
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
            <form name="register" action="" method="post" onsubmit="return validate()">
                <label for="korisnicko_ime">Unesite korisnicko ime:</label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime"><br>
                <span id="poruka_korisnicko_ime" class="error"></span><br>
                <label for="ime">Upisite svoje ime:</label>
                <input type="text" name="ime" id="ime"><br>
                <span id="poruka_ime" class="error"></span><br>
                <label for="prezime">Unesite svoje prezime:</label>
                <input type="text" name="prezime" id="prezime"><br>
                <span id="poruka_prezime" class="error"></span><br>
                <label for="lozinka">Unesite lozinku:</label>
                <input type="password" name="lozinka" id="lozinka"><br>
                <label for="ponLozinka">Ponovite lozinku:</label>
                <input type="password" name="ponLozinka" id="ponLozinka"><br>
                <span id="poruka_lozinka" class="error"></span><br>
                <input type="submit" name="submit" value="Pošalji">
            </form>
        </div>

        <?php

        

            include 'connect.php';

            if(isset($_POST['submit'])){
                $korisnicko_ime = $_POST['korisnicko_ime'];
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $lozinka = $_POST['lozinka'];
                $ponLozinka = $_POST['ponLozinka'];
                $razina = 0;
                $registriraniKorisnik = '';

                $hashed_lozinka = password_hash($lozinka, CRYPT_BLOWFISH);
                $query = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime=?";

                $stmt = mysqli_stmt_init($dbc);

                if(mysqli_stmt_prepare($stmt, $query)){
                    mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                if(mysqli_stmt_num_rows($stmt) > 0){
                    echo 'Korisnicko ime vec postoji';
                }else{
                    $query = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                    if(mysqli_stmt_prepare($stmt, $query)){
                        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $korisnicko_ime, $hashed_lozinka, $razina);
                        mysqli_stmt_execute($stmt);
                        $registriraniKorisnik = true;
                    }
                    if($registriraniKorisnik == true){
                        echo 'Korisnik je uspjeno registriran';
                        header('location:index.php');
                    }
                }
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


