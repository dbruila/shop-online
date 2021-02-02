<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Konto klienta</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/zaloguj.css" />
    <link rel="stylesheet" href="styles/edycjaDan.css" />
    <style>

    </style>
  </head>
  <body>
    <?php require_once("header.php");?>
    <h2 id="konto">Moje konto</h2>
    <div class="zaloguj" style="width: 30%; float:left;"><a href = "edycjaKonta.php">Edytuj swoje dane</a></div><br><br><br> 
    <div class="zaloguj" style="width: 30%; float:left;"><a href = "edycjaAdresa.php">Edytuj swoj adres</a></div><br><br><br>
    <div class="zaloguj" style="width: 30%; float:left;"><a href = "wyloguj.php">Wyloguj sie</a></div>  
    
    <div class="dane">
        <p id="dane" style="margin-top: -100px; margin-left: 0px;">Moje dane</p>

        <?php
        if(isset($_SESSION['idKont'])){
        ?>
           
            <div class="first" >
                <p>Imie: <?php if(isset( $_SESSION['imie'] )){echo $_SESSION['imie'];}else{echo '';} ;?></p>
          
                <p>Nazwisko: <?php if(isset( $_SESSION['nazwisko'] )){echo $_SESSION['nazwisko'];}else{echo '';};?></p>
            
                <p>Telefon: <?php if(isset( $_SESSION['telefon'] )){echo $_SESSION['telefon'];}else{echo '';};?></p>
             
                <p>Email: <?php if(isset( $_SESSION['email'] )){echo $_SESSION['email'];}else{echo '';};?></p>
                
            </div>

            <p id="dane" style="margin-top: -48px; margin-left: 315px;">Moj adres</p>
            
            <div class="second">
                <p>Kraj: <?php if(isset( $_SESSION['kraj'] )){echo $_SESSION['kraj'];}else{echo '';} ;?></p>

                <p>Miasto: <?php if(isset( $_SESSION['miasto'] )){echo $_SESSION['miasto'];}else{echo '';} ;?></p>
               
                <p>Kod pocztowy: <?php if(isset( $_SESSION['kodPoczt'] )){echo $_SESSION['kodPoczt'];}else{echo '';} ;?></p>
               
                <p>Ulica: <?php if(isset( $_SESSION['ulica'] )){echo $_SESSION['ulica'];}else{echo '';} ;?></p>
               
                <p>Nr domu/mieszkania: <?php if(isset( $_SESSION['nrDomu'] )){echo $_SESSION['nrDomu'];}else{echo '';} ;?></p>   
            </div>

        <?php
        }else{
          header('Location: http://localhost/Shop/logowanie.php');
        }
        ?>
    </div>
  </body>
</html>