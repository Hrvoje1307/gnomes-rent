<section class="user-form-container">
  <form method="POST" class="user-form">
    <h3 class="secondary-heading form-heading">Change Here</h3>
    <label class="form-label" for="name">Name</label>
    <input type="text" class="form-input" name="nameChange" id="name" placeholder="name">
    <label class="form-label" for="surname">Surname</label>
    <input type="text" class="form-input" name="surnameChange" id="surname" placeholder="surname">
    <label class="form-label" for="password">Password</label>
    <input type="password" class="form-input" name="passwordChange" id="password" placeholder="password">
    <label class="form-label" for="address">Address</label>
    <input type="text" class="form-input" name="addressChange" id="address" placeholder="address">
    <input type="submit" value="Change" class="form-btn action--form" name="change">
    <input type="submit" value="Delete" class="form-btn delete--user" name="delete">
    <input type="submit" value="Delete" class="form-btn delete--user" name="logout">
  </form> 
</section>

<?php
  if(isset($_POST["change"])){
    $username=$_SESSION["username"];
    $password=password_hash($_POST["passwordChange"],PASSWORD_BCRYPT);
    $name=$_POST["nameChange"];
    $surname=$_POST["surnameChange"];
    $address=$_POST["addressChange"];

    if(isset($name) && $_POST["nameChange"]!=""){
      $sql="UPDATE users SET name=? WHERE username=?";
      $s=$pdo->prepare($sql);
      $s->execute(["$name","$username"]);
    }
    if(isset($password) && $_POST["passwordChange"]!=""){
      $sql="UPDATE users SET password=? WHERE username=?";
      $s=$pdo->prepare($sql);
      $s->execute(["$password","$username"]);
    }
    if(isset($surname) && $_POST["surnameChange"]!=""){
      $sql="UPDATE users SET surname=? WHERE username=?";
      $s=$pdo->prepare($sql);
      $s->execute(["$surname","$username"]);
    }
    if(isset($address) && $_POST["addressChange"]!=""){
      $sql="UPDATE users SET address=? WHERE username=?";
      $s=$pdo->prepare($sql);
      $s->execute(["$address","$username"]);
    }
  }

  if(isset($_POST["delete"])){
    $username=$_SESSION["username"];
    unset($_SESSION["username"]);
    $sql="DELETE FROM users WHERE username=?";
    $s=$pdo->prepare($sql);
    $s->execute(["$username"]);
    die(header("Location:index.php?page=registration"));
  }

  if(isset($_POST["order"])){
    $sql="SELECT * FROM users";
   $statement=$pdo->query($sql);
   $result=$statement->fetchAll();
   if($result){
     foreach($result as $row){
       echo $row["username"]." | ".$row["password"]." | ".$row["name"]." | ".$row["surname"]. " | ".$row["address"]."<br>";
     }
   }
  }

  if(isset($_POST["logout"])){
    unset($_SESSION["username"]);
    die(header("Location:index.php?page=home"));
  }
?>