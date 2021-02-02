<?php
if (isset($_POST['pass']) && isset($_POST['email'])) {
    $password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');
    if(isset($_POST['login'])){

        $sqlSelect ="SELECT * FROM `konto`
                    WHERE `email` = '$email' AND `password` = '$password'";
        $records = mysqli_query($db, $sqlSelect);

       // $sqlSelectAdres = "SELECT * FROM `adres` WHERE idAdres ='$_SESSION[idAdres]'";
       // $recordsAdres = mysqli_query($db, $sqlSelectAdres);

        if(mysqli_num_rows($records)==1){
            
            $field = mysqli_fetch_array($records);
            $_SESSION['idKont']=$field['idKont'];
            $_SESSION['password']=$field['password'];
            $_SESSION['email']=$field['email'];
            $_SESSION['imie']=$field['imie'];
            $_SESSION['nazwisko']=$field['nazwisko'];
            $_SESSION['telefon']=$field['telefon'];
            $_SESSION['adres'] = $field['adres'];

           /* $field1 = mysqli_fetch_array($recordsAdres);
            $_SESSION['idAdres'] = $field1['idAdres'];
            $_SESSION['kraj'] = $field1['kraj'];
            $_SESSION['miasto'] = $field1['miasto'];
            $_SESSION['ulica'] = $field1['ulica'];
            $_SESSION['kodPoczt'] = $field1['kodPoczt'];
            $_SESSION['nrDomu'] = $field1['nrDomu'];*/

             header('Location: http://localhost/Shop/konto.php');
            $_SESSION['last_login_timestamp'] = time();
        }else{
           
        echo "No such user found";

        }
    }