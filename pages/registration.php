<section class="user-form-container">
    <form class="user-form" method="POST">
        <h3 class="secondary-heading form-heading">Registration Here</h3>

        <label class="form-label" for="username">Username</label>
        <input class="form-input" name="registrationUsername" type="text" placeholder="username" id="username">
        
        <label class="form-label" for="name">Name</label>
        <input class="form-input" name="registrationName" type="text" placeholder="name" id="name">
        
        <label class="form-label" for="surname">Surname</label>
        <input class="form-input" name="registrationSurname" type="text" placeholder="surname" id="surname">
        
        <label class="form-label" for="password">Password</label>
        <input class="form-input" name="registrationPassword" type="password" placeholder="*****" id="password">
        
        <label class="form-label" for="address">Address</label>
        <input class="form-input" name="registrationAddress" type="text" placeholder="address" id="address">

        <input type="submit" value="Log in" class="action--form" name="registrationAction">
    </form>
</section>

<?php
  $pdo= require_once("./db/connect.php");
  if(isset($_POST["registrationAction"])){
    $username=$_POST['registrationUsername'];
    $password=password_hash($_POST['registrationPassword'],PASSWORD_BCRYPT);
    $name=$_POST["registrationName"];
    $surname=$_POST["registrationSurname"];
    $address=$_POST["registrationAddress"];
  
    $sql="INSERT INTO users (username,name,surname,password,address,timestamp) VALUES (?,?,?,?,?,NOW())";
    $s=$pdo->prepare($sql);
    $s->execute(["$username","$name","$surname","$password","$address"]);
  }

  // $sql="SELECT * FROM users";
  //  $statement=$pdo->query($sql);
  //  $result=$statement->fetchAll();
  //  if($result){
  //    foreach($result as $row){
  //      echo $row["username"]." | ".$row["password"]." | ".$row["email"]." | ".$row["name"]." | ".$row["surname"]. " | ".$row["address"]."<br>";
  //    }
  //  }
?>