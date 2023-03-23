<h1>Cart</h1>
<form action="index.php?page=cart&action=order" method="POST">
<?php 
    // $pdo=require_once("./db/connect.php");
    $sql="SELECT * FROM gnomes";
    $s=$pdo->query($sql);
    $result=$s->fetchAll();
    echo "<ul>";
    $totalPrice = 0;
    foreach ($cart as $id_item) {
      $id_item = preg_replace("/[^0-9]/", "", $id_item);
      $name = htmlspecialchars($result[intval($id_item)-2]["name"], ENT_QUOTES, 'UTF-8');
      $printPrice = htmlspecialchars($result[intval($id_item)-2]["price"], ENT_QUOTES, 'UTF-8');
      $totalPrice += $result[intval($id_item)-2]["price"];
      echo "<li>$id_item | $name | $printPrice</li>";
    }
    echo "<br/>Total price is: ".number_format($totalPrice, 2, ',', '.')." €<br>";
    if(isset($_SESSION["username"])){
      echo "<input class='btnProduct'  type='submit' value='ORDER'>";
    }
    echo "</ul>";
?>
</form>

<?php
  if(isset($_GET["action"]) && $_GET["action"] == "order") {
    echo "<b>You have successfully placed the order.</b><br/>";
  }
?>