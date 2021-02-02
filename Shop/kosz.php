<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'sklep');

if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION["shopping_cart"])){
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_POST["hidden_id"], $item_array_id)){
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
            'item_id'       =>  $_POST["hidden_id"],
            'item_img'      =>  $_POST["hidden_img"],
            'item_name'     =>  $_POST["hidden_name"],
            'item_price'    =>  $_POST["hidden_price"],
            'item_quantity' =>  $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        }else{
          echo '<script>alert("Towar juz dodany")</script>';
          echo '<script>window.location = "kosz.php"</script>';
        }
    }else{
        $item_array = array(
            'item_id'       =>  $_POST["hidden_id"],
            'item_img'      =>  $_POST["hidden_img"],
            'item_name'     =>  $_POST["hidden_name"],
            'item_price'    =>  $_POST["hidden_price"],
            'item_quantity' =>  $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"])){
  if(isset($_GET["action"]) == "delete"){
    foreach($_SESSION["shopping_cart"] as $keys => $value){
      if($values["item_id"] == $_POST["idTow"]){
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Towar zostal usuniety")</script>';
        echo '<script>window.location = "kosz.php"</script>';
        
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Kosz</title>
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/zaloguj.css" />
    <link rel="stylesheet" href="styles/tow.css" />
  </head>
  <body>
    <?php require_once("header.php");
     require_once("elementKosz.php"); ?>
    <h2 id="konto">Koszyk</h2>
    <?php
    if(!empty($_SESSION["shopping_cart"]))
    {
      ?>
    <div class="zaloguj" style="width: 30%; float:left;"><a href = "daneDost.php">Przejdz do zamowienia</a></div><br><br><br> 
    <?php
  }?>

    <table id="tab">
    <?php
    if(!empty($_SESSION["shopping_cart"])){
      $total = 0;
      foreach($_SESSION["shopping_cart"] as $keys => $value){
    ?>

    <tr width="20%">
    <td><img src="<?php echo $value['item_img']; ?>" alt="zdjecie towaru" height="200" width="200" /></td>
    <td>
      <?php echo $value["item_name"];?><br>
      <p>ilosc: <?php echo $value["item_quantity"];?></p>
      <p>cena: <?php echo $value["item_price"]; echo ' zl';?></p>
      <a href="kosz.php?action=delete&idTow=<?php echo $value['item_id']; ?>"><span><strong>Usun towar</strong></span></a>
    </td>
    
    </tr>
    <?php  
      $total = $total + ($value["item_quantity"] * $value["item_price"]);
      }
    
    ?>
    <tr>
    <td colspan="2"><p id="total"><strong>Cena towarow z zamowienia: <?php echo number_format($total, 2); echo ' zl';?></strong></p></td>
    </tr>
    <?php
    }
    ?>
    </table>
  </body>
</html>