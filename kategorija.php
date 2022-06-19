<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projekt_pwa.css">
    <title>BBC</title>
    <style type="text/css">
        a{
            text-decoration:none;
            color:black;
        }
    </style>
</head>
<body>



    <?php

        include 'connect.php';
        define('PATH', 'Slike/');

        $id = $_GET['id'];
        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$id'";

        $result = mysqli_query($dbc, $query);

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
        <div class="wrapper gray">
            <div class="welcome">
                <h4>Welcome to BBC.com</h4>
                <p>Monday, 13 June</p>
            </div>


            <?php
                $row = mysqli_fetch_array($result);

                if($row['kategorija'] == "Sport"){
                    $color = "orange";
                }else{
                    $color = "red";
                }

                echo "<div class='vl' style='border-left: 5px solid ".$color."; height: 25px; padding: 0px 10px;'>
                    <h2>".$row['kategorija']."</h2>
                </div>";
                

                $result = mysqli_query($dbc, $query);

                echo "<section>";
                
                while($row = mysqli_fetch_array($result)){
                    
                    echo "<article>";
                    echo "<img src='".PATH.$row['slika']."'>";
                    echo "<h3><a href='clanak.php?id=".$row['id']."'>".$row['naslov']."</a></h3>";
                    echo "<p>".$row['sazetak']."</p>";
                    echo "</article>";
                    
                }

                echo "</section>";
                
                mysqli_close($dbc);
            ?>
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