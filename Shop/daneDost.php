<?php
session_start();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>dane dostawy</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/zaloguj.css" />
    <link rel="stylesheet" href="styles/edycjaDan.css" />
</head>

<body>
    <?php 
    require_once("header.php");
    require_once("edycjaAdresaWys.php");?>
    <h2 id="konto">Dane dostawy</h2>
    <div>

        <form action="daneDost.php" method="post" style="margin-left: 45%;">

            <div>
                <label>Kraj: </label><br>
                <input type="text" name="kraj" 
                value="<?php if(isset( $_SESSION['kraj'] )){echo $_SESSION['kraj'];}else{echo '';} ;?>"/><br>
                <b style="color: red">
            <?php if(isset($krajLen)){  echo $krajLen; } ?> </b
          ><br>
            </div>
       
            <div >
                <label>Miasto: </label><br>
                <input type="text" name="miasto" 
                value="<?php if(isset( $_SESSION['miasto'] )){echo $_SESSION['miasto'];}else{echo '';} ;?>"/><br>
                <b style="color: red">
            <?php if(isset($miastoLen)){  echo $miastoLen; } ?> </b
          ><br>
            </div>

            <div>
                <label>Kod pocztowy: </label><br>
                <input type="text" name="kodPoczt" 
                value="<?php if(isset( $_SESSION['kodPoczt'] )){echo $_SESSION['kodPoczt'];}else{echo '';} ;?>"/><br><br>
            </div>

            <div>
                <label>Ulica: </label><br>
                <input type="text" name="ulica" 
                 value="<?php if(isset( $_SESSION['ulica'] )){echo $_SESSION['ulica'];}else{echo '';} ;?>"/><br>
                 <b style="color: red">
            <?php if(isset($ulicaLen)){  echo $ulicaLen; } ?> </b
          ><br>
            </div>

            <div>
                <label>Nr domu/mieszkania: </label><br>
                <input type="text" name="nrDomu" 
                 value="<?php if(isset( $_SESSION['nrDomu'] )){echo $_SESSION['nrDomu'];}else{echo '';} ;?>"/><br>
                 <b style="color: red">
            <?php if(isset($nrDomuLen)){  echo $nrDomuLen; } ?> </b
          ><br>
            </div>

            <input id="button" type="submit" name="update" value="Zatwierdz" style="margin-left: 50px; width: 100px"> </button>
        </form>
    </div>
</body>

</html>