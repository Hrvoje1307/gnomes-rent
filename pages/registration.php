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

        <div class="btns--form">
          <input type="submit" value="Sign up" class="form-btn action--form" name="registrationAction">
          <input type="submit" value="Have account?" class="form-btn action--form" name="switchAccount">
        </div>
    </form>
</section>

<?php
  // $pdo= require_once("./db/connect.php");
  if(isset($_POST["registrationAction"])){
    $username=$_POST['registrationUsername'];
    $password=password_hash($_POST['registrationPassword'],PASSWORD_BCRYPT);
    $name=$_POST["registrationName"];
    $surname=$_POST["registrationSurname"];
    $address=$_POST["registrationAddress"];
  
    $sql="INSERT INTO users (username,name,surname,password,address,timestamp) VALUES (?,?,?,?,?,NOW())";
    $s=$pdo->prepare($sql);
    $s->execute(["$username","$name","$surname","$password","$address"]);
    die(header("Location:index.php?page=login"));

  }

  if(isset($_POST["switchAccount"])){
    die(header("Location:index.php?page=login"));
  }

  // $sql="SELECT * FROM users";
  //  $statement=$pdo->query($sql);
  //  $result=$statement->fetchAll();
  //  if($result){
  //    foreach($result as $row){
  //      echo $row["username"]." | ".$row["password"]." | ".$row["name"]." | ".$row["surname"]. " | ".$row["address"]."<br>";
  //    }
  //  }
  
?>