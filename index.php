<?php
session_start();
  require_once("other/important.php");
  if($_GET["page"] == "cart") {
    
    if(isset($_COOKIE["cart"])) {
        $cart = (array)json_decode($_COOKIE["cart"]);
    }
    if(isset($_GET["action"]) && isset($_GET["id"])) {
        if($_GET["action"] == "add") {
            // $ddd = $_GET["id"];
            // $x = $_SESSION["username"];
            // $sql = "SELECT MAX(order_number) AS max_order_num FROM orders";
            // $statement = $pdo->prepare($sql);
            // $r = $statement->fetch(PDO::FETCH_ASSOC);
            // $order_num = $r['max_order_number'] + 1;
            // $xina = 1;
            
            // $sql = "INSERT INTO orders (id, order_number, username, id_item) VALUES (?, ?, ?, ?);";
            // $statement = $pdo->prepare($sql);
            // $statement -> execute(["$xina", "$order_num", "$x", "$ddd"]);
            //$xina++; 
          $id=$_GET["id"]; 
           $cart[] = $id;

          setcookie("cart", json_encode($cart), time() + 3600);
        }
        if($_GET["action"] == "order"){
          $sql="SELECT MAX(order_number) AS max_order FROM orders";
          $s=$pdo->query($sql);
          $result=$s->fetchAll();
          $order_num=$result[0]["max_order"]+1;
          
          $sql="SELECT MAX(id) AS max_id FROM orders";
          $s=$pdo->query($sql);
          $result=$s->fetchAll();
          $id=$result[0]["max_id"]+1;

          $username=$_SESSION["username"];

          foreach($cart as $row){
            $sql="INSERT INTO orders (id,order_number, username, id_item) VALUE (?,?,?,?)";
            $c=$pdo->prepare($sql);
            $c->execute(["$id","$order_num","$username","$row"]);
            $id++;
          }
          
          $cart = array();
          unset($_COOKIE["cart"]);
          setcookie("cart", "", -1); 
        }
        
      }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS -->
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Gnome rental | Choose your best</title>
</head>
<body>
  <header><?php require_once("pages/header.php");?></header>
  <main><?php require_once("./other/select_page.php");?></main>
  <footer><?php require_once("pages/footer.php");?></footer>


  <!-- JS -->
  <script src="js/script.js"></script>
  <!-- ICONS -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>