<?php
if (isset($_POST['quantity']) && isset($_POST['hidden_id'])) {
    $quantity = filter_var(trim($_POST['quantity']), FILTER_SANITIZE_STRING);
    $hidden_id = filter_var(trim($_POST['hidden_id']), FILTER_SANITIZE_STRING);
}

$db = mysqli_connect('localhost', 'root', '', 'sklep');


    if (isset($_POST['add_to_cart'])) {
   
        $elemKoszInsert = "INSERT INTO `elementKoszyka`(`idTow`, `iloscTow`) VALUES ('$hidden_id', '$quantity')";
        mysqli_query($db, $elemKoszInsert);
        $lastIdElem = mysqli_insert_id($db);  
        $sqlSelectElem = "SELECT * FROM elementKoszyka WHERE idElemKosz ='$lastIdElem'";
        $recordsElem = mysqli_query($db, $sqlSelectElem);

        if (mysqli_num_rows($recordsElem) == 1) {
            $field = mysqli_fetch_array($recordsElem);
            $_SESSION['idElemKosz'] = $field['idElemKosz'];
            $_SESSION['idTow'] = $field['idTow'];
            $_SESSION['iloscTow'] = $field['iloscTow'];
           
            header('Location: http://localhost/Shop/kosz.php');
        } else {
            echo "Not success.Try again";
        
    }
}
