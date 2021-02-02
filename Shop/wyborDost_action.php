<?php
if (isset($_POST['dostawa'])) {
    $dostawa = filter_var(trim($_POST['dostawa']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');


if (isset($_POST['submit'])) {
    $error = 0;

    if ($error == 0) {

        $dostawa = "INSERT INTO `dostawa`(`typDost`) VALUES ('$dostawa')";
        mysqli_query($db, $dostawa);
        $lastIdDost = mysqli_insert_id($db);  
        $sqlSelectDost = "SELECT * FROM dostawa WHERE idDost ='$lastIdDost'";
        $recordsDost = mysqli_query($db, $sqlSelectDost);

        if (mysqli_num_rows($recordsDost) == 1) {
            $field = mysqli_fetch_array($records);
            $_SESSION['idDost'] = $field['idDost'];
            $_SESSION['typDost'] = $field['dostawa'];
            
            header('Location: http://localhost/Shop/ePlatnosc.php');
        } else {
            echo "Not success.Try again";
        }
    }
}
