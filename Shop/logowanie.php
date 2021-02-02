<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Strona logowania</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/logowanie.css" />
</head>

<body>
    <?php require_once("header.php");
    require_once("logowanie_action.php"); ?>
    <h2 id="t">Zaloguj sie</h2><br>
    <div class="t">
        <form action="" method="post" class="tw">
            <label for="login">Email</label><br>
            <input type="email" name="email" placeholder="Wprowadz e-mail"><br><br>

            <label for="password">Haslo</label><br>
            <input type="password" name="pass" placeholder="Wprowadz password"><br><br>

            <input id="button" type="submit" name="login" value="Zaloguj sie" />

        </form>
    </div>

</body>

</html>