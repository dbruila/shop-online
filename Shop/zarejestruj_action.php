<?php
if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['telefon']) && 
isset($_POST['miasto']) && isset($_POST['ulica']) && isset($_POST['kodPoczt']) && isset($_POST['nrDomu']) && isset($_POST['kraj'])) {
    $imie = filter_var(trim($_POST['imie']), FILTER_SANITIZE_STRING);
    $nazwisko = filter_var(trim($_POST['nazwisko']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $telefon = filter_var(trim($_POST['telefon']), FILTER_SANITIZE_STRING);
    $miasto = filter_var(trim($_POST['miasto']), FILTER_SANITIZE_STRING);
    $ulica = filter_var(trim($_POST['ulica']), FILTER_SANITIZE_STRING);
    $kodPoczt = filter_var(trim($_POST['kodPoczt']), FILTER_SANITIZE_STRING);
    $nrDomu = filter_var(trim($_POST['nrDomu']), FILTER_SANITIZE_STRING);
    $kraj = filter_var(trim($_POST['kraj']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');


if (isset($_POST['sub'])) {
    $error = 0;

    if ($_POST['pass'] != $_POST['cpass']) {
        $mispass = 'Password and Confirm-Password sa rozne<br>';
        $error = 1;
    }

    if (strlen($_POST['pass']) < 6) {
        $passLen = 'Passwordmusi byc wiekszy niz 5 cyfr<br>';
        $error = 1;
    }

    $sqlCheck = "SELECT * FROM konto WHERE email = '$email'";
    $rscheck = mysqli_query($db, $sqlCheck);

    if (mysqli_num_rows($rscheck) > 0) {
        $exist = "Ten email juz istnieje. Sprobuj inny lub <a href='logowanie.php'>Zaloguj sie</a>";
        $error = 1;
    }

    $sqlCheck1 = "SELECT * FROM konto WHERE password = '$password'";
    $rscheck1 = mysqli_query($db, $sqlCheck1);

    if (mysqli_num_rows($rscheck1) > 0) {
        $exist1 = "Taki password juz istnieje. Sprobuj inny";
        $error = 1;
    }
    if (strlen($_POST['kraj']) < 3) {
        $krajLen = 'Wpisz kraj<br>';
        $error = 1;
    }
    if (strlen($_POST['miasto']) < 3) {
        $miastoLen = 'Wpisz miasto<br>';
        $error = 1;
    }
     if (strlen($_POST['ulica']) < 3) {
        $ulicaLen = 'Wpisz ulice<br>';
        $error = 1;
    }
     if (strlen($_POST['nrDomu']) < 1) {
        $nrDomuLen = 'Wpisz numer domu<br>';
        $error = 1;
    }

    if (!preg_match(
        "/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/",
        $telefon
    )) {
        $exist2 = "Niepoprawny numer. Poprawny musi byc takiego formatu
                  (555) 555-5555";
        $error = 1;
    }

    if ($error == 0) {

        $userInsertAdres = "INSERT INTO `adres`(`kraj`, `miasto`, `kodPoczt`, `ulica`, `nrDomu`) VALUES ('$kraj', '$miasto','$kodPoczt','$ulica','$nrDomu')";
        mysqli_query($db, $userInsertAdres);
        $lastIdAdress = mysqli_insert_id($db);  
        $sqlSelectAdres = "SELECT * FROM adres WHERE idAdres ='$lastIdAdress'";
        $recordsAdres = mysqli_query($db, $sqlSelectAdres);

        $userInsertIdAd = "INSERT INTO `konto`(`imie`, `nazwisko`, `email`, `password`, `telefon`,`adres`) VALUES ('$imie','$nazwisko','$email','$password', '$telefon','$lastIdAdress')" ;
        mysqli_query($db, $userInsertIdAd);
        $lastId = mysqli_insert_id($db);
        $sqlSelect = "SELECT * FROM konto WHERE idKont ='$lastId'";
        $records = mysqli_query($db, $sqlSelect);

        if (mysqli_num_rows($records) == 1 && mysqli_num_rows($recordsAdres) == 1) {
            $field = mysqli_fetch_array($records);
            $_SESSION['idKont'] = $field['idKont'];
            $_SESSION['password'] = $field['password'];
            $_SESSION['email'] = $field['email'];
            $_SESSION['imie'] = $field['imie'];
            $_SESSION['nazwisko'] = $field['nazwisko'];
            $_SESSION['telefon'] = $field['telefon'];
            $_SESSION['adres'] = $field['adres'];

            $field1 = mysqli_fetch_array($recordsAdres);
            $_SESSION['idAdres'] = $field1['idAdres'];
            $_SESSION['kraj'] = $field1['kraj'];
            $_SESSION['miasto'] = $field1['miasto'];
            $_SESSION['ulica'] = $field1['ulica'];
            $_SESSION['kodPoczt'] = $field1['kodPoczt'];
            $_SESSION['nrDomu'] = $field1['nrDomu'];

            header('Location: http://localhost/Shop/konto.php');
        } else {
            echo "Not success.Try again";
        }
    }
}
