<?php
if (isset($_POST['kraj']) && isset($_POST['miasto']) && isset($_POST['ulica']) && isset($_POST['kodPoczt']) && isset($_POST['nrDomu'])) {
    $kraj = filter_var(trim($_POST['kraj']), FILTER_SANITIZE_STRING);
    $miasto = filter_var(trim($_POST['miasto']), FILTER_SANITIZE_STRING);
    $ulica = filter_var(trim($_POST['ulica']), FILTER_SANITIZE_STRING);
    $kodPoczt = filter_var(trim($_POST['kodPoczt']), FILTER_SANITIZE_STRING);
    $nrDomu = filter_var(trim($_POST['nrDomu']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');

if (isset($_POST['update'])) {
    $error = 0;

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

    if ($error == 0) {

        $userUpdate = "UPDATE `adres` SET `kraj` = '$kraj', `miasto` = '$miasto', `ulica` = '$ulica', `kodPoczt` = '$kodPoczt', `nrDomu` = '$nrDomu'
        WHERE `idAdres` = '$_SESSION[idAdres]'";

        mysqli_query($db, $userUpdate);

        $lastId = mysqli_insert_id($db);

        $sqlSelect = "SELECT * FROM adres WHERE idAdres ='$_SESSION[idAdres]'";
        $records = mysqli_query($db, $sqlSelect);

        if (mysqli_num_rows($records) == 1) {
            $field = mysqli_fetch_array($records); 
            $_SESSION['kraj'] = $field['kraj'];   
            $_SESSION['miasto'] = $field['miasto'];
            $_SESSION['ulica'] = $field['ulica'];
            $_SESSION['kodPoczt'] = $field['kodPoczt'];
            $_SESSION['nrDomu'] = $field['nrDomu'];
            header('Location: http://localhost/Shop/wyborDost.php');
        } else {
            echo "Not success.Try again";
        }
    }
}
