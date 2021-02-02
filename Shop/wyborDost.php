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
    require_once("wyborDost_action.php");?>
    <h2 id="konto">Dane dostawy</h2>
    <div>

        <form action="wyborDost.php" method="post" style="margin-left: 42%;">

        <input type="radio" name="dostawa" value="paczkomat" />Wysylka do paczkomatu 1-3 dni<br>
        <input type="radio" name="dostawa" value="zabka" />Odbiur w punkcie zabka 1-3 dni<br>
        <input type="radio" name="dostawa" value="kurier" checked/>Dostawa kurierem 2 dni<br><br>

        <input id="button" type="submit" name="submit" value="Zatwierdz" style="margin-left: 50px; width: 100px"> </button>
        </form>
    </div>
</body>

</html>