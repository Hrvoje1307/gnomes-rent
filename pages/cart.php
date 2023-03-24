<section class="cart container">
<h1 class="secondary-heading">Cart</h1>
<form action="index.php?page=cart&action=order" method="POST">
<?php 
    // $pdo=require_once("./db/connect.php");
    $sql="SELECT * FROM gnomes";
    $s=$pdo->query($sql);
    $result=$s->fetchAll();
    echo "<ul class='productsCart'>";
    $totalPrice = 0;
    foreach ($cart as $id_item) {
      $image=$result[($id_item)-2]["image"];
      $id_item = preg_replace("/[^0-9]/", "", $id_item);
      $name = htmlspecialchars($result[intval($id_item)-2]["name"], ENT_QUOTES, 'UTF-8');
      $printPrice = htmlspecialchars($result[intval($id_item)-2]["price"], ENT_QUOTES, 'UTF-8');
      $totalPrice += $result[intval($id_item)-2]["price"];
      echo '<section class="products">
      <img class="imageProduct" src="'. $image .'"><br>
      <span class="nameProduct"><b>'. $name.'</b></span> <br>
      <span class="priceProduct">'. $printPrice.' €</span> <br><br>
    </section>';
    }
    // if(isset($_SESSION["username"])){
      //   echo "<input class='btnProduct'  type='submit' value='ORDER'>";
      // }
      echo "</ul>";
      echo "<h1 class='totalPrice'>Total price is: ".number_format($totalPrice, 2, ',', '.')." €<h1>";
      // echo "<form method='post'>
      //   <input type='submit' value='Order' class='order-btn' name='order'>
      // </form>";
?>
</form>

<?php
  if(isset($_GET["action"]) && $_GET["action"] == "order") {
    echo "<b>You have successfully placed the order.</b><br/>";
  }
?>
</section>
