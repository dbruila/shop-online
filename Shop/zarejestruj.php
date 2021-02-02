<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Strona rejestracji</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/logowanie.css" />

  </head>

  <body>
    <?php require_once("header.php"); 
    require_once("zarejestruj_action.php");?>
    <h2 id="o">Zarejestruj sie</h2>
    <div class="o">
      <form
        action=""
        method="post"
        class="on"
        id="registerBox"
      >
        <div class="first">
          <label>Email*</label><br />
          <input
            type="email"
            name="email"
            required
            value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>"
            placeholder="Wprowadz e-mail"
          /><br /><b style="color: red">
            <?php if(isset($exist)){  echo $exist; } ?> </b
          ><br />
        </div>

        <div class="second">
          <label>Password*</label><br />
          <input
            type="password"
            name="pass"
            required
            placeholder="Wprowadz password"
          /><br /><b style="color: red">
            <?php if(isset($exist1)){  echo $exist1; } ?>
            <?php if(isset($passLen)){  echo $passLen; } ?> </b
          ><br />
        </div>

        <div class="first">
          <label>Imie*</label><br />
          <input
            type="text"
            name="imie"
            required
            value="<?php if(isset($_POST['imie'])){ echo $_POST['imie'];}?>"
            placeholder="Wprowadz imie"
          /><br /><br />
        </div>

        <div class="second">
          <label>Password confirmation*</label><br />
          <input
            type="password"
            name="cpass"
            required
            placeholder="Powtorz password"
          /><br /><b style="color: red">
            <?php if(isset($mispass)){  echo $mispass; } ?> </b
          ><br />
        </div>

        <div class="first">
          <label>Nazwisko*</label><br />
          <input
            type="text"
            name="nazwisko"
            required
            value="<?php if(isset($_POST['nazwisko'])){ echo $_POST['nazwisko'];}?>"
            placeholder="Wprowadz nazwisko"
          /><br /><br />
        </div>

        <div class="second">
          <label>Telefon*</label><br />
          <input
            type="text"
            name="telefon"
            value="<?php if(isset($_POST['telefon'])){ echo $_POST['telefon'];}?>"
            placeholder="Wprowadz numer telefonu"
          /><br /><b style="color: red">
            <?php if(isset($exist2)){  echo $exist2; } ?> </b
          ><br />
        </div>

        <div class="first">
                <label>kraj*</label><br />
                <input type="text" name="kraj" placeholder="Wpisz kraj" /><br /><b style="color: red">
            <?php if(isset($krajLen)){  echo $krajLen; } ?> </b
          ><br />
            </div>

        <div class="second">
                <label>Miasto*</label><br />
                <input type="text" name="miasto" placeholder="Wpisz miasto" /><br /><b style="color: red">
            <?php if(isset($miastoLen)){  echo $miastoLen; } ?> </b
          ><br />
            </div>

            <div class="first">
                <label>Kod pocztowy: </label><br>
                <input type="text" name="kodPoczt" placeholder="Wpisz kod pocztowy" /><br /><br />
            </div>

            <div class="second">
                <label>Ulica*: </label><br>
                <input type="text" name="ulica"  placeholder="Wpisz ulice" /><br /><b style="color: red">
            <?php if(isset($ulicaLen)){  echo $ulicaLen; } ?> </b
          ><br />
            </div>

            <div class="first" style="width: 70%;">
                <label>Nr domu/mieszkania*: </label><br>
                <input type="text" name="nrDomu"  placeholder="Wpisz numer domu/mieszkania" /><br /><b style="color: red">
            <?php if(isset($nrDomuLen)){  echo $nrDomuLen; } ?> </b
          ><br />
            </div>

        <input
          id="button"
          type="submit"
          name="sub"
          value="Zarejestruj sie"
          style="margin-left: 240px"
        /><br><br>
      </form>
    </div>
  </body>
</html>
