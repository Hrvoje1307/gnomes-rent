<section class="store container">
  <?php
        //$pdo=require_once("./php/connect.php");
        $sql="SELECT * FROM gnomes";
        $statement=$pdo->query($sql);
        $result=$statement->fetchAll();
        if($result){
          foreach($result as $row){
            echo '<section class="products">
              <img class="imageProduct" src="'. $row["image"] .'"><br>
              <span class="nameProduct"><b>'. $row["name"].'</b></span> <br>
              <span class="priceProduct">'. $row["price"] .' €</span> <br><br>
              <button class="btnProduct" name="addToCard"  onclick="addToCart('.$row["id"].',`'.$row["name"].'`)">Add to Cart</button>
            </section>';
          }
        }
      ?>
</section>