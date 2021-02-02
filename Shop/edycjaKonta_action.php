<?php
if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['email']) && isset($_POST['telefon'])) {
    $imie = filter_var(trim($_POST['imie']), FILTER_SANITIZE_STRING);
    $nazwisko = filter_var(trim($_POST['nazwisko']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $telefon = filter_var(trim($_POST['telefon']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');

if (isset($_POST['update'])) {
    $error = 0;

    if (!preg_match(
        "/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/",
        $telefon
    )) {
        $exist2 = "Invalid phone number.A valid phone number must be in the form
                  (555) 555-5555";
        $error = 1;
    }

    if ($error == 0) {

        $userUpdate = "UPDATE `konto` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `email` = '$email', `telefon` = '$telefon'
        WHERE `idKont` = '$_SESSION[idKont]'";

        mysqli_query($db, $userUpdate);
        $lastId = mysqli_insert_id($db);

        $sqlSelect = "SELECT * FROM konto WHERE idKont ='$_SESSION[idKont]'";
        $records = mysqli_query($db, $sqlSelect);

        if (mysqli_num_rows($records) == 1) {
            $field = mysqli_fetch_array($records);
            $_SESSION['idKont'] = $field['idKont'];
            $_SESSION['email'] = $field['email'];
            $_SESSION['imie'] = $field['imie'];
            $_SESSION['nazwisko'] = $field['nazwisko'];
            $_SESSION['telefon'] = $field['telefon'];
            
            header('Location: http://localhost/Shop/konto.php');
        } else {
            echo "Not success.Try again";
        }
    }
}
