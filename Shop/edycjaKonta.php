<?php
session_start();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edycja danych kontaktowych</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/zaloguj.css" />
    <link rel="stylesheet" href="styles/edycjaDan.css" />
</head>

<body>
    <?php 
    require_once("header.php");
    require_once("edycjaKonta_action.php");
    ?>
    <h2 id="konto">Moje konto</h2>
    <div class="zaloguj" style="width: 30%; float:left;"><a href = "wyloguj.php">Wyloguj sie</a></div>
    <div class="dane">
        <p id="dane">Moje dane</p>
        <p id="pola_ob">pola zaznaczone * sa obowiazkowe</p>

        <form action="edycjaKonta.php" method="post">

            <div class="first">
                <label>Imie*: </label><br>
                <input type="text" name="imie" required 
                value="<?php if(isset( $_SESSION['imie'] )){echo $_SESSION['imie'];}else{echo '';} ;?>" /><br><br>
            </div>

            <div class="second">
                <label>Nazwisko*: </label><br>
                <input type="text" name="nazwisko" required 
                value="<?php if(isset( $_SESSION['nazwisko'] )){echo $_SESSION['nazwisko'];}else{echo '';};?>"/><br><br>
            </div>

            <div class="first">
                <label>Telefon*: </label><br>
                <input type="text" name="telefon" 
                 value="<?php if(isset( $_SESSION['telefon'] )){echo $_SESSION['telefon'];}else{echo '';};?>"/><br>
                <b style="color: red">
                    <?php if(isset($exist2)){  echo $exist2; } ?>
                </b><br>
            </div>

            <div class="second">
                <label>Email*: </label><br>
                <input type="email" name="email" required 
                value="<?php if(isset( $_SESSION['email'] )){echo $_SESSION['email'];}else{echo '';};?>" /><br><br>
            </div>

            <div class="third">
                <label>Data urodzenia: </label><br>
                <input type="email" name="dataUr" 
                value="<?php if(isset( $_SESSION['dataUr'] )){echo $_SESSION['dataUr'];}else{echo '';} ;?>"/><br><br>
            </div>

            <input id="button" type="submit" name="update" value="Zatwierdz" style="margin-left: 150px"> </button>
        </form>
    </div>
</body>

</html>