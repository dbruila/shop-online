<?php
if (isset($_POST['nrKarty']) && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['cvv'])) {
    $imie = filter_var(trim($_POST['imie']), FILTER_SANITIZE_STRING);
    $nazwisko = filter_var(trim($_POST['nazwisko']), FILTER_SANITIZE_STRING);
    $nrKarty = filter_var(trim($_POST['nrKarty']), FILTER_SANITIZE_STRING);
    $cvv = filter_var(trim($_POST['cvv']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');


if (isset($_POST['submit'])) {
    $error = 0;

    if (strlen($_POST['nazwisko']) < 3) {
        $nazwiskoLen = 'Wpisz nazwisko<br>';
        $error = 1;
    }
     if (strlen($_POST['imie']) < 3) {
        $imieLen = 'Wpisz imie<br>';
        $error = 1;
    }

    if (strlen($_POST['cvv']) != 3) {
        $cvvLen = 'Kod CVV musi byc trzycyfrowy<br>';
        $error = 1;
    }
     
    if (!preg_match(
        "/^[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$/",
        $nrKarty
    )) {
        $exist2 = "Niepoprawny numer karty. Poprawny musi byc takiego formatu
                  1111 1111 5555 5555";
        $error = 1;
    }

    if ($error == 0) {

        $PlatnInsert = "INSERT INTO `eplatnosc`(`nrKarty`, `imie`, `nazwisko`, `cvv`) VALUES ('$nrKarty', '$imie','$nazwisko','$cvv')";
        mysqli_query($db, $PlatnInsert);
        $lastIdPlatn = mysqli_insert_id($db);  
        $sqlSelectPlatn = "SELECT * FROM eplatnosc WHERE idPlatn ='$lastIdPlatn'";
        $recordsPlatn = mysqli_query($db, $sqlSelectPlatn);


        if (mysqli_num_rows($recordsPlatn) == 1) {
            $field1 = mysqli_fetch_array($recordsPlatn);
            $_SESSION['idPlatn'] = $field1['idPlatn'];
            $_SESSION['nrKarty'] = $field1['nrKarty'];
            $_SESSION['imie'] = $field1['imie'];
            $_SESSION['nazwisko'] = $field1['nazwisko'];
            $_SESSION['cvv'] = $field1['cvv'];

            header('Location: http://localhost/Shop/konto.php');
        } else {
            echo "Not success.Try again";
        }
    }
}
