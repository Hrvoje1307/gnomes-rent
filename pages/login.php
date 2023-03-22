<section class="user-form-container">
    <form class="user-form" method="POST">
        <h3 class="secondary-heading form-heading">Login Here</h3>

        <label class="form-label" for="username">Username</label>
        <input class="form-input" name="loginUsername" type="text" placeholder="username" id="username">

        <label class="form-label" for="password">Password</label>
        <input class="form-input" name="loginPassword" type="password" placeholder="*****" id="password">

        <input type="submit" value="Log in" name="loginAction" class="action--form">
    </form>
</section>

<?php
    if(isset($_POST['loginAction'])){
        $username=$_POST["loginUsername"];
        $password = $_POST["loginPassword"];

        $sql ="SELECT username, password FROM users WHERE username=?";
        $s=$pdo->prepare($sql);
        $s->execute(["$username"]);
        $result=$s->fetchAll();
        if($result){
            foreach($result as $row){
                if($username==$row["username"] && password_verify($password, $row["password"])){
                    $_SESSION["username"]=$row["username"];
                    echo"Uspjesna prijava";
                }else {
                    echo"Neuspjesna prijava";
                }
            }
        }

    }
?>