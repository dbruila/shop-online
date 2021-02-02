<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'sklep');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Towary dla kobiet</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/zaloguj.css" />
    <link rel="stylesheet" href="styles/tow.css" />
</head>

<body>
    <?php require_once("header.php"); ?>
    <h2 id="konto">Towary dla kobiet</h2>
    <?php
    $query = "SELECT * FROM `towar` ORDER BY cenaT";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>

            <div id="col-md-4">
                <form method="post" action="kosz.php">
                    <div>
                        <img src="<?php echo $row["image"]; ?>" alt="zdjecie towaru" height="235" />
                        <h4 class="text-info"><?php echo $row["nazwaT"]; ?></h4>
                        <h4 id="price-info"><?php echo $row["cenaT"]; ?> zl</h4>
                        <input type="tetx" name="quantity" id="form-control" value="1" /><br><br>

                        <input type="htext" name="hidden_img" value="<?php echo $row['image']; ?>"/>
                        <input type="hidden" name="hidden_name" value="<?php echo $row['nazwaT']; ?>"/>
                        <input type="hidden" name="hidden_price" value="<?php echo $row['cenaT']; ?>"/>
                        <input type="hidden" name="hidden_id" value="<?php echo $row['idTow']; ?>"/>                        
                        <input type="submit" name="add_to_cart" id="btn-success" value="Dodaj do koszyka" /><br><br>

                    </div>
                </form>
            </div>

    <?php
        }
    }
    ?>

    
</body>

</html>