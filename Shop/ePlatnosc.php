<?php
session_start();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Platnosc</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/zaloguj.css" />
    <link rel="stylesheet" href="styles/edycjaDan.css" />
</head>

<body>
    <?php 
    require_once("header.php");
    require_once("eplatn_action.php");?>
    <h2 id="konto">Platnosc karta</h2>
    <div>

        <form action="ePlatnosc.php" method="post" style="margin-left: 45%;">

            <div>
                <label>Numer karty: </label><br>
                <input type="text" name="nrKarty"/><br>
                <b style="color: red">
            <?php if(isset($exist2)){  echo $exist2; } ?> </b
          ><br>
            </div>
       
            <div >
                <label>Imie: </label><br>
                <input type="text" name="imie"/><br>
                <b style="color: red">
            <?php if(isset($imieLen)){  echo $imieLen; } ?> </b
          ><br>
            </div>

            <div>
                <label>Nazwisko: </label><br>
                <input type="text" name="nazwisko"/><br>
                <b style="color: red">
            <?php if(isset($nazwiskoLen)){  echo $nazwiskoLen; } ?> </b
          ><br>
            </div>

            <div>
                <label>cvv: </label><br>
                <input type="text" name="cvv"/><br>
                <b style="color: red">
            <?php if(isset($cvvLen)){  echo $cvvLen; } ?> </b
          ><br>
            </div>

            <input id="button" type="submit" name="submit" value="Zatwierdz" style="margin-left: 50px; width: 100px"> </button>
        </form>
    </div>
</body>

</html>